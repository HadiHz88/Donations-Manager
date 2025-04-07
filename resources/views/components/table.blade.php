@props(['donations'])

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Donation Records</h1>
        <button
            class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition duration-300">
            Add New Donation
        </button>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Donator Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Objective
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total Amount
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Amount Spent
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Storage Location
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($donations as $donation)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $donation['donator_name'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $donation['donation_type'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $donation['objective'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                ${{ number_format($donation['total_amount'], 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                ${{ number_format($donation['amount_spent'], 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $donation['storage_location'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                <button class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Mobile view (cards) -->
    <div class="md:hidden mt-6">
        <h2 class="text-xl font-semibold mb-4">Donation Records (Mobile View)</h2>
        @foreach ($donations as $donation)
            <div class="bg-white rounded-lg shadow mb-4 p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-medium text-gray-900">{{ $donation['donator_name'] }}</h3>
                    <div class="flex space-x-2">
                        <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                        <button class="text-red-600 hover:text-red-900">Delete</button>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div>
                        <p class="text-gray-500">Type:</p>
                        <p class="font-medium">{{ $donation['donation_type'] }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Objective:</p>
                        <p class="font-medium">{{ $donation['objective'] }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Total Amount:</p>
                        <p class="font-medium">${{ number_format($donation['total_amount'], 2) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Amount Spent:</p>
                        <p class="font-medium">${{ number_format($donation['amount_spent'], 2) }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-gray-500">Storage Location:</p>
                        <p class="font-medium">{{ $donation['storage_location'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
