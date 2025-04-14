<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Store a newly created currency in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|size:3|unique:currencies,code',
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:10',
            'exchange_rate' => 'required|numeric|min:0',
        ]);

        $currency = Currency::create($validated);

        return redirect()->route('currencies.index')->with('success', 'Currency Created successfully.');
    }

    /**
     * Update the specified currency.
     */
    public function update(Request $request, Currency $currency)
    {
        $validated = $request->validate([
            'code' => 'required|string|size:3|unique:currencies,code',
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:10',
            'exchange_rate' => 'required|numeric|min:0',
        ]);

        $currency->update($validated);

        return redirect()->route('currencies.index')->with('success', 'Currency updated successfully.');
    }
}
