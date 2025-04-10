@props(['outcome' => null, 'donations' => [], 'route' => 'outcomes.store'])

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <form action="{{ $outcome ? route('outcomes.update', $outcome->id) : route($route) }}" method="POST">
        @csrf
        @if($outcome)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $outcome->id }}">
        @endif

        <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <!-- Reference ID (shown in edit mode) -->
                @if($outcome)
                    <div class="sm:col-span-3">
                        <label for="reference_id" class="block text-sm font-medium text-gray-700">Reference ID</label>
                        <div class="mt-1">
                            <input type="text" name="reference_id" id="reference_id" value="{{ $outcome->reference_id ?? '' }}" readonly class="bg-gray-100 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">This ID is auto-generated and cannot be changed.</p>
                    </div>
                @endif

                <!-- Amount Sent -->
                <div class="sm:col-span-3">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount Sent</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">$</span>
                        </div>
                        <input type="number" name="amount" id="amount" value="{{ old('amount', $outcome->amount ?? '') }}" min="0" step="0.01" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">USD</span>
                        </div>
                    </div>
                    @error('amount')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Target Organization -->
                <div class="sm:col-span-3">
                    <label for="target_organization" class="block text-sm font-medium text-gray-700">Target Organization</label>
                    <div class="mt-1">
                        <input type="text" name="target_organization" id="target_organization" value="{{ old('target_organization', $outcome->target_organization ?? '') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                    @error('target_organization')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Source Donation -->
                <div class="sm:col-span-3">
                    <label for="source_donation_id" class="block text-sm font-medium text-gray-700">Source Donation</label>
                    <div class="mt-1">
                        <select id="source_donation_id" name="source_donation_id" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                            <option value="">Select a source donation</option>
                            @foreach($donations as $donation)
                                <option value="{{ $donation->id }}" {{ old('source_donation_id', $outcome->source_donation_id ?? '') == $donation->id ? 'selected' : '' }}>
                                    {{ $donation->reference_id }} - {{ $donation->donor_name }} (${{ number_format($donation->amount, 2) }}) - {{ $donation->objective }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Select the donation from which these funds are being sent.</p>
                    @error('source_donation_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date Sent -->
                <div class="sm:col-span-3">
                    <label for="date_sent" class="block text-sm font-medium text-gray-700">Date Sent</label>
                    <div class="mt-1">
                        <input type="date" name="date_sent" id="date_sent" value="{{ old('date_sent', $outcome ? $outcome->date_sent->format('Y-m-d') : date('Y-m-d')) }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                    @error('date_sent')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Payment Method -->
                <div class="sm:col-span-3">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                    <div class="mt-1">
                        <select id="payment_method" name="payment_method" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="">Select a payment method</option>
                            <option value="Bank Transfer" {{ old('payment_method', $outcome->payment_method ?? '') == "Bank Transfer" ? 'selected' : '' }}>Bank Transfer</option>
                            <option value="Cash" {{ old('payment_method', $outcome->payment_method ?? '') == "Cash" ? 'selected' : '' }}>Cash</option>
                            <option value="Check" {{ old('payment_method', $outcome->payment_method ?? '') == "Check" ? 'selected' : '' }}>Check</option>
                            <option value="Other" {{ old('payment_method', $outcome->payment_method ?? '') == "Other" ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    @error('payment_method')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="sm:col-span-6">
                    <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                    <div class="mt-1">
                        <textarea id="notes" name="notes" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('notes', $outcome->notes ?? '') }}</textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Any additional information about this transaction.</p>
                    @error('notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Receipt Information -->
                <div class="sm:col-span-6">
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                            <input id="receipt_received" name="receipt_received" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ old('receipt_received', $outcome->receipt_received ?? false) ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="receipt_received" class="font-medium text-gray-700">Receipt Received</label>
                            <p class="text-gray-500">Check if you have received a receipt for this transaction.</p>
                        </div>
                    </div>
                    @error('receipt_received')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-end space-x-3">
            <a href="{{ route('outcomes.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ $outcome ? 'Update Outcome' : 'Save Outcome' }}
            </button>
        </div>
    </form>
</div>
