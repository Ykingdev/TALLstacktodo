<div x-data="{ draggingNoteId: null, droppedStatus: null }" class="flex flex-col md:flex-row w-[80vw] justify-center">
    {{-- To Do Column --}}
    <div class="max-w-md sm:max-w-lg px-4 py-4" @drop.prevent="droppedStatus = 'ToDo'" @dragover.prevent>
        <div class="flex flex-row justify-between items-center bg-blue-100 hover:bg-blue-200 transition duration-300 ease-in-out rounded-t-md p-2">
            <h1 class="text-2xl ml-3 mb-4 font-bold text-gray-900">To do</h1>
            <a href="{{ route('notes.create') }}">
                <x-heroicon-o-plus-circle class="w-8 h-8 text-green-500 hover:text-green-600 hover:rotate-90 hover:duration-500 cursor-pointer" />
            </a>
        </div>
        <div class="bg-white sm:rounded-lg h-[70vh] overflow-scroll gap-2 w-[25vw]">
            @if ($notes->isEmpty())
                <p class="text-gray-500 text-center">No notes in this column.</p>
            @else
                @foreach ($notes as $note)
                    <div draggable="true" @dragstart="draggingNoteId = '{{ $note->id }}'" @dragend="$wire.call('moveNote', draggingNoteId, droppedStatus)" class="bg-white hover:scale-105 duration-150 hover:duration-150 border-gray-50 shadow-sm rounded-md p-6 mb-4 border-2">
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-col">
                                <div class="flex flex-row items-center justify-between w-[20rem]">
                                    <h1 class="text-lg font-bold text-gray-900">{{ $note->title }}</h1>
                                    <h2 class="text-sm text-gray-500 ml-2">{{ $note->created_at->diffForHumans() }}</h2>
                                </div>
                                <p class="text-sm text-gray-500">{{ $note->body }}</p>
                                <span class="text-sm text-gray-500">{{ $note->due_date }}</span>
                                <div class="flex flex-row justify-end gap-5">
                                    <a href="{{ route('deleteNote', $note->id) }}" class="text-sm text-red-500">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- In Progress Column --}}
    <div class="max-w-md sm:max-w-lg px-4 py-4" @drop.prevent="droppedStatus = 'InProgress'" @dragover.prevent>
        <div class="flex flex-row justify-between items-center bg-yellow-100 hover:bg-yellow-200 transition duration-300 ease-in-out rounded-t-md p-2">
            <h1 class="text-2xl ml-3 mb-4 font-bold text-gray-900">In progress...</h1>
        </div>
        <div class="bg-white sm:rounded-lg h-[70vh] overflow-scroll gap-2 w-[25vw]">
            @if ($inProgressNotes->isEmpty())
                <p class="text-gray-500 text-center">No notes in this column.</p>
            @else
                @foreach ($inProgressNotes as $inProgressNote)
                    <div draggable="true" @dragstart="draggingNoteId = '{{ $inProgressNote->id }}'" @dragend="$wire.call('moveNote', draggingNoteId, droppedStatus)" class="bg-white hover:scale-105 duration-150 hover:duration-150 border-gray-50 shadow-sm rounded-md p-6 mb-4 border-2">
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-col">
                                <div class="flex flex-row items-center justify-between w-[20rem]">
                                    <h1 class="text-lg font-bold text-gray-900">{{ $inProgressNote->title }}</h1>
                                    <h2 class="text-sm text-gray-500 ml-2">{{ $inProgressNote->created_at->diffForHumans() }}</h2>
                                </div>
                                <p class="text-sm text-gray-500">{{ $inProgressNote->body }}</p>
                                <span class="text-sm text-gray-500">{{ $inProgressNote->due_date }}</span>
                                <div class="flex flex-row justify-end gap-5">
                                    <a href="{{ route('deleteNote', $inProgressNote->id) }}" class="text-sm text-red-500">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- Complete Column --}}
    <div class="max-w-md sm:max-w-lg px-4 py-4" @drop.prevent="droppedStatus = 'Finished'" @dragover.prevent>
        <div class="flex flex-row justify-between items-center bg-green-100 hover:bg-green-200 transition duration-300 ease-in-out rounded-t-md p-2">
            <h1 class="text-2xl ml-3 mb-4 font-bold text-gray-900">Complete</h1>
        </div>
        <div class="bg-white sm:rounded-lg h-[70vh] overflow-scroll gap-2 w-[25vw]">
            @if ($CompletedNotes->isEmpty())
                <p class="text-gray-500 text-center">No notes in this column.</p>
            @else
                @foreach ($CompletedNotes as $CompletedNote)
                    <div draggable="true" @dragstart="draggingNoteId = '{{ $CompletedNote->id }}'" @dragend="$wire.call('moveNote', draggingNoteId, droppedStatus)" class="bg-white hover:scale-105 duration-150 hover:duration-150 border-gray-50 shadow-sm rounded-md p-6 mb-4 border-2">
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-col">
                                <div class="flex flex-row items-center justify-between w-[20rem]">
                                    <h1 class="text-lg font-bold text-gray-900">{{ $CompletedNote->title }}</h1>
                                    <h2 class="text-sm text-gray-500 ml-2">{{ $CompletedNote->created_at->diffForHumans() }}</h2>
                                </div>
                                <p class="text-sm text-gray-500">{{ $CompletedNote->body }}</p>
                                <span class="text-sm text-gray-500">{{ $CompletedNote->due_date }}</span>
                                <div class="flex flex-row justify-end gap-5">
                                    <a href="{{ route('deleteNote', $CompletedNote->id) }}" class="text-sm text-red-500">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
