<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                @if($url->id !== null)
                    {{ __('Edit url') }}
                @else
                    {{ __('New url') }}
                @endif
            </h2>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    @if($url->id !== null)
                            <form action="{{ route('urls.update', $url->id) }}" method="post">
                    @else
                            <form action="{{ route('urls.store') }}" method="post">
                    @endif
                        @csrf

                        <div>
                            <x-input-label for="original_url" :value="__('Original url')" />
                            <x-text-input id="original_url" class="block mt-1 w-full" type="text" name="original_url" :value="old('original_url', $url->original_url)" required autofocus />
                            <x-input-error :messages="$errors->get('original_url')" class="mt-2" />
                        </div>

                        @if($url->id !== null)
                            <div>
                                <x-input-label for="shortened_url" :value="__('Shortened url')" />
                                <x-text-input id="shortened_url" class="block mt-1 w-full" type="text" name="shortened_url" :value="$url->shortend_url" readonly disabled/>
                                <x-input-error :messages="$errors->get('shortened_url')" class="mt-2" />
                            </div>
                        @endif

                        <x-primary-button class="mt-5">Save</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
