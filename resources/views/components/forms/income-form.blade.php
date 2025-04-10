@props(['donation' => null, 'route' => 'donations.store'])

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <form action="{{ $donation ? route('donations.update', $donation->id) : route($route) }}" method="POST">
        @csrf
        @if($donation)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $donation->id }}">
        @endif

        <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <!-- Reference ID (shown in edit mode) -->
                @if($donation)
                <div class="sm:col-span-3">
                    <label for="reference_id" class="block text-sm font-medium text-gray-700">Reference ID</label>
                    <div class="mt-1">
                        <input type="text" name="reference_id" id="reference_id" value="{{ $donation->reference_id ?? '' }}" readonly class="bg-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">This ID is auto-generated and cannot be changed.</p>
                </div>
                @endif

                <!-- Donor Name -->
                <div class="sm:col-span-3">
                    <label for="donor_name" class="block text-sm font-medium text-gray-700">Donor Name</label>
                    <div class="mt-1">
                        <input type="text" name="donor_name" id="donor_name" value="{{ old('donor_name', $donation->donor_name ?? '') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                    @error('donor_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="sm:col-span-3">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">$</span>
                        </div>
                        <input type="number" name="amount" id="amount" value="{{ old('amount', $donation->amount ?? '') }}" min="0" step="0.01" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">USD</span>
                        </div>
                    </div>
                    @error('amount')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Objective -->
                <div class="sm:col-span-3">
                    <label for="objective" class="block text-sm font-medium text-gray-700">Objective</label>
                    <div class="mt-1">
                        <select id="objective" name="objective" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                            <option value="">Select an objective</option>
                            <option value="Orphans' Education" {{ old('objective', $donation->objective ?? '') == "Orphans' Education" ? 'selected' : '' }}>Orphans' Education</option>
                            <option value="Medical Supplies" {{ old('objective', $donation->objective ?? '') == "Medical Supplies" ? 'selected' : '' }}>Medical Supplies</option>
                            <option value="Food Distribution" {{ old('objective', $donation->objective ?? '') == "Food Distribution" ? 'selected' : '' }}>Food Distribution</option>
                            <option value="Clean Water Initiative" {{ old('objective', $donation->objective ?? '') == "Clean Water Initiative" ? 'selected' : '' }}>Clean Water Initiative</option>
                            <option value="Disaster Relief" {{ old('objective', $donation->objective ?? '') == "Disaster Relief" ? 'selected' : '' }}>Disaster Relief</option>
                            <option value="Other" {{ old('objective', $donation->objective ?? '') == "Other" ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    @error('objective')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Storage Location -->
                <div class="sm:col-span-3">
                    <label for="storage_location" class="block text-sm font-medium text-gray-700">Storage Location</label>
                    <div class="mt-1">
                        <select id="storage_location" name="storage_location" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                            <option value="">Select a location</option>
                            <option value="Main Safe" {{ old('storage_location', $donation->storage_location ?? '') == "Main Safe" ? 'selected' : '' }}>Main Safe</option>
                            <option value="Secondary Safe" {{ old('storage_location', $donation->storage_location ?? '') == "Secondary Safe" ? 'selected' : '' }}>Secondary Safe</option>
                            <option value="Bank Account" {{ old('storage_location', $donation->storage_location ?? '') == "Bank Account" ? 'selected' : '' }}>Bank Account</option>
                            <option value="Other" {{ old('storage_location', $donation->storage_location ?? '') == "Other" ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    @error('storage_location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date Received -->
                <div class="sm:col-span-3">
                    <label for="date_received" class="block text-sm font-medium text-gray-700">Date Received</label>
                    <div class="mt-1">
                        <input type="date" name="date_received" id="date_received" value="{{ old('date_received', $donation ? $donation->date_received->format('Y-m-d') : date('Y-m-d')) }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                    @error('date_received')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Additional Notes -->
                <div class="sm:col-span-6">
                    <label for="notes" class="block text-sm font-medium text-gray-700">Additional Notes</label>
                    <div class="mt-1">
                        <textarea id="notes" name="notes" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('notes', $donation->notes ?? '') }}</textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Brief description or any additional information about this donation.</p>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-end space-x-3">
            <a href="{{ route('donations.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ $donation ? 'Update Donation' : 'Save Donation' }}
            </button>
        </div>
    </form>
</div>
