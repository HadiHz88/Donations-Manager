<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use App\Models\Donation;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    public function index(Request $request)
    {
        $outcomes = Outcome::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $outcomes->where(function($query) use ($search) {
                $query->where('target_organization', 'like', "%{$search}%")
                    ->orWhere('reference_id', 'like', "%{$search}%")
                    ->orWhere('source_donation_ref', 'like', "%{$search}%");
            });
        }

        $outcomes = $outcomes->latest('date_sent')->paginate(10);

        return view('pages.outcome', compact('outcomes'));
    }

    public function create()
    {
        // Get donations that have available funds
        $donations = Donation::whereRaw('amount > (SELECT COALESCE(SUM(outcomes.amount), 0) FROM outcomes WHERE outcomes.source_donation_id = donations.id)')
            ->orderBy('date_received', 'desc')
            ->get();

        return view('pages.outcome-form', compact('donations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'target_organization' => 'required|string|max:255',
            'source_donation_id' => 'required|exists:donations,id',
            'date_sent' => 'required|date',
            'payment_method' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'receipt_received' => 'nullable|boolean',
        ]);

        // Check if the donation has enough funds
        $donation = Donation::findOrFail($validated['source_donation_id']);
        $usedAmount = $donation->outcomes()->sum('amount');
        $availableAmount = $donation->amount - $usedAmount;

        if ($validated['amount'] > $availableAmount) {
            return redirect()->back()
                ->withInput()
                ->with('error', "The requested amount exceeds the available funds ($availableAmount) for this donation.");
        }

        // Generate a reference ID
        $latestOutcome = Outcome::latest()->first();
        $refNumber = $latestOutcome ? intval(substr($latestOutcome->reference_id, -3)) + 1 : 1;
        $validated['reference_id'] = 'OUT-' . date('Y') . '-' . str_pad($refNumber, 3, '0', STR_PAD_LEFT);

        // Store the donation reference for easier querying
        $validated['source_donation_ref'] = $donation->reference_id;

        Outcome::create($validated);

        return redirect()->route('outcomes.index')
            ->with('success', 'Outcome added successfully.');
    }

    public function edit(Outcome $outcome)
    {
        // Get donations that have available funds (including the current one)
        $donations = Donation::whereRaw('amount > (SELECT COALESCE(SUM(outcomes.amount), 0) FROM outcomes WHERE outcomes.source_donation_id = donations.id AND outcomes.id != ?)', [$outcome->id])
            ->orWhere('id', $outcome->source_donation_id)
            ->orderBy('date_received', 'desc')
            ->get();

        return view('pages.outcome-form', compact('outcome', 'donations'));
    }

    public function update(Request $request, Outcome $outcome)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'target_organization' => 'required|string|max:255',
            'source_donation_id' => 'required|exists:donations,id',
            'date_sent' => 'required|date',
            'payment_method' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'receipt_received' => 'nullable|boolean',
        ]);

        // Check if the donation has enough funds (if changing donation or amount)
        if ($outcome->source_donation_id != $validated['source_donation_id'] || $outcome->amount != $validated['amount']) {
            $donation = Donation::findOrFail($validated['source_donation_id']);
            $usedAmount = $donation->outcomes()
                ->where('id', '!=', $outcome->id)
                ->sum('amount');
            $availableAmount = $donation->amount - $usedAmount;

            if ($validated['amount'] > $availableAmount) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', "The requested amount exceeds the available funds ($availableAmount) for this donation.");
            }

            // Update the donation reference if changed
            if ($outcome->source_donation_id != $validated['source_donation_id']) {
                $validated['source_donation_ref'] = $donation->reference_id;
            }
        }

        $outcome->update($validated);

        return redirect()->route('outcomes.index')
            ->with('success', 'Outcome updated successfully.');
    }

    public function destroy(Outcome $outcome)
    {
        $outcome->delete();

        return redirect()->route('outcomes.index')
            ->with('success', 'Outcome deleted successfully.');
    }
}
