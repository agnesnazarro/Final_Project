<x-app-layout>
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Edit Gadget') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Edit a gadget in your collection.") }}
                </p>
            </header>

            <form method="post" action="{{ route('gadgets.update', $gadgets->id) }}" class="mt-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="brand_name" :value="__('Brand Name')" />
                    <x-text-input id="brand_name" name="brand_name" type="text" class="mt-1 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" :value="old('brand_name', $gadgets->brand_name)" required autofocus autocomplete="brand_name" />
                    <x-input-error class="mt-2" :messages="$errors->get('brand_name')" />
                </div>

                <div>
                    <x-input-label for="gadget_name" :value="__('Gadget Name')" />
                    <x-text-input id="gadget_name" name="gadget_name" type="text" class="mt-1 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" :value="old('gadget_name', $gadgets->gadget_name)" required autocomplete="gadget_name" />
                    <x-input-error class="mt-2" :messages="$errors->get('gadget_name')" />
                </div>

                <div>
                    <x-input-label for="category" :value="__('Category')" />
                    <x-text-input id="category" name="category" type="text" class="mt-1 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" :value="old('category', $gadgets->category)" required autocomplete="category" />
                    <x-input-error class="mt-2" :messages="$errors->get('category')" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" class="mt-1 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white">{{ old('description', $gadgets->description) }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div>
                    <x-input-label for="quantity" :value="__('Quantity')" />
                    <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" :value="old('quantity', $gadgets->quantity)" required autocomplete="quantity" />
                    <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
                </div>

                <div>
                    <x-input-label for="purchase_date" :value="__('Purchase Date')" />
                    <x-text-input id="purchase_date" name="purchase_date" type="date" class="mt-1 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" :value="old('purchase_date', $gadgets->purchase_date)" required autocomplete="purchase_date" />
                    <x-input-error class="mt-2" :messages="$errors->get('purchase_date')" />
                </div>

                <div class="flex items-center gap-4 justify-end">
                    <x-primary-button>{{ __('Update Gadget') }}</x-primary-button>
                </div>

                <div class="flex items-center gap-4 justify-end">
                    <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="history.back()">
                        {{ __('Cancel') }}
                    </button>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </section>
    </main>
    </x-app-layout>
