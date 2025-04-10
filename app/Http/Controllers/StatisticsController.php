<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Outcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        // Calculate total income
        $totalIncome = Donation::sum('amount');

        // Calculate total outcome
        $totalOutcome = Outcome::sum('amount');

        // Calculate remaining funds
        $remainingFunds = $totalIncome - $totalOutcome;

        // Count completed objectives
        $completedObjectives = DB::table('donations')
            ->select('objective')
            ->groupBy('objective')
            ->havingRaw('SUM(amount) <= (SELECT COALESCE(SUM(outcomes.amount), 0) FROM outcomes WHERE outcomes.source_donation_id IN (SELECT id FROM donations d WHERE d.objective = donations.objective))')
            ->count();

        // Get distribution data
        $distributionData = DB::table('donations')
            ->select('objective', DB::raw('SUM(amount) as total'))
            ->groupBy('objective')
            ->orderByDesc('total')
            ->get()
            ->map(function ($item) use ($totalIncome) {
                $percentage = $totalIncome > 0 ? round(($item->total / $totalIncome) * 100) : 0;
                return [
                    'name' => $item->objective,
                    'amount' => $item->total,
                    'percentage' => $percentage
                ];
            });

        // Get monthly trends for the last 6 months
        $months = [];
        $incomeData = [];
        $outcomeData = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $months[] = $month->format('M');

            $monthlyIncome = Donation::whereYear('date_received', $month->year)
                ->whereMonth('date_received', $month->month)
                ->sum('amount');
            $incomeData[] = $monthlyIncome;

            $monthlyOutcome = Outcome::whereYear('date_sent', $month->year)
                ->whereMonth('date_sent', $month->month)
                ->sum('amount');
            $outcomeData[] = $monthlyOutcome;
        }

        $monthlyTrends = [
            'months' => $months,
            'income' => $incomeData,
            'outcome' => $outcomeData
        ];

        // Get recent activities
        $recentActivities = collect();

        // Add recent donations
        $recentDonations = Donation::latest('date_received')
            ->take(5)
            ->get()
            ->map(function ($donation) {
                return (object)[
                    'date' => $donation->date_received,
                    'type' => 'income',
                    'description' => "Received $" . number_format($donation->amount, 2) . " from {$donation->donor_name} for {$donation->objective}"
                ];
            });

        // Add recent outcomes
        $recentOutcomes = Outcome::latest('date_sent')
            ->take(5)
            ->get()
            ->map(function ($outcome) {
                return (object)[
                    'date' => $outcome->date_sent,
                    'type' => 'outcome',
                    'description' => "Sent $" . number_format($outcome->amount, 2) . " to {$outcome->target_organization}"
                ];
            });

        // Merge and sort by date
        $recentActivities = $recentDonations->merge($recentOutcomes)
            ->sortByDesc('date')
            ->take(5);

        return view('pages.statistics', compact(
            'totalIncome',
            'totalOutcome',
            'remainingFunds',
            'completedObjectives',
            'distributionData',
            'monthlyTrends',
            'recentActivities'
        ));
    }
}
