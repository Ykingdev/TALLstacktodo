<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{

    public function CompleteNote($id)
    {
        $note = Note::find($id);
        $note->status = 'Finished';
        $note->save();
        return redirect()->route('dashboard');
    }
    public function setToDo($id)
    {
        $note = Note::find($id);
        $note->status = 'ToDo';
        $note->save();
        return redirect()->route('dashboard');
    }
    public function setInProgress($id)
    {
        $note = Note::find($id);
        $note->status = 'InProgress';
        $note->save();
        return redirect()->route('dashboard');
    }
    public function delete($id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect()->route('dashboard');
    }
}
