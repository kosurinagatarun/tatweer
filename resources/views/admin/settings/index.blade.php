<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-4 px-4">
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.settings.edit') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit
                Settings</a>
        </div>
        <h1 class="text-2xl font-semibold mb-4 text-white">Settings Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                    <div class="text-lg font-semibold mb-2">Featured Image:</div>
                    <div class="flex items-center justify-center">
                        @if ($setting && $setting->featured_image)
                            <img src="{{ asset('storage/' . $setting->featured_image) }}" alt="Featured Image"
                                class="w-20 md:w-full h-auto">
                        @else
                            No featured image set
                        @endif
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                    <div class="text-lg font-semibold mb-2">Meta Title:</div>
                    <div>{{ $setting->meta_title ?? 'Not set' }}</div>
                </div><br>
                <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                    <div class="text-lg font-semibold mb-2">Meta Description:</div>
                    <div>{{ $setting->meta_description ?? 'Not set' }}</div>
                </div><br>
                <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                    <div class="text-lg font-semibold mb-2">Google Search Console:</div>
                    <div>{{ $setting->google_search_console ?? 'Not set' }}</div>
                </div>
            </div>
            <div>
                <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                    <div class="text-lg font-semibold mb-2">Google Analytics:</div>
                    <div>{{ $setting->google_analytics ?? 'Not set' }}</div>
                </div><br>
                <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                    <div class="text-lg font-semibold mb-2">Google Tag Manager:</div>
                    <div>{{ $setting->google_tag_manager ?? 'Not set' }}</div>
                </div><br>
                <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                    <div class="text-lg font-semibold mb-2">Pixel Code:</div>
                    <div>{{ $setting->pixel_code ?? 'Not set' }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
