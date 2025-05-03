<!-- resources/views/components/dashboard/objective-management.blade.php -->
@props(['objectives' => [], 'currencies' => []])

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Objective Management</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Add, edit, or remove donation objectives.</p>
        </div>
        <button type="button" onclick="openObjectiveModal()" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Add Objective
        </button>
    </div>

    <div class="border-t border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($objectives as $objective)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $objective->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($objective->description, 50) }}</td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button type="button" onclick="editObjective({{ json_encode($objective) }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                            <button type="button" onclick="deleteObjective({{ $objective->id }})" class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No objectives found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Objective Modal -->
    <div id="objectiveModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-lg w-full">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="objectiveModalName">Add New Objective</h3>
            </div>
            <form id="objectiveForm" method="POST">
                @csrf
                <input type="hidden" id="objectiveId" name="id">
                <input type="hidden" id="objectiveMethod" name="_method" value="POST">

                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required placeholder="Food Distribution">
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required placeholder="Provide details about this objective"></textarea>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeObjectiveModal()" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </button>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openObjectiveModal(objective = null) {
        const modal = document.getElementById('objectiveModal');
        const form = document.getElementById('objectiveForm');
        const name = document.getElementById('objectiveModalName');

        // Reset form
        form.reset();
        document.getElementById('objectiveId').value = '';
        document.getElementById('objectiveMethod').value = 'POST';
        form.action = '{{ route('objectives.store') }}';

        // If editing, populate form
        if (objective) {
            document.getElementById('objectiveId').value = objective.id;
            document.getElementById('name').value = objective.name;
            document.getElementById('description').value = objective.description;
            document.getElementById('objectiveMethod').value = 'PUT';
            form.action = `/objectives/${objective.id}`;
            name.textContent = 'Edit Objective';
        } else {
            name.textContent = 'Add New Objective';
        }

        modal.classList.remove('hidden');
    }

    function editObjective(objective) {
        openObjectiveModal(objective);
    }

    function closeObjectiveModal() {
        document.getElementById('objectiveModal').classList.add('hidden');
    }

    function deleteObjective(id) {
        if (confirm('Are you sure you want to delete this objective?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/objectives/${id}`;
            form.innerHTML = `
                @csrf
            @method('DELETE')
            `;
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
