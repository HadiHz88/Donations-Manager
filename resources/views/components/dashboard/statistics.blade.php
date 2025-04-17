@props([
    'totalIncome',
    'totalOutcome',
    'remainingFunds',
    'distributionData',
    'monthlyTrends'
])

<div>
    <!-- Stats cards -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-1 lg:grid-cols-3 mb-8">
        <!-- Total Income -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total Income
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    ${{ number_format($totalIncome, 2) }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <div class="text-sm">
                    <a href="{{ route('donations.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        View all<span class="sr-only"> income</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Total Outcome -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total Outcome
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    ${{ number_format($totalOutcome, 2) }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <div class="text-sm">
                    <a href="{{ route('outcomes.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        View all<span class="sr-only"> outcome</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Remaining Funds -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Remaining Funds
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    ${{ number_format($remainingFunds, 2) }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <div class="text-sm">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                        View details
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and additional stats -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <!-- Funds Distribution Chart -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Funds Distribution</h3>
                <div class="mt-5">
                    <!-- Simple bar chart using pure HTML/CSS -->
                    <div class="space-y-4">
                        @foreach($distributionData as $item)
                            <div>
                                <div class="flex items-center">
                                    <div class="w-32 text-sm font-medium text-gray-600">{{ $item['name'] }}</div>
                                    <div class="flex-1 ml-4">
                                        <div class="relative h-4 bg-gray-200 rounded-full">
                                            <div class="absolute h-4 bg-indigo-600 rounded-full" style="width: {{ $item['percentage'] }}%"></div>
                                        </div>
                                    </div>
                                    <div class="ml-3 text-sm font-medium text-gray-600">{{ $item['percentage'] }}%</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Trends -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Monthly Trends</h3>
                <div class="mt-5">
                    <!-- Simple line chart using pure HTML/CSS -->
                    <div class="relative h-64">
                        <!-- Y-axis labels -->
                        <div class="absolute inset-y-0 left-0 flex flex-col justify-between text-xs text-gray-500 py-2">
                            <div>$4k</div>
                            <div>$3k</div>
                            <div>$2k</div>
                            <div>$1k</div>
                            <div>$0</div>
                        </div>

                        <!-- Chart area -->
                        <div class="absolute inset-0 ml-8 mr-2">
                            <!-- Horizontal grid lines -->
                            <div class="absolute inset-0 flex flex-col justify-between">
                                <div class="border-t border-gray-200 h-0"></div>
                                <div class="border-t border-gray-200 h-0"></div>
                                <div class="border-t border-gray-200 h-0"></div>
                                <div class="border-t border-gray-200 h-0"></div>
                                <div class="border-t border-gray-200 h-0"></div>
                            </div>

                            <!-- Income line -->
                            <div class="absolute bottom-0 left-0 right-0 flex items-end">
                                @foreach($monthlyTrends['income'] as $index => $value)
                                    @php
                                        $height = ($value / 4000) * 100; // Scale to percentage of max height (4k)
                                        $heightPx = ($height * 64) / 100; // Convert to pixels (64px is chart height)
                                    @endphp
                                    <div class="w-1/{{ count($monthlyTrends['income']) }} h-{{ round($heightPx) }} bg-indigo-100 border-t-2 border-indigo-500 relative">
                                        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-2 h-2 bg-indigo-500 rounded-full"></div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Outcome line -->
                            <div class="absolute bottom-0 left-0 right-0 flex items-end">
                                @foreach($monthlyTrends['outcome'] as $index => $value)
                                    @php
                                        $height = ($value / 4000) * 100; // Scale to percentage of max height (4k)
                                        $heightPx = ($height * 64) / 100; // Convert to pixels (64px is chart height)
                                    @endphp
                                    <div class="w-1/{{ count($monthlyTrends['outcome']) }} h-{{ round($heightPx) }} border-t-2 border-red-500 relative">
                                        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-2 h-2 bg-red-500 rounded-full"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- X-axis labels -->
                        <div class="absolute bottom-0 left-0 right-0 flex justify-between text-xs text-gray-500 pt-2 ml-8">
                            @foreach($monthlyTrends['months'] as $month)
                                <div>{{ $month }}</div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Legend -->
                    <div class="mt-4 flex justify-center space-x-8">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-indigo-500 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600">Income</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600">Outcome</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Recent Activity
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Latest donations and disbursements.
            </p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                @forelse($recentActivities ?? [] as $activity)
                    <div class="{{ $loop->even ? 'bg-white' : 'bg-gray-50' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ $activity->date->format('M d, Y') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $activity->type === 'income' ? 'bg-green-100 text-green-800' : ($activity->type === 'outcome' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }} mr-2">
                                {{ ucfirst($activity->type) }}
                            </span>
                            {{ $activity->description }}
                        </dd>
                    </div>
                @empty
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            No recent activity
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            There is no recent activity to display.
                        </dd>
                    </div>
                @endforelse
            </dl>
        </div>
    </div>
</div>
