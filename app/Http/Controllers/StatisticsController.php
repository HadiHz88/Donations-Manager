<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Outcome;
use App\Models\Objective;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        // Calculate total income and outcome using Eloquent
        $totalIncome = Donation::sum('amount');
        $totalOutcome = Outcome::sum('amount');
        $remainingFunds = $totalIncome - $totalOutcome;

        // Get distribution data using Eloquent relationships
        $distributionData = Objective::withSum('donations', 'amount')
            ->orderByDesc('donations_sum_amount')
            ->get()
            ->map(function ($objective) use ($totalIncome) {
                $percentage = $totalIncome > 0 ? round(($objective->donations_sum_amount / $totalIncome) * 100) : 0;
                return [
                    'name' => $objective->name,
                    'amount' => $objective->donations_sum_amount,
                    'percentage' => $percentage
                ];
            });

        // Get monthly trends for the last 6 months using Eloquent
        $months = collect();
        $incomeData = collect();
        $outcomeData = collect();

        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $months->push($month->format('M'));

            $monthlyIncome = Donation::whereYear('date_received', $month->year)
                ->whereMonth('date_received', $month->month)
                ->sum('amount');
            $incomeData->push($monthlyIncome);

            $monthlyOutcome = Outcome::whereYear('date_sent', $month->year)
                ->whereMonth('date_sent', $month->month)
                ->sum('amount');
            $outcomeData->push($monthlyOutcome);
        }

        $monthlyTrends = [
            'months' => $months,
            'income' => $incomeData,
            'outcome' => $outcomeData
        ];

        // Get recent activities using Eloquent relationships
        $recentDonations = Donation::with(['objective', 'currency'])
            ->latest('date_received')
            ->take(5)
            ->get()
            ->map(function ($donation) {
                return (object)[
                    'date' => $donation->date_received,
                    'type' => 'income',
                    'description' => "Received {$donation->currency->code} " . number_format($donation->amount, 2) . 
                        " from {$donation->donor_name} for {$donation->objective->name}"
                ];
            });

        $recentOutcomes = Outcome::with('donation.currency')
            ->latest('date_sent')
            ->take(5)
            ->get()
            ->map(function ($outcome) {
                return (object)[
                    'date' => $outcome->date_sent,
                    'type' => 'outcome',
                    'description' => "Sent {$outcome->donation->currency->code} " . number_format($outcome->amount, 2) . 
                        " to {$outcome->target_organization}"
                ];
            });

        $recentActivities = $recentDonations->merge($recentOutcomes)
            ->sortByDesc('date')
            ->take(5);

        return view('pages.statistics', compact(
            'totalIncome',
            'totalOutcome',
            'remainingFunds',
            'distributionData',
            'monthlyTrends',
            'recentActivities'
        ));
    }
}