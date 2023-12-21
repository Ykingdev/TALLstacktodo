<?php

namespace App\Livewire\Board\Notes;

use App\Models\Note;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $body;
    public $due_date;

    protected $rules = [
        'title' => 'required',
        'body' => 'required',
        'due_date' => 'required|date',
    ];

    public function create()
    {
        $this->validate();

        Note::create([
            'title' => $this->title,
            'body' => $this->body,
            'due_date' => $this->due_date,
            'user_id' => auth()->user()->id,
        ]);

        $this->dispatch('noteCreated');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.board.notes.create');
    }
}
