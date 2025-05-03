<x-app-layout>
    <x-slot name="title">Dashboard - Donations Manager</x-slot>
    <x-slot name="header">Dashboard</x-slot>
    <x-slot name="description">Manage your donations system configurations.</x-slot>

    <div class="space-y-8">
        <!-- Statistics summary -->
        <x-dashboard.statistics
            :totalIncome="$totalIncome"
            :totalOutcome="$totalOutcome"
            :remainingFunds="$remainingFunds"
            :distributionData="$distributionData"
            :monthlyTrends="$monthlyTrends"
            :recentActivities="$recentActivities"
        />

        <!-- Currency Management Section -->
        <x-dashboard.currency-management :currencies="$currencies" />

        <!-- Objective Management Section -->
        <x-dashboard.objective-management :objectives="$objectives" :currencies="$currencies" />
    </div>
</x-app-layout>
