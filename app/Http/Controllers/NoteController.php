<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {

        $notes = Note::all();

        return view('frontend.notes.index',
            compact(['notes']));
    }

    public function create()
    {
        $note = new Note;
        return view('frontend.notes.create', compact('note'));
    }

    public function store(Request $request)
    {

        try {
            $note = new Note;
            $note->content = $request->input('content');
            $note->customer_id = auth()->guard('customer')->id();
            $note->save();

            session()->flash('success', 'Köszönjük a bejegyzést.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->back();

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
