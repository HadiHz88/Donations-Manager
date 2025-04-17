<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use App\Models\Donation;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OutcomeController extends Controller
{
    public function index()
    {
        $outcomes = Outcome::with(['donation', 'currency'])
            ->latest()
            ->paginate(10);

        return view('pages.outcome', [
            'outcomes' => $outcomes
        ]);
    }

    public function create()
    {
        $donations = Donation::with(['currency', 'objective'])
            ->whereDoesntHave('outcome')
            ->latest()
            ->get();

        $currencies = Currency::orderBy('code')->get();

        return view('pages.outcome-form', [
            'outcome' => null,
            'donations' => $donations,
            'currencies' => $currencies
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|exists:currencies,id',
            'target_organization' => 'required|string|max:255',
            'source_donation_id' => 'required|exists:donations,id',
            'date_sent' => 'required|date',
            'payment_method' => 'nullable|string|in:Bank Transfer,Cash,Check,Other',
            'notes' => 'nullable|string',
            'receipt_received' => 'nullable|boolean',
        ]);

        try {
            // Generate a unique reference ID
            $referenceId = 'OUT-' . strtoupper(Str::random(8));
            
            // Ensure the reference ID is unique
            while (Outcome::where('reference_id', $referenceId)->exists()) {
                $referenceId = 'OUT-' . strtoupper(Str::random(8));
            }

            Outcome::create([
                'reference_id' => $referenceId,
                'amount' => $validated['amount'],
                'currency_id' => $validated['currency'],
                'target_organization' => $validated['target_organization'],
                'source_donation_id' => $validated['source_donation_id'],
                'date_sent' => $validated['date_sent'],
                'payment_method' => $validated['payment_method'],
                'notes' => $validated['notes'],
                'receipt_received' => $validated['receipt_received'] ?? false,
            ]);

            return redirect()->route('outcomes.index')->with('success', 'Outcome created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create outcome: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $outcome = Outcome::with(['donation', 'currency'])->findOrFail($id);
        $donations = Donation::with(['currency', 'objective'])
            ->whereDoesntHave('outcome')
            ->orWhere('id', $outcome->source_donation_id)
            ->latest()
            ->get();

        $currencies = Currency::orderBy('code')->get();

        return view('pages.outcome-form', [
            'outcome' => $outcome,
            'donations' => $donations,
            'currencies' => $currencies
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|exists:currencies,id',
            'target_organization' => 'required|string|max:255',
            'source_donation_id' => 'required|exists:donations,id',
            'date_sent' => 'required|date',
            'payment_method' => 'nullable|string|in:Bank Transfer,Cash,Check,Other',
            'notes' => 'nullable|string',
            'receipt_received' => 'nullable|boolean',
        ]);

        try {
            $outcome = Outcome::findOrFail($id);
            $outcome->update([
                'amount' => $validated['amount'],
                'currency_id' => $validated['currency'],
                'target_organization' => $validated['target_organization'],
                'source_donation_id' => $validated['source_donation_id'],
                'date_sent' => $validated['date_sent'],
                'payment_method' => $validated['payment_method'],
                'notes' => $validated['notes'],
                'receipt_received' => $validated['receipt_received'] ?? false,
            ]);

            return redirect()->route('outcomes.index')->with('success', 'Outcome updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to update outcome: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $outcome = Outcome::findOrFail($id);
            $outcome->delete();
            return redirect()->route('outcomes.index')->with('success', 'Outcome deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete outcome: ' . $e->getMessage());
        }
    }
}