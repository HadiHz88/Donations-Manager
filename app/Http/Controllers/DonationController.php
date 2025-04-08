<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Objective;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the donations.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View|object
     */
    public function index()
    {
        $donations = Donation::with('objective')->get()->map(function ($donation) {
            return [
                'id' => $donation->id,
                'donator_name' => $donation->donator_name,
                'donation_type' => $this->getDonationType($donation->store),
                'objective' => $donation->objective->title,
                'total_amount' => $donation->amount,
                'amount_spent' => $donation->spent,
                'storage_location' => $this->getStorageLocation($donation->store),
            ];
        });

        $objectives = Objective::all();
        return view('home', [
            'donations' => $donations,
            'objectives' => $objectives
        ]);
    }

    /**
     * Show the form for creating a new donation.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View|object
     */
    public function create()
    {
        $objectives = Objective::all();
        return view('donations.create', [
            'objectives' => $objectives,
            'donation' => null,
            'mode' => 'create'
        ]);
    }

    /**
     * Store a newly created donation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'donator_name' => 'required|string|max:255',
            'objective' => 'required|exists:objectives,id',
            'total_amount' => 'required|numeric|min:0',
            'amount_spent' => 'required|numeric|min:0',
            'storage_location' => 'required|string|in:Bank,Safe,Warehouse,Food Bank,Storage Unit,Other',
        ]);

        Donation::create([
            'donator_name' => $validated['donator_name'],
            'objective_id' => $validated['objective'],
            'amount' => $validated['total_amount'],
            'spent' => $validated['amount_spent'],
            'store' => $this->getStoreType($validated['storage_location']),
        ]);

        return redirect('/')->with('success', 'Donation created successfully.');
    }

    /**
     * Show the form for editing the specified donation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donation = Donation::with('objective')->findOrFail($id);
        $objectives = Objective::all();
        
        $formattedDonation = [
            'id' => $donation->id,
            'donator_name' => $donation->donator_name,
            'objective' => $donation->objective_id,
            'total_amount' => $donation->amount,
            'amount_spent' => $donation->spent,
            'storage_location' => $this->getStorageLocation($donation->store),
        ];

        return view('donations.edit', [
            'donation' => $formattedDonation,
            'objectives' => $objectives,
            'mode' => 'edit'
        ]);
    }

    /**
     * Update the specified donation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'donator_name' => 'required|string|max:255',
            'objective' => 'required|exists:objectives,id',
            'total_amount' => 'required|numeric|min:0',
            'amount_spent' => 'required|numeric|min:0',
            'storage_location' => 'required|string|in:Bank,Safe,Warehouse,Food Bank,Storage Unit,Other',
        ]);

        $donation = Donation::findOrFail($id);
        $donation->update([
            'donator_name' => $validated['donator_name'],
            'objective_id' => $validated['objective'],
            'amount' => $validated['total_amount'],
            'spent' => $validated['amount_spent'],
            'store' => $this->getStoreType($validated['storage_location']),
        ]);

        return redirect('/')->with('success', 'Donation updated successfully.');
    }

    /**
     * Remove the specified donation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();

        return redirect('/')->with('success', 'Donation deleted successfully.');
    }

    /**
     * Convert storage location to store type
     *
     * @param string $location
     * @return string
     */
    private function getStoreType($storageLocation)
    {
        return match ($storageLocation) {
            'Bank' => 'bank',
            'Safe' => 'safe',
            'Warehouse' => 'warehouse',
            'Food Bank' => 'food_bank',
            'Storage Unit' => 'storage_unit',
            'Other' => 'other',
            default => 'other',
        };
    }

    /**
     * Convert store type to storage location
     *
     * @param string $store
     * @return string
     */
    private function getStorageLocation($storeType)
    {
        return match ($storeType) {
            'bank' => 'Bank',
            'safe' => 'Safe',
            'warehouse' => 'Warehouse',
            'food_bank' => 'Food Bank',
            'storage_unit' => 'Storage Unit',
            'other' => 'Other',
            default => 'Other',
        };
    }

    /**
     * Get donation type based on store type
     *
     * @param string $store
     * @return string
     */
    private function getDonationType($storeType)
    {
        return match ($storeType) {
            'bank', 'safe' => 'Money',
            'warehouse', 'storage_unit' => 'Items',
            'food_bank' => 'Food',
            default => 'Other',
        };
    }
}