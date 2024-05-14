<!-- resources/views/admin/contact_forms/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Form Submission Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <a href="{{ route('admin.contact_forms.index') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Back to Submissions') }}
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('ID') }}
                                </h3>
                                <p class="text-gray-900 dark:text-gray-100">{{ $submission->id }}</p>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('Name') }}
                                </h3>
                                <p class="text-gray-900 dark:text-gray-100">{{ $submission->name }}</p>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('Email') }}
                                </h3>
                                <p class="text-gray-900 dark:text-gray-100">{{ $submission->email }}</p>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('Phone') }}
                                </h3>
                                <p class="text-gray-900 dark:text-gray-100">{{ $submission->phone }}</p>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-2">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ __('Service Type') }}</h3>
                                <p class="text-gray-900 dark:text-gray-100">
                                    {{ implode(', ', (array) $submission->service_type) }}</p>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-2">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('Message') }}
                                </h3>
                                <p class="text-gray-900 dark:text-gray-100">{{ $submission->message }}</p>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ __('Submitted At') }}</h3>
                                <p class="text-gray-900 dark:text-gray-100">
                                    {{ $submission->created_at->format('d-m-Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
