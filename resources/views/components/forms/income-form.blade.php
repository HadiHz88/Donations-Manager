@props(['objectives' => null, 'currencies' => null, 'donation' => null, 'route' => 'donations.store'])

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <form action="{{ $donation ? route('donations.update', $donation['id']) : route($route) }}" method="POST">
        @csrf
        @if ($donation)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $donation['id'] }}">
        @endif

        <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <!-- Donor Name -->
                <div class="sm:col-span-3">
                    <label for="donor_name" class="block text-sm font-medium text-gray-700">Donor Name</label>
                    <div class="mt-1">
                        <input type="text" name="donor_name" id="donor_name"
                            value="{{ old('donor_name', $donation['donor_name'] ?? '') }}"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            required>
                    </div>
                    @error('donor_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Total Amount -->
                <div class="sm:col-span-3">
                    <label for="total_amount" class="block text-sm font-medium text-gray-700">Total Amount</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" name="total_amount" id="total_amount"
                            value="{{ old('total_amount', $donation['total_amount'] ?? '') }}" min="0"
                            step="0.01"
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            placeholder="0.00" required>
                    </div>
                    @error('total_amount')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Currency -->
                <div class="sm:col-span-3">
                    <label for="currency" class="block text-sm font-medium text-gray-700">Currency</label>
                    <div class="mt-1">
                        <select id="currency" name="currency"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            required>
                            <option value="">Select a currency</option>
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency->id }}"
                                    {{ old('currency', $donation['currency'] ?? '') == $currency->id ? 'selected' : '' }}>
                                    {{ $currency->code }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('currency')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Objective -->
                <div class="sm:col-span-3">
                    <label for="objective" class="block text-sm font-medium text-gray-700">Objective</label>
                    <div class="mt-1">
                        <select id="objective" name="objective"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            required>
                            <option value="">Select an objective</option>
                            @foreach ($objectives as $objective)
                                <option value="{{ $objective->id }}"
                                    {{ old('objective', $donation['objective'] ?? '') == $objective->id ? 'selected' : '' }}>
                                    {{ $objective->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('objective')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Storage Location -->
                <div class="sm:col-span-3">
                    <label for="storage_location" class="block text-sm font-medium text-gray-700">Storage
                        Location</label>
                    <div class="mt-1">
                        <select id="storage_location" name="storage_location"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            required>
                            <option value="">Select a location</option>
                            <option value="Bank"
                                {{ old('storage_location', $donation['storage_location'] ?? '') == 'Bank' ? 'selected' : '' }}>
                                Bank</option>
                            <option value="Safe"
                                {{ old('storage_location', $donation['storage_location'] ?? '') == 'Safe' ? 'selected' : '' }}>
                                Safe</option>
                            <option value="Warehouse"
                                {{ old('storage_location', $donation['storage_location'] ?? '') == 'Warehouse' ? 'selected' : '' }}>
                                Warehouse</option>
                            <option value="Food Bank"
                                {{ old('storage_location', $donation['storage_location'] ?? '') == 'Food Bank' ? 'selected' : '' }}>
                                Food Bank</option>
                            <option value="Storage Unit"
                                {{ old('storage_location', $donation['storage_location'] ?? '') == 'Storage Unit' ? 'selected' : '' }}>
                                Storage Unit</option>
                            <option value="Other"
                                {{ old('storage_location', $donation['storage_location'] ?? '') == 'Other' ? 'selected' : '' }}>
                                Other</option>
                        </select>
                    </div>
                    @error('storage_location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-end space-x-3">
            <a href="{{ route('donations.index') }}"
                class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
            </a>
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ $donation ? 'Update Donation' : 'Save Donation' }}
            </button>
        </div>
    </form>
</div>
