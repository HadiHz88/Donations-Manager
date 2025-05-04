<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Objective;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $query = Donation::with(['objective', 'currency']);

        // Handle search by donor name or reference ID
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('donor_name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('reference_id', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filter by objective
        if ($request->has('objective') && !empty($request->objective)) {
            $query->where('objective_id', $request->objective);
        }

        // Filter by storage location
        if ($request->has('storage_location') && !empty($request->storage_location)) {
            $query->where('storage_location', $request->storage_location);
        }

        // Filter by amount range
        if ($request->has('min_amount') && !empty($request->min_amount)) {
            $query->where('amount', '>=', $request->min_amount);
        }

        if ($request->has('max_amount') && !empty($request->max_amount)) {
            $query->where('amount', '<=', $request->max_amount);
        }

        $donations = $query->latest()->paginate(10);

        $objectives = Objective::orderBy('name')->get();
        $currencies = Currency::orderBy('code')->get();

        // Get unique storage locations for filtering
        $storageLocations = Donation::distinct()->pluck('storage_location')->filter()->sort()->values();

        return view('donations.index', [
            'donations' => $donations,
            'objectives' => $objectives,
            'currencies' => $currencies,
            'storageLocations' => $storageLocations,
            'filters' => $request->only(['search', 'objective', 'storage_location', 'min_amount', 'max_amount'])
        ]);
    }

    public function create()
    {
        $objectives = Objective::orderBy('name')->get();
        $currencies = Currency::orderBy('code')->get();

        return view('donations.create-edit', [
            'objectives' => $objectives,
            'currencies' => $currencies,
            'donation' => null,
            'mode' => 'create'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'donor_name' => 'required|string|max:255',
            'objective' => 'required|exists:objectives,id',
            'currency' => 'required|exists:currencies,id',
            'total_amount' => 'required|numeric|min:0',
            'storage_location' => 'required|string|in:Bank,Safe,Warehouse,Food Bank,Storage Unit,Other',
        ]);

        try {
            Donation::create([
                'donor_name' => $validated['donor_name'],
                'objective_id' => $validated['objective'],
                'currency_id' => $validated['currency'],
                'amount' => $validated['total_amount'],
                'storage_location' => $validated['storage_location'],
                'date_received' => now(),
            ]);

            return redirect()->route('donations.index')->with('success', 'Donation created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create donation: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $donation = Donation::with(['objective', 'currency'])->findOrFail($id);
        $objectives = Objective::orderBy('name')->get();
        $currencies = Currency::orderBy('code')->get();

        $formattedDonation = [
            'id' => $donation->id,
            'donor_name' => $donation->donor_name,
            'objective' => $donation->objective_id,
            'currency' => $donation->currency_id,
            'total_amount' => $donation->amount,
            'storage_location' => $this->getStorageLocation($donation->store),
        ];

        return view('donations.create-edit', [
            'donation' => $formattedDonation,
            'objectives' => $objectives,
            'currencies' => $currencies,
            'mode' => 'edit'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'donor_name' => 'required|string|max:255',
            'objective' => 'required|exists:objectives,id',
            'currency' => 'required|exists:currencies,id',
            'total_amount' => 'required|numeric|min:0',
            'storage_location' => 'required|string|in:Bank,Safe,Warehouse,Food Bank,Storage Unit,Other',
        ]);

        try {
            $donation = Donation::findOrFail($id);
            $donation->update([
                'donor_name' => $validated['donor_name'],
                'objective_id' => $validated['objective'],
                'currency_id' => $validated['currency'],
                'amount' => $validated['total_amount'],
                'storage_location' => $validated['storage_location'],
            ]);

            return redirect()->route('donations.index')->with('success', 'Donation updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to update donation: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $donation = Donation::findOrFail($id);
            $donation->delete();
            return redirect()->route('donations.index')->with('success', 'Donation deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete donation: ' . $e->getMessage());
        }
    }

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
