<?php

namespace App\Livewire\Board\Notes;

use Livewire\Component;
use App\Models\Note;

class ListNotes extends Component
{
    public $notesToComplete;
    public $notesInProgress;
    public $notesCompleted;

    public $user;
    public function getNotCompletedNotesProperty()
    {
        $this->user = auth()->user();
        $userid = $this->user->id;
        $this->notesToComplete = Note::where('user_id', $userid)->where('status', 'ToDo')->get();
        return $this->notesToComplete;
    }
    public function getCompletedNotesProperty()
    {
        $this->user = auth()->user();
        $userid = $this->user->id;
        $this->notesCompleted = Note::where('user_id', $userid)->where('status', 'Finished')->get();
        return $this->notesCompleted;
    }
    public function getInProgressNotesProperty()
    {
        $this->user = auth()->user();
        $userid = $this->user->id;
        $this->notesInProgress = Note::where('user_id', $userid)->where('status', 'InProgress')->get();
        return $this->notesInProgress;
    }
    public function moveNote($noteId, $newStatus)
    {
        // Update the note's status
        $note = Note::find($noteId);
        if ($note) {
            $note->status = $newStatus;
            $note->save();
        }

        // Refresh notes lists
        $this->notes = $this->getNotCompletedNotesProperty();
        $this->inProgressNotes = $this->getInProgressNotesProperty();
        $this->CompletedNotes = $this->getCompletedNotesProperty();
    }

    public function render()
    {
        $this->getInProgressNotesProperty();
        $this->getCompletedNotesProperty();
        $this->getNotCompletedNotesProperty();

        return view('livewire.board.notes.list-notes' , [
            'notes' => $this->notesToComplete,
            'CompletedNotes' => $this->notesCompleted,
            'inProgressNotes' => $this->notesInProgress,
        ]);
    }
}
