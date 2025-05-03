@props(['totalIncome', 'totalOutcome', 'remainingFunds', 'distributionData', 'monthlyTrends', 'recentActivities'])

<div>
    <!-- Stats cards -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-1 lg:grid-cols-3 mb-8">
        <!-- Total Income -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
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
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
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
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
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

    <!-- Charts -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <!-- Funds Distribution Chart -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Funds Distribution</h3>
                <div class="mt-5">
                    <canvas id="distributionChart" class="w-full" height="250"></canvas>
                </div>
            </div>
        </div>

        <!-- Monthly Trends -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Monthly Trends</h3>
                <div class="mt-5">
                    <canvas id="trendChart" class="w-full" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Distribution Chart
            const distributionData = @json($distributionData);

            new Chart(document.getElementById('distributionChart'), {
                type: 'bar',
                data: {
                    labels: distributionData.map(item => item.name),
                    datasets: [{
                        label: 'Distribution (%)',
                        data: distributionData.map(item => item.percentage),
                        backgroundColor: 'rgba(79, 70, 229, 0.8)',
                        borderColor: 'rgba(79, 70, 229, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.raw + '%';
                                }
                            }
                        }
                    }
                }
            });

            // Monthly Trends Chart
            const trendsData = @json($monthlyTrends);

            new Chart(document.getElementById('trendChart'), {
                type: 'line',
                data: {
                    labels: trendsData.months,
                    datasets: [
                        {
                            label: 'Income',
                            data: trendsData.income,
                            borderColor: 'rgba(79, 70, 229, 1)',
                            backgroundColor: 'rgba(79, 70, 229, 0.2)',
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'Outcome',
                            data: trendsData.outcome,
                            borderColor: 'rgba(220, 38, 38, 1)',
                            backgroundColor: 'rgba(220, 38, 38, 0.2)',
                            fill: true,
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    if (value >= 1000) {
                                        return '$' + value / 1000 + 'k';
                                    }
                                    return '$' + value;
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': $' + context.raw.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

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
                    <div
                        class="{{ $loop->even ? 'bg-white' : 'bg-gray-50' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ $activity->date->format('M d, Y') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $activity->type === 'income' ? 'bg-green-100 text-green-800' : ($activity->type === 'outcome' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }} mr-2">
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
