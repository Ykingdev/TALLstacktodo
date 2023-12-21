<x-app-layout>
    <div class="w-screen flex flex-col md:flex-row justify-center">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Overview') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @livewire('board.notes.list-notes')
                </div>
            </div>
        </div>

    </div>


</x-app-layout>
