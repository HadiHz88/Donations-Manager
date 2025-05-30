<x-app-layout>
    <x-slot name="title">Outcome - Donations Manager</x-slot>
    <x-slot name="header">Outcome</x-slot>
    <x-slot name="description">A list of all funds sent to external organizations.</x-slot>

    <!-- Filters and actions -->
    <div class="px-4 sm:px-0 mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
        <div class="w-full sm:w-64">
            <form action="{{ route('outcomes.index') }}" method="GET">
                <label for="search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input id="search" name="search" value="{{ request('search') }}" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Search outcomes" type="search">
                </div>
            </form>
        </div>
        <a href="{{ route('outcomes.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Add Outcome
        </a>
    </div>

    <!-- Outcomes table component -->
    <x-tables.outcome-table :outcomes="$outcomes" />
</x-app-layout>
