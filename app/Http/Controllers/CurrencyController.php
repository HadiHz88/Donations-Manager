<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        return response()->json($currencies);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:3|unique:currencies,code',
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:5',
            'exchange_rate' => 'required|numeric|min:0'
        ]);

        Currency::create($validated);

        return redirect()->back()->with('success', 'Currency added successfully');
    }

    public function update(Request $request, Currency $currency)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:3|unique:currencies,code,' . $currency->id,
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:5',
            'exchange_rate' => 'required|numeric|min:0'
        ]);

        $currency->update($validated);

        return redirect()->back()->with('success', 'Currency updated successfully');
    }

    public function destroy(Currency $currency)
    {
        // Check if currency is in use
        if ($currency->objectives()->count() > 0 || $currency->donations()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete currency that is in use');
        }

        $currency->delete();

        return redirect()->back()->with('success', 'Currency deleted successfully');
    }
}
