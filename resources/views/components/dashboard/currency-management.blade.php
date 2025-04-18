<!-- resources/views/components/dashboard/currency-management.blade.php -->
@props(['currencies' => []])

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Currency Management</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Add, edit, or remove currencies used in donations.</p>
        </div>
        <button type="button" onclick="openCurrencyModal()"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Add Currency
        </button>
    </div>

    <div class="border-t border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Symbol
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Exchange
                        Rate
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($currencies as $currency)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $currency->code }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $currency->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $currency->symbol }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $currency->exchange_rate }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button type="button" onclick="editCurrency({{ json_encode($currency) }})"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3">Edit
                            </button>
                            <button type="button" onclick="deleteCurrency({{ $currency->id }})"
                                    class="text-red-600 hover:text-red-900">Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No
                            currencies found
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Currency Modal -->
    <div id="currencyModal"
         class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-md w-full">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="currencyModalTitle">Add New Currency</h3>
            </div>
            <form id="currencyForm" method="POST">
                @csrf
                <input type="hidden" id="currencyId" name="id">
                <input type="hidden" id="currencyMethod" name="_method" value="POST">

                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="code" class="block text-sm font-medium text-gray-700">Currency Code</label>
                            <input type="text" name="code" id="code"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   required maxlength="3" placeholder="USD">
                            <p class="mt-1 text-xs text-gray-500">3-letter currency code (e.g., USD, EUR, GBP)</p>
                        </div>

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Currency Name</label>
                            <input type="text" name="name" id="name"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   required placeholder="US Dollar">
                        </div>

                        <div>
                            <label for="symbol" class="block text-sm font-medium text-gray-700">Currency Symbol</label>
                            <input type="text" name="symbol" id="symbol"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   required maxlength="5" placeholder="$">
                        </div>

                        <div>
                            <label for="exchange_rate" class="block text-sm font-medium text-gray-700">Exchange
                                Rate</label>
                            <input type="number" name="exchange_rate" id="exchange_rate" step="0.0001" min="0"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   required placeholder="1.0">
                            <p class="mt-1 text-xs text-gray-500">Rate relative to base currency</p>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeCurrencyModal()"
                            class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </button>
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openCurrencyModal(currency = null) {
        const modal = document.getElementById('currencyModal');
        const form = document.getElementById('currencyForm');
        const title = document.getElementById('currencyModalTitle');

        // Reset form
        form.reset();
        document.getElementById('currencyId').value = '';
        document.getElementById('currencyMethod').value = 'POST';
        form.action = '{{ route('currencies.store') }}';

        // If editing, populate form
        if (currency) {
            document.getElementById('currencyId').value = currency.id;
            document.getElementById('code').value = currency.code;
            document.getElementById('name').value = currency.name;
            document.getElementById('symbol').value = currency.symbol;
            document.getElementById('exchange_rate').value = currency.exchange_rate;
            document.getElementById('currencyMethod').value = 'PUT';
            form.action = `/currencies/${currency.id}`;
            title.textContent = 'Edit Currency';
        } else {
            title.textContent = 'Add New Currency';
        }

        modal.classList.remove('hidden');
    }

    function editCurrency(currency) {
        openCurrencyModal(currency);
    }

    function closeCurrencyModal() {
        document.getElementById('currencyModal').classList.add('hidden');
    }

    function deleteCurrency(id) {
        if (confirm('Are you sure you want to delete this currency?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/currencies/${id}`;
            form.innerHTML = `
                @csrf
            @method('DELETE')
            `;
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
