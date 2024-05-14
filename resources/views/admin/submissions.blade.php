<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{{ __('Welcome, :name', ['name' => Auth::user()->name]) }}, <a href="{{ route('setting') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Go to SEO') }}
                        </a></p><br>

                    @if ($submissions->isEmpty())
                        <p>{{ __('No submissions yet.') }}</p>
                    @else
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">{{ __('#') }}</th>
                                    <th class="px-4 py-2">{{ __('Name') }}</th>
                                    <th class="px-4 py-2">{{ __('Email') }}</th>
                                    <th class="px-4 py-2">{{ __('Phone Number') }}</th>
                                    <th class="px-4 py-2">{{ __('Service Type') }}</th>
                                    <th class="px-4 py-2">{{ __('Message') }}</th>
                                    <th class="px-4 py-2">{{ __('Date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($submissions as $submission)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $submission->id }}</td>
                                        <td class="border px-4 py-2">{{ $submission->name }}</td>
                                        <td class="border px-4 py-2">{{ $submission->email }}</td>
                                        <td class="border px-4 py-2">{{ $submission->phone_number }}</td>
                                        <td class="border px-4 py-2">{{ $submission->service_type }}</td>
                                        <td class="border px-4 py-2">{{ $submission->message }}</td>
                                        <td class="border px-4 py-2">{{ $submission->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $submissions->links() }}
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
