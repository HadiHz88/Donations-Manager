<x-app-layout>
    <x-slot name="title">{{ isset($donation) ? 'Edit Donation' : 'Add Donation' }} - Donations Manager</x-slot>
    <x-slot name="header">{{ isset($donation) ? 'Edit Donation' : 'Add Donation' }}</x-slot>
    <x-slot name="description">{{ isset($donation) ? 'Update the details of an existing donation.' : 'Record a new donation received.' }}</x-slot>

    <!-- Income form component -->
    <x-forms.income-form
        :objectives="$objectives ?? null"
        :currencies="$currencies ?? null"
        :donation="$donation ?? null"
    />
</x-app-layout>
