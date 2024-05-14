<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Settings') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-4 px-4">
        <div class="flex justify-end mb-4">
            <a href="{{ route('setting') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back
                to Dashboard</a>
        </div>
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    @if ($setting && $setting->featured_image)
                        <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                            <div class="text-lg font-semibold mb-2">Previous Featured Image:</div>
                            <img src="{{ asset('storage/' . $setting->featured_image) }}" alt="Featured Image"
                                class="w-full mb-4">
                        </div><br>
                    @endif
                    <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                        <div class="text-lg font-semibold mb-2">Featured Image:</div>
                        <input type="file" name="featured_image" accept="image/*" class="w-full">
                    </div>
                </div>
                <div>
                    <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                        <div class="text-lg font-semibold mb-2">Meta Title:</div>
                        <input type="text" name="meta_title" value="{{ $setting->meta_title ?? '' }}"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-blue-300 focus:ring focus:ring-blue-200 rounded-md">
                    </div><br>
                    <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                        <div class="text-lg font-semibold mb-2">Meta Description:</div>
                        <textarea name="meta_description"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-blue-300 focus:ring focus:ring-blue-200 rounded-md">{{ $setting->meta_description ?? '' }}</textarea>
                    </div><br>
                    <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                        <div class="text-lg font-semibold mb-2">Google Search Console:</div>
                        <input type="text" name="google_search_console"
                            value="{{ $setting->google_search_console ?? '' }}"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-blue-300 focus:ring focus:ring-blue-200 rounded-md">
                    </div>

                </div>
                <div>
                    <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                        <div class="text-lg font-semibold mb-2">Google Analytics:</div>
                        <input type="text" name="google_analytics" value="{{ $setting->google_analytics ?? '' }}"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-blue-300 focus:ring focus:ring-blue-200 rounded-md">
                    </div><br>
                    <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                        <div class="text-lg font-semibold mb-2">Google Tag Manager:</div>
                        <input type="text" name="google_tag_manager" value="{{ $setting->google_tag_manager ?? '' }}"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-blue-300 focus:ring focus:ring-blue-200 rounded-md">
                    </div><br>
                    <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg text-white">
                        <div class="text-lg font-semibold mb-2">Pixel Code:</div>
                        <input type="text" name="pixel_code" value="{{ $setting->pixel_code ?? '' }}"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-blue-300 focus:ring focus:ring-blue-200 rounded-md">
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save
                    Changes</button>
            </div>
        </form>
    </div>
</x-app-layout>
