<x-app-layout>
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Gadgets Inventory') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Manage your gadgets collection.") }}
                </p>
            </header>

            <div class="flex justify-end mb-4">
                <a href="{{ route('gadgets.create') }}">
                    <x-primary-button color="red">
                        {{ __('Add Gadget') }}
                    </x-primary-button>
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    <svg class="w-6 h-6 text-green-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 011 18z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-black dark:text-white dark:bg-gray-500">
                            <th class="border px-4 py-2">{{ __('ID') }}</th>
                            <th class="border px-4 py-2">{{ __('Brand Name') }}</th>
                            <th class="border px-4 py-2">{{ __('Gadget Name') }}</th>
                            <th class="border px-4 py-2">{{ __('Category') }}</th>
                            <th class="border px-4 py-2">{{ __('Description') }}</th>
                            <th class="border px-4 py-2">{{ __('Quantity') }}</th>
                            <th class="border px-4 py-2">{{ __('Purchase Date') }}</th>
                            <th class="border px-4 py-2">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gadgets as $gadget)
                            <tr>
                                <td class="border px-4 py-2 text-black dark:text-white">{{ $gadget->id }}</td>
                                <td class="border px-4 py-2 text-black dark:text-white">{{ $gadget->brand_name }}</td>
                                <td class="border px-4 py-2 text-black dark:text-white">{{ $gadget->gadget_name }}</td>
                                <td class="border px-4 py-2 text-black dark:text-white">{{ $gadget->category }}</td>
                                <td class="border px-4 py-2 text-black dark:text-white">{{ $gadget->description }}</td>
                                <td class="border px-4 py-2 text-black dark:text-white">{{ $gadget->quantity }}</td>
                                <td class="border px-4 py-2 text-black dark:text-white">{{ $gadget->purchase_date }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('gadgets.edit', $gadget->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('gadgets.destroy', $gadget->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure?')">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</x-app-layout>
