<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $donations = Donation::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $donations->where(function ($query) use ($search) {
                $query->where('donor_name', 'like', "%{$search}%")
                    ->orWhere('reference_id', 'like', "%{$search}%")
                    ->orWhere('objective', 'like', "%{$search}%");
            });
        }

        $donations = $donations->latest('date_received')->paginate(10);

        return view('pages.income', compact('donations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'donor_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'objective' => 'required|string|max:255',
            'storage_location' => 'required|string|max:255',
            'date_received' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Generate a reference ID
        $latestDonation = Donation::latest()->first();
        $refNumber = $latestDonation ? intval(substr($latestDonation->reference_id, -3)) + 1 : 1;
        $validated['reference_id'] = 'DON-' . date('Y') . '-' . str_pad($refNumber, 3, '0', STR_PAD_LEFT);

        Donation::create($validated);

        return redirect()->route('donations.index')
            ->with('success', 'Donation added successfully.');
    }

    public function create()
    {
        return view('pages.income-form');
    }

    public function show(Donation $donation)
    {
        return view('pages.donation-details', compact('donation'));
    }

    public function edit(Donation $donation)
    {
        return view('pages.income-form', compact('donation'));
    }

    public function update(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'donor_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'objective' => 'required|string|max:255',
            'storage_location' => 'required|string|max:255',
            'date_received' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $donation->update($validated);

        return redirect()->route('donations.index')
            ->with('success', 'Donation updated successfully.');
    }

    public function destroy(Donation $donation)
    {
        // Check if this donation has any outcomes linked to it
        if ($donation->outcomes()->count() > 0) {
            return redirect()->route('donations.index')
                ->with('error', 'Cannot delete donation with linked outcomes.');
        }

        $donation->delete();

        return redirect()->route('donations.index')
            ->with('success', 'Donation deleted successfully.');
    }
}
