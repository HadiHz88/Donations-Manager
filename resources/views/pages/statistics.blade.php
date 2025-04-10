<x-app-layout>
    <x-slot name="title">Statistics - Donations Manager</x-slot>
    <x-slot name="header">Statistics</x-slot>
    <x-slot name="description">Overview of donation statistics and metrics.</x-slot>

    <!-- Statistics dashboard component -->
    <x-dashboard.statistics
        :totalIncome="$totalIncome"
        :totalOutcome="$totalOutcome"
        :remainingFunds="$remainingFunds"
        :completedObjectives="$completedObjectives"
        :distributionData="$distributionData"
        :monthlyTrends="$monthlyTrends"
        :recentActivities="$recentActivities"
    />
</x-app-layout>
