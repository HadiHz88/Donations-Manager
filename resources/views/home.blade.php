<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Donations Manager</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @php
        $donations = [
            [
                'id' => 1,
                'donator_name' => 'John Smith',
                'donation_type' => 'Money',
                'objective' => 'Education',
                'total_amount' => 5000,
                'amount_spent' => 3500,
                'storage_location' => 'Bank',
            ],
            [
                'id' => 2,
                'donator_name' => 'Sarah Johnson',
                'donation_type' => 'Clothes',
                'objective' => 'Housing',
                'total_amount' => 200,
                'amount_spent' => 0,
                'storage_location' => 'Warehouse',
            ],
            [
                'id' => 3,
                'donator_name' => 'Michael Brown',
                'donation_type' => 'Food',
                'objective' => 'Food',
                'total_amount' => 1000,
                'amount_spent' => 750,
                'storage_location' => 'Food Bank',
            ],
            [
                'id' => 4,
                'donator_name' => 'Emily Davis',
                'donation_type' => 'Money',
                'objective' => 'Housing',
                'total_amount' => 3000,
                'amount_spent' => 1200,
                'storage_location' => 'Bank',
            ],
            [
                'id' => 5,
                'donator_name' => 'Robert Wilson',
                'donation_type' => 'Clothes',
                'objective' => 'Education',
                'total_amount' => 150,
                'amount_spent' => 0,
                'storage_location' => 'Warehouse',
            ],
        ];
    @endphp

    <x-table :donations="$donations" />
</body>

</html>
