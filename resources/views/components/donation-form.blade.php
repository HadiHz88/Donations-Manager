@props(['donation' => null, 'mode' => 'create'])

<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            {{ $mode === 'create' ? 'Add New Donation' : 'Edit Donation' }}
        </h1>
    </div>

    <form action="{{ $mode === 'create' ? '/donations' : '/donations/' . ($donation['id'] ?? '') }}" method="POST"
        class="space-y-6">
        @csrf
        @if ($mode === 'edit')
            @method('PUT')
        @endif

        <input type="hidden" name="id" value="{{ $donation['id'] ?? '' }}">

        <!-- Donator Name -->
        <div>
            <label for="donator_name" class="block text-sm font-medium text-gray-700">Donator Name</label>
            <input type="text" name="donator_name" id="donator_name" required
                value="{{ $donation['donator_name'] ?? '' }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <!-- Donation Type -->
        <div>
            <label for="donation_type" class="block text-sm font-medium text-gray-700">Type of Donation</label>
            <select name="donation_type" id="donation_type" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Select a type</option>
                <option value="Money"
                    {{ isset($donation['donation_type']) && $donation['donation_type'] === 'Money' ? 'selected' : '' }}>
                    Money</option>
                <option value="Clothes"
                    {{ isset($donation['donation_type']) && $donation['donation_type'] === 'Clothes' ? 'selected' : '' }}>
                    Clothes</option>
                <option value="Food"
                    {{ isset($donation['donation_type']) && $donation['donation_type'] === 'Food' ? 'selected' : '' }}>
                    Food</option>
                <option value="Books"
                    {{ isset($donation['donation_type']) && $donation['donation_type'] === 'Books' ? 'selected' : '' }}>
                    Books</option>
                <option value="Electronics"
                    {{ isset($donation['donation_type']) && $donation['donation_type'] === 'Electronics' ? 'selected' : '' }}>
                    Electronics</option>
                <option value="Other"
                    {{ isset($donation['donation_type']) && $donation['donation_type'] === 'Other' ? 'selected' : '' }}>
                    Other</option>
            </select>
        </div>

        <!-- Objective -->
        <div>
            <label for="objective" class="block text-sm font-medium text-gray-700">Donation Objective</label>
            <select name="objective" id="objective" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Select an objective</option>
                <option value="Education"
                    {{ isset($donation['objective']) && $donation['objective'] === 'Education' ? 'selected' : '' }}>
                    Education</option>
                <option value="Food"
                    {{ isset($donation['objective']) && $donation['objective'] === 'Food' ? 'selected' : '' }}>Food
                </option>
                <option value="Housing"
                    {{ isset($donation['objective']) && $donation['objective'] === 'Housing' ? 'selected' : '' }}>
                    Housing</option>
                <option value="Healthcare"
                    {{ isset($donation['objective']) && $donation['objective'] === 'Healthcare' ? 'selected' : '' }}>
                    Healthcare</option>
                <option value="Emergency"
                    {{ isset($donation['objective']) && $donation['objective'] === 'Emergency' ? 'selected' : '' }}>
                    Emergency</option>
                <option value="Other"
                    {{ isset($donation['objective']) && $donation['objective'] === 'Other' ? 'selected' : '' }}>Other
                </option>
            </select>
        </div>

        <!-- Total Amount -->
        <div>
            <label for="total_amount" class="block text-sm font-medium text-gray-700">Total Amount Donated</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">$</span>
                </div>
                <input type="number" name="total_amount" id="total_amount" step="0.01" min="0" required
                    value="{{ $donation['total_amount'] ?? '' }}"
                    class="pl-7 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>

        <!-- Amount Spent -->
        <div>
            <label for="amount_spent" class="block text-sm font-medium text-gray-700">Amount Spent</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">$</span>
                </div>
                <input type="number" name="amount_spent" id="amount_spent" step="0.01" min="0" required
                    value="{{ $donation['amount_spent'] ?? '' }}"
                    class="pl-7 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>

        <!-- Storage Location -->
        <div>
            <label for="storage_location" class="block text-sm font-medium text-gray-700">Storage Location</label>
            <select name="storage_location" id="storage_location" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Select a location</option>
                <option value="Bank"
                    {{ isset($donation['storage_location']) && $donation['storage_location'] === 'Bank' ? 'selected' : '' }}>
                    Bank</option>
                <option value="Safe"
                    {{ isset($donation['storage_location']) && $donation['storage_location'] === 'Safe' ? 'selected' : '' }}>
                    Safe</option>
                <option value="Warehouse"
                    {{ isset($donation['storage_location']) && $donation['storage_location'] === 'Warehouse' ? 'selected' : '' }}>
                    Warehouse</option>
                <option value="Food Bank"
                    {{ isset($donation['storage_location']) && $donation['storage_location'] === 'Food Bank' ? 'selected' : '' }}>
                    Food Bank</option>
                <option value="Storage Unit"
                    {{ isset($donation['storage_location']) && $donation['storage_location'] === 'Storage Unit' ? 'selected' : '' }}>
                    Storage Unit</option>
                <option value="Other"
                    {{ isset($donation['storage_location']) && $donation['storage_location'] === 'Other' ? 'selected' : '' }}>
                    Other</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end space-x-3">
            <a href="/"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-md transition duration-300">
                Cancel
            </a>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                {{ $mode === 'create' ? 'Save Donation' : 'Update Donation' }}
            </button>
        </div>
    </form>
</div>
