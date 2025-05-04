<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OutcomeController extends Controller
{
    public function index()
    {
        $outcomes = Outcome::with(['currency'])
            ->latest()
            ->paginate(10);

        return view('outcomes.index', [
            'outcomes' => $outcomes
        ]);
    }

    public function create()
    {
        $currencies = Currency::orderBy('code')->get();

        return view('outcomes.create-edit', [
            'outcome' => null,
            'currencies' => $currencies
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|exists:currencies,id',
            'target_organization' => 'required|string|max:255',
            'date_sent' => 'required|date',
            'payment_method' => 'nullable|string|in:Bank Transfer,Cash,Check,Other',
            'notes' => 'nullable|string',
        ]);

        try {
            Outcome::create([
                'amount' => $validated['amount'],
                'currency_id' => $validated['currency'],
                'target_organization' => $validated['target_organization'],
                'date_sent' => $validated['date_sent'],
                'payment_method' => $validated['payment_method'],
                'notes' => $validated['notes'],
            ]);

            return redirect()->route('outcomes.index')->with('success', 'Outcome created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create outcome: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $outcome = Outcome::with(['currency'])->findOrFail($id);
        $currencies = Currency::orderBy('code')->get();

        return view('outcomes.create-edit', [
            'outcome' => $outcome,
            'currencies' => $currencies
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|exists:currencies,id',
            'target_organization' => 'required|string|max:255',
            'date_sent' => 'required|date',
            'payment_method' => 'nullable|string|in:Bank Transfer,Cash,Check,Other',
            'notes' => 'nullable|string',
        ]);

        try {
            $outcome = Outcome::findOrFail($id);
            $outcome->update([
                'amount' => $validated['amount'],
                'currency_id' => $validated['currency'],
                'target_organization' => $validated['target_organization'],
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
