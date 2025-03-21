<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()->orderBy('created_at', 'desc')->paginate();
        // dd(vars: $notes);
        return view('note.index', ['notes' =>$notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request ->validate([
            'note' =>['required', 'string']
        ]);

        $data['user_id'] = 1;
        $note = Note::create($data);
        return redirect()->route('notes.show', $note)->with('message', 'Note was created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('note.edit', ['notes' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $data = $request ->validate([
            'note' =>['required', 'string']
        ]);

        $note -> update($data);  
        return redirect()->route('notes.show', $note)->with('message', 'Note was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note ->delete();
        return redirect()->route('notes.index')->with('message', 'Note was deleted successfully');
    }
}
