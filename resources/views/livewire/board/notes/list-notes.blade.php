<div x-data="{ draggingNoteId: null, droppedStatus: null, mobileSelectNoteId: null }" class="flex flex-col md:flex-row w-full justify-center">
    {{-- To Do Column --}}
    <div class="w-full md:w-1/3 px-2 md:px-8 py-4" @drop.prevent="droppedStatus = 'ToDo'" @dragover.prevent>
        <div class="flex flex-row mb-4 justify-between items-center bg-yellow-200 rounded-md p-2 border-2">
            <h1 class="text-lg md:text-2xl ml-3 font-bold text-gray-900">To Do</h1>
            <a href="{{ route('notes.create') }}">
                <x-heroicon-o-plus-circle class="w-6 h-6 md:w-8 md:h-8 text-green-500 hover:text-green-300 hover:rotate-90 hover:duration-500 cursor-pointer" />
            </a>
        </div>
        <div class="bg-white rounded-lg w-full overflow-auto">
            @foreach($notes as $note)
                <div
                    draggable="true"
                    @dragstart="draggingNoteId = '{{ $note->id }}'"
                    @dragend="$wire.call('moveNote', draggingNoteId, droppedStatus)"
                    @click.away="mobileSelectNoteId = null"
                    @click="mobileSelectNoteId = '{{ $note->id }}'"
                    class="bg-white p-4 md:p-6 mb-4 border-2 rounded-md">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col">
                            <h1 class="text-md md:text-lg font-bold text-gray-900">{{ $note->title }}</h1>
                            <h2 class="text-xs md:text-sm text-gray-500 ml-2">{{ $note->created_at->diffForHumans() }}</h2>
                            <p class="text-xs md:text-sm text-gray-500">{{ $note->body }}</p>
                            <span class="text-xs md:text-sm text-gray-500">{{ $note->due_date->diffForHumans() }}</span>
                            <div class="flex flex-row justify-end gap-5">
                                <a href="{{ route('deleteNote', $note->id) }}" class="text-xs md:text-sm text-red-500">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- In Progress Column --}}
    <div class="w-full md:w-1/3 px-2 md:px-8 py-4" @drop.prevent="droppedStatus = 'InProgress'" @dragover.prevent>
        <h1 class="text-lg md:text-2xl mb-4 font-bold text-gray-900 pl-3 bg-blue-200 p-2 rounded-md border-2">In progress...</h1>
        <div class="bg-white rounded-lg w-full overflow-auto">
            @foreach($inProgressNotes as $inProgressNote)
                <div
                    draggable="true"
                    @dragstart="draggingNoteId = '{{ $inProgressNote->id }}'"
                    @dragend="$wire.call('moveNote', draggingNoteId, droppedStatus)"
                    @click.away="mobileSelectNoteId = null"
                    @click="mobileSelectNoteId = '{{ $inProgressNote->id }}'"
                    class="bg-white p-4 md:p-6 mb-4 border-2 rounded-md">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col">
                            <h1 class="text-md md:text-lg font-bold text-gray-900">{{ $inProgressNote->title }}</h1>
                            <h2 class="text-xs md:text-sm text-gray-500 ml-2">{{ $inProgressNote->created_at->diffForHumans() }}</h2>
                            <p class="text-xs md:text-sm text-gray-500">{{ $inProgressNote->body }}</p>
                            <span class="text-xs md:text-sm text-gray-500">{{ $inProgressNote->due_date->diffForHumans() }}</span>
                            <div class="flex flex-row justify-end gap-5">
                                <a href="{{ route('deleteNote', $inProgressNote->id) }}" class="text-xs md:text-sm text-red-500">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Complete Column --}}
    <div class="w-full md:w-1/3 px-2 md:px-8 py-4" @drop.prevent="droppedStatus = 'Finished'" @dragover.prevent>
        <h1 class="text-lg md:text-2xl pl-3 mb-4 font-bold text-gray-900 bg-green-200 p-2 rounded-md border-2">Complete</h1>
        <div class="bg-white rounded-lg w-full overflow-auto">
            @foreach($CompletedNotes as $CompletedNote)
                <div
                    draggable="true"
                    @dragstart="draggingNoteId = '{{ $CompletedNote->id }}'"
                    @dragend="$wire.call('moveNote', draggingNoteId, droppedStatus)"
                    @click.away="mobileSelectNoteId = null"
                    @click="mobileSelectNoteId = '{{ $CompletedNote->id }}'"
                    class="bg-white p-4 md:p-6 mb-4 border-2 rounded-md">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col">
                            <h1 class="text-md md:text-lg font-bold text-gray-900">{{ $CompletedNote->title }}</h1>
                            <h2 class="text-xs md:text-sm text-gray-500 ml-2">{{ $CompletedNote->created_at->diffForHumans() }}</h2>
                            <p class="text-xs md:text-sm text-gray-500">{{ $CompletedNote->body }}</p>
                            <span class="text-xs md:text-sm text-gray-500">{{ $CompletedNote->due_date->diffForHumans() }}</span>
                            <div class="flex flex-row justify-end gap-5">
                                <a href="{{ route('deleteNote', $CompletedNote->id) }}" class="text-xs md:text-sm text-red-500">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
