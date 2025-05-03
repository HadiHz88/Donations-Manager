<x-app-layout>
    <x-slot name="title">Income - Donations Manager</x-slot>
    <x-slot name="header">Income</x-slot>
    <x-slot name="description">A list of all donations received.</x-slot>

    <!-- Filters and actions card -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
        <div class="px-4 py-5 sm:px-6 bg-gray-50 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Search & Filters</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Find and filter donations by various criteria</p>
                </div>
                <div>
                    <a href="{{ route('donations.create') }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                  clip-rule="evenodd"/>
                        </svg>
                        Add Donation
                    </a>
                </div>
            </div>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <form action="{{ route('donations.index') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-4">
                    <!-- Search input -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input id="search" name="search" value="{{ $filters['search'] ?? '' }}"
                                   class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   placeholder="Donor name or Reference ID" type="search">
                        </div>
                    </div>

                    <!-- Objective filter -->
                    <div>
                        <label for="objective" class="block text-sm font-medium text-gray-700">Objective</label>
                        <select id="objective" name="objective"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">All Objectives</option>
                            @foreach($objectives as $objective)
                                <option
                                    value="{{ $objective->id }}" {{ isset($filters['objective']) && $filters['objective'] == $objective->id ? 'selected' : '' }}>
                                    {{ $objective->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Storage location filter -->
                    <div>
                        <label for="storage_location" class="block text-sm font-medium text-gray-700">Storage
                            Location</label>
                        <select id="storage_location" name="storage_location"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">All Locations</option>
                            @foreach($storageLocations as $location)
                                <option
                                    value="{{ $location }}" {{ isset($filters['storage_location']) && $filters['storage_location'] == $location ? 'selected' : '' }}>
                                    {{ $location }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Amount range filters -->
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="min_amount" class="block text-sm font-medium text-gray-700">Min Amount</label>
                            <input type="number" name="min_amount" id="min_amount"
                                   value="{{ $filters['min_amount'] ?? '' }}" step="0.01" min="0"
                                   class="mt-1 block w-full pl-3 pr-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                   placeholder="Min amount">
                        </div>

                        <div class="w-1/2">
                            <label for="max_amount" class="block text-sm font-medium text-gray-700">Max Amount</label>
                            <input type="number" name="max_amount" id="max_amount"
                                   value="{{ $filters['max_amount'] ?? '' }}" step="0.01" min="0"
                                   class="mt-1 block w-full pl-3 pr-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                   placeholder="Max amount">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                    <div class="text-sm text-gray-500">
                        @if(array_filter($filters ?? []))
                            <span class="font-medium text-indigo-600">Filters applied</span>
                            - {{ count(array_filter($filters ?? [])) }} active filter(s)
                        @else
                            No filters applied - showing all donations
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Apply Filters
                        </button>

                        <a href="{{ route('donations.index') }}"
                           class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-400"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Donations table component -->
    <x-tables.donation-table :donations="$donations"/>
</x-app-layout>
