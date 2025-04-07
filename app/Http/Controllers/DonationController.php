<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the donations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mock data for now, will be replaced with database query later
        $donations = [
            [
                'id' => 1,
                'donator_name' => 'John Smith',
                'donation_type' => 'Money',
                'objective' => 'Education',
                'total_amount' => 5000,
                'amount_spent' => 3500,
                'storage_location' => 'Bank',
            ],
            [
                'id' => 2,
                'donator_name' => 'Sarah Johnson',
                'donation_type' => 'Clothes',
                'objective' => 'Housing',
                'total_amount' => 200,
                'amount_spent' => 0,
                'storage_location' => 'Warehouse',
            ],
            [
                'id' => 3,
                'donator_name' => 'Michael Brown',
                'donation_type' => 'Food',
                'objective' => 'Food',
                'total_amount' => 1000,
                'amount_spent' => 750,
                'storage_location' => 'Food Bank',
            ],
            [
                'id' => 4,
                'donator_name' => 'Emily Davis',
                'donation_type' => 'Money',
                'objective' => 'Housing',
                'total_amount' => 3000,
                'amount_spent' => 1200,
                'storage_location' => 'Bank',
            ],
            [
                'id' => 5,
                'donator_name' => 'Robert Wilson',
                'donation_type' => 'Clothes',
                'objective' => 'Education',
                'total_amount' => 150,
                'amount_spent' => 0,
                'storage_location' => 'Warehouse',
            ],
        ];

        return view('home', ['donations' => $donations]);
    }

    /**
     * Show the form for creating a new donation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donations.create');
    }

    /**
     * Store a newly created donation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'donator_name' => 'required|string|max:255',
            'donation_type' => 'required|string|max:255',
            'objective' => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:0',
            'amount_spent' => 'required|numeric|min:0',
            'storage_location' => 'required|string|max:255',
        ]);

        // In a real application, you would save this to the database
        // For now, we'll just redirect back to the index page
        return redirect('/')->with('success', 'Donation created successfully');
    }

    /**
     * Show the form for editing the specified donation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mock data for now, will be replaced with database query later
        $donations = [
            1 => [
                'id' => 1,
                'donator_name' => 'John Smith',
                'donation_type' => 'Money',
                'objective' => 'Education',
                'total_amount' => 5000,
                'amount_spent' => 3500,
                'storage_location' => 'Bank',
            ],
            2 => [
                'id' => 2,
                'donator_name' => 'Sarah Johnson',
                'donation_type' => 'Clothes',
                'objective' => 'Housing',
                'total_amount' => 200,
                'amount_spent' => 0,
                'storage_location' => 'Warehouse',
            ],
            3 => [
                'id' => 3,
                'donator_name' => 'Michael Brown',
                'donation_type' => 'Food',
                'objective' => 'Food',
                'total_amount' => 1000,
                'amount_spent' => 750,
                'storage_location' => 'Food Bank',
            ],
            4 => [
                'id' => 4,
                'donator_name' => 'Emily Davis',
                'donation_type' => 'Money',
                'objective' => 'Housing',
                'total_amount' => 3000,
                'amount_spent' => 1200,
                'storage_location' => 'Bank',
            ],
            5 => [
                'id' => 5,
                'donator_name' => 'Robert Wilson',
                'donation_type' => 'Clothes',
                'objective' => 'Education',
                'total_amount' => 150,
                'amount_spent' => 0,
                'storage_location' => 'Warehouse',
            ],
        ];

        // Check if the donation exists
        if (!isset($donations[$id])) {
            return redirect('/')->with('error', 'Donation not found');
        }

        return view('donations.edit', ['donation' => $donations[$id]]);
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
        // Validate the request
        $validated = $request->validate([
            'donator_name' => 'required|string|max:255',
            'donation_type' => 'required|string|max:255',
            'objective' => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:0',
            'amount_spent' => 'required|numeric|min:0',
            'storage_location' => 'required|string|max:255',
        ]);

        // In a real application, you would update this in the database
        // For now, we'll just redirect back to the index page
        return redirect('/')->with('success', 'Donation updated successfully');
    }

    /**
     * Remove the specified donation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // In a real application, you would delete this from the database
        // For now, we'll just redirect back to the index page
        return redirect('/')->with('success', 'Donation deleted successfully');
    }
} 