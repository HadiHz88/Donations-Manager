<x-app-layout>
    <x-slot name="title">{{ isset($outcome) ? 'Edit Outcome' : 'Add Outcome' }} - Donations Manager</x-slot>
    <x-slot name="header">{{ isset($outcome) ? 'Edit Outcome' : 'Add Outcome' }}</x-slot>
    <x-slot
        name="description">{{ isset($outcome) ? 'Update the details of an existing outcome.' : 'Record a new donation sent to an organization.' }}</x-slot>

    <!-- Outcome form component -->
    <x-forms.outcome-form :outcome="$outcome ?? null" :donations="$donations" :currencies="$currencies" />
</x-app-layout>
