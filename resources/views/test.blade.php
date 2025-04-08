<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Donations Manager UI Options</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Donations Manager UI Options</h1>
        <p class="text-gray-600 mb-8">Choose your preferred design for each component type. Your community will vote on
            these options.</p>

        <!-- Button Styles -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Button Styles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Option 1: Classic Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 1: Classic Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Solid black background with white text</p>
                    <div class="flex space-x-4">
                        <a href="/donations/create"
                            class="bg-black hover:bg-gray-800 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Add New Donation
                        </a>
                        <button
                            class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Edit
                        </button>
                        <button
                            class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Delete
                        </button>
                    </div>
                </div>

                <!-- Option 2: Outlined Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 2: Outlined Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Transparent with colored borders</p>
                    <div class="flex space-x-4">
                        <a href="/donations/create"
                            class="border-2 border-black text-black hover:bg-gray-50 font-medium py-2 px-4 rounded-md transition duration-300">
                            Add New Donation
                        </a>
                        <button
                            class="border-2 border-blue-500 text-blue-500 hover:bg-blue-50 font-medium py-2 px-4 rounded-md transition duration-300">
                            Edit
                        </button>
                        <button
                            class="border-2 border-red-500 text-red-500 hover:bg-red-50 font-medium py-2 px-4 rounded-md transition duration-300">
                            Delete
                        </button>
                    </div>
                </div>

                <!-- Option 3: Soft Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 3: Soft Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Light backgrounds with dark text</p>
                    <div class="flex space-x-4">
                        <a href="/donations/create"
                            class="bg-gray-100 text-gray-800 hover:bg-gray-200 font-medium py-2 px-4 rounded-md transition duration-300">
                            Add New Donation
                        </a>
                        <button
                            class="bg-blue-100 text-blue-700 hover:bg-blue-200 font-medium py-2 px-4 rounded-md transition duration-300">
                            Edit
                        </button>
                        <button
                            class="bg-red-100 text-red-700 hover:bg-red-200 font-medium py-2 px-4 rounded-md transition duration-300">
                            Delete
                        </button>
                    </div>
                </div>

                <!-- Option 4: Icon Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 4: Icon Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Buttons with icons</p>
                    <div class="flex space-x-4">
                        <a href="/donations/create"
                            class="bg-black hover:bg-gray-800 text-white font-medium py-2 px-4 rounded-md inline-flex items-center transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Add New Donation
                        </a>
                        <button
                            class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md inline-flex items-center transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit
                        </button>
                        <button
                            class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md inline-flex items-center transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Delete
                        </button>
                    </div>
                </div>

                <!-- Option 5: Gradient Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 5: Gradient Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Gradient backgrounds</p>
                    <div class="flex space-x-4">
                        <a href="/donations/create"
                            class="bg-gradient-to-r from-gray-700 to-black hover:from-gray-800 hover:to-gray-900 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Add New Donation
                        </a>
                        <button
                            class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Edit
                        </button>
                        <button
                            class="bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Delete
                        </button>
                    </div>
                </div>

                <!-- Option 6: Pill Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 6: Pill Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Rounded corners for a pill-like appearance</p>
                    <div class="flex space-x-4">
                        <a href="/donations/create"
                            class="bg-black hover:bg-gray-800 text-white font-medium py-2 px-6 rounded-full transition duration-300">
                            Add New Donation
                        </a>
                        <button
                            class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-full transition duration-300">
                            Edit
                        </button>
                        <button
                            class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-6 rounded-full transition duration-300">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Field Styles -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Input Field Styles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Option 1: Basic Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 1: Basic Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Simple input with border</p>
                    <div class="space-y-4">
                        <input type="text" placeholder="Enter donator name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                        <input type="number" placeholder="Enter amount"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                    </div>
                </div>

                <!-- Option 2: Labeled Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 2: Labeled Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Input with label above</p>
                    <div class="space-y-4">
                        <div>
                            <label for="donator_name" class="block text-sm font-medium text-gray-700 mb-1">Donator
                                Name</label>
                            <input type="text" id="donator_name" placeholder="Enter donator name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                        </div>
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                            <input type="number" id="amount" placeholder="Enter amount"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Option 3: Icon Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 3: Icon Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Input with icon</p>
                    <div class="space-y-4">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" placeholder="Search donations"
                                class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="number" placeholder="Enter amount"
                                class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Option 4: Prefix Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 4: Prefix Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Input with prefix</p>
                    <div class="space-y-4">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" placeholder="0.00"
                                class="w-full pl-7 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">@</span>
                            </div>
                            <input type="text" placeholder="username"
                                class="w-full pl-7 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Option 5: Validation Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 5: Validation Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Input with validation state</p>
                    <div class="space-y-4">
                        <div>
                            <input type="email" placeholder="Enter email"
                                class="w-full px-4 py-2 border border-red-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <p class="mt-1 text-sm text-red-600">Please enter a valid email address.</p>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter name"
                                class="w-full px-4 py-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <p class="mt-1 text-sm text-green-600">Name is valid.</p>
                        </div>
                    </div>
                </div>

                <!-- Option 6: Filled Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 6: Filled Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Input with filled background</p>
                    <div class="space-y-4">
                        <input type="text" placeholder="Enter donator name"
                            class="w-full px-4 py-2 bg-gray-100 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:bg-white">
                        <input type="number" placeholder="Enter amount"
                            class="w-full px-4 py-2 bg-gray-100 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:bg-white">
                    </div>
                </div>
            </div>
        </div>

        <!-- Select Dropdown Styles -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Select Dropdown Styles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Option 1: Basic Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 1: Basic Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Simple dropdown with border</p>
                    <select
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                        <option value="">Select a type</option>
                        <option value="Money">Money</option>
                        <option value="Clothes">Clothes</option>
                        <option value="Food">Food</option>
                        <option value="Books">Books</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Option 2: Labeled Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 2: Labeled Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Dropdown with label above</p>
                    <div>
                        <label for="donation_type" class="block text-sm font-medium text-gray-700 mb-1">Type of
                            Donation</label>
                        <select id="donation_type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                            <option value="">Select a type</option>
                            <option value="Money">Money</option>
                            <option value="Clothes">Clothes</option>
                            <option value="Food">Food</option>
                            <option value="Books">Books</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <!-- Option 3: Custom Styled Select -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 3: Custom Styled Select</h3>
                    <p class="text-sm text-gray-500 mb-4">Dropdown with custom styling and icon</p>
                    <div class="relative">
                        <select
                            class="appearance-none w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent bg-white cursor-pointer">
                            <option value="">Select an objective</option>
                            <option value="Education">Education</option>
                            <option value="Food">Food</option>
                            <option value="Housing">Housing</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Emergency">Emergency</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Option 4: Filled Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 4: Filled Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Dropdown with filled background</p>
                    <select
                        class="w-full px-4 py-2 bg-gray-100 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:bg-white">
                        <option value="">Select a type</option>
                        <option value="Money">Money</option>
                        <option value="Clothes">Clothes</option>
                        <option value="Food">Food</option>
                        <option value="Books">Books</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Option 5: Outlined Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 5: Outlined Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Dropdown with thicker border</p>
                    <select
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                        <option value="">Select a type</option>
                        <option value="Money">Money</option>
                        <option value="Clothes">Clothes</option>
                        <option value="Food">Food</option>
                        <option value="Books">Books</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Option 6: Validation Style -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 6: Validation Style</h3>
                    <p class="text-sm text-gray-500 mb-4">Dropdown with validation state</p>
                    <div>
                        <select
                            class="w-full px-4 py-2 border border-red-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <option value="">Select a type</option>
                            <option value="Money">Money</option>
                            <option value="Clothes">Clothes</option>
                            <option value="Food">Food</option>
                            <option value="Books">Books</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Other">Other</option>
                        </select>
                        <p class="mt-1 text-sm text-red-600">Please select a donation type.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Layout Styles -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Form Layout Styles</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Option 1: Basic Form -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 1: Basic Form</h3>
                    <p class="text-sm text-gray-500 mb-4">Single column layout with labels and inputs</p>
                    <form class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Donator
                                Name</label>
                            <input type="text" id="name" placeholder="Enter donator name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                        </div>
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type of
                                Donation</label>
                            <select id="type"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                <option value="">Select a type</option>
                                <option value="Money">Money</option>
                                <option value="Clothes">Clothes</option>
                                <option value="Food">Food</option>
                                <option value="Books">Books</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Total
                                Amount</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" id="amount" placeholder="0.00"
                                    class="w-full pl-7 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                            </div>
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-md transition duration-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="bg-black hover:bg-gray-800 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                                Save Donation
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Option 2: Two Column Form -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 2: Two Column Form</h3>
                    <p class="text-sm text-gray-500 mb-4">Responsive grid layout</p>
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name2" class="block text-sm font-medium text-gray-700 mb-1">Donator
                                    Name</label>
                                <input type="text" id="name2" placeholder="Enter donator name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                            </div>
                            <div>
                                <label for="type2" class="block text-sm font-medium text-gray-700 mb-1">Type of
                                    Donation</label>
                                <select id="type2"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                    <option value="">Select a type</option>
                                    <option value="Money">Money</option>
                                    <option value="Clothes">Clothes</option>
                                    <option value="Food">Food</option>
                                    <option value="Books">Books</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="objective"
                                    class="block text-sm font-medium text-gray-700 mb-1">Objective</label>
                                <select id="objective"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                    <option value="">Select an objective</option>
                                    <option value="Education">Education</option>
                                    <option value="Food">Food</option>
                                    <option value="Housing">Housing</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Emergency">Emergency</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Storage
                                    Location</label>
                                <select id="location"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                    <option value="">Select a location</option>
                                    <option value="Bank">Bank</option>
                                    <option value="Safe">Safe</option>
                                    <option value="Warehouse">Warehouse</option>
                                    <option value="Food Bank">Food Bank</option>
                                    <option value="Storage Unit">Storage Unit</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="amount2" class="block text-sm font-medium text-gray-700 mb-1">Total
                                    Amount</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" id="amount2" placeholder="0.00"
                                        class="w-full pl-7 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                </div>
                            </div>
                            <div>
                                <label for="spent" class="block text-sm font-medium text-gray-700 mb-1">Amount
                                    Spent</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" id="spent" placeholder="0.00"
                                        class="w-full pl-7 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-end space-x-3">
                            <button type="button"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-md transition duration-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="bg-black hover:bg-gray-800 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                                Save Donation
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Option 3: Card Form -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 3: Card Form</h3>
                    <p class="text-sm text-gray-500 mb-4">Form with card-like sections</p>
                    <form class="space-y-6">
                        <div class="bg-gray-50 p-4 rounded-md">
                            <h4 class="text-md font-medium text-gray-700 mb-3">Donor Information</h4>
                            <div class="space-y-4">
                                <div>
                                    <label for="name3" class="block text-sm font-medium text-gray-700 mb-1">Donator
                                        Name</label>
                                    <input type="text" id="name3" placeholder="Enter donator name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                </div>
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" id="email" placeholder="Enter email"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-md">
                            <h4 class="text-md font-medium text-gray-700 mb-3">Donation Details</h4>
                            <div class="space-y-4">
                                <div>
                                    <label for="type3" class="block text-sm font-medium text-gray-700 mb-1">Type of
                                        Donation</label>
                                    <select id="type3"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                        <option value="">Select a type</option>
                                        <option value="Money">Money</option>
                                        <option value="Clothes">Clothes</option>
                                        <option value="Food">Food</option>
                                        <option value="Books">Books</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="objective2"
                                        class="block text-sm font-medium text-gray-700 mb-1">Objective</label>
                                    <select id="objective2"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                        <option value="">Select an objective</option>
                                        <option value="Education">Education</option>
                                        <option value="Food">Food</option>
                                        <option value="Housing">Housing</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Emergency">Emergency</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-md">
                            <h4 class="text-md font-medium text-gray-700 mb-3">Financial Information</h4>
                            <div class="space-y-4">
                                <div>
                                    <label for="amount3" class="block text-sm font-medium text-gray-700 mb-1">Total
                                        Amount</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">$</span>
                                        </div>
                                        <input type="number" id="amount3" placeholder="0.00"
                                            class="w-full pl-7 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                    </div>
                                </div>
                                <div>
                                    <label for="spent2" class="block text-sm font-medium text-gray-700 mb-1">Amount
                                        Spent</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">$</span>
                                        </div>
                                        <input type="number" id="spent2" placeholder="0.00"
                                            class="w-full pl-7 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-md transition duration-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="bg-black hover:bg-gray-800 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                                Save Donation
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Option 4: Minimal Form -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Option 4: Minimal Form</h3>
                    <p class="text-sm text-gray-500 mb-4">Clean, minimal design with subtle styling</p>
                    <form class="space-y-6">
                        <div>
                            <label for="name4" class="block text-sm font-medium text-gray-700 mb-1">Donator
                                Name</label>
                            <input type="text" id="name4" placeholder="Enter donator name"
                                class="w-full px-3 py-2 border-b border-gray-300 focus:outline-none focus:border-black bg-transparent">
                        </div>
                        <div>
                            <label for="type4" class="block text-sm font-medium text-gray-700 mb-1">Type of
                                Donation</label>
                            <select id="type4"
                                class="w-full px-3 py-2 border-b border-gray-300 focus:outline-none focus:border-black bg-transparent">
                                <option value="">Select a type</option>
                                <option value="Money">Money</option>
                                <option value="Clothes">Clothes</option>
                                <option value="Food">Food</option>
                                <option value="Books">Books</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="objective3"
                                class="block text-sm font-medium text-gray-700 mb-1">Objective</label>
                            <select id="objective3"
                                class="w-full px-3 py-2 border-b border-gray-300 focus:outline-none focus:border-black bg-transparent">
                                <option value="">Select an objective</option>
                                <option value="Education">Education</option>
                                <option value="Food">Food</option>
                                <option value="Housing">Housing</option>
                                <option value="Healthcare">Healthcare</option>
                                <option value="Emergency">Emergency</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="amount4" class="block text-sm font-medium text-gray-700 mb-1">Total
                                Amount</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" id="amount4" placeholder="0.00"
                                    class="w-full pl-6 px-3 py-2 border-b border-gray-300 focus:outline-none focus:border-black bg-transparent">
                            </div>
                        </div>
                        <div class="flex justify-end space-x-3 pt-4">
                            <button type="button"
                                class="text-gray-600 hover:text-gray-800 font-medium py-2 px-4 transition duration-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="bg-black hover:bg-gray-800 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                                Save Donation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
