<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class NotesController extends Controller
{
    public function show($id)
    {
        $note = Notes::findOrFail($id);

        $response = [
            'code' => 200,
            'message' => "Note successfully returned!",
            'data' => $note
        ];

        return $response;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'integer'
        ]);

        $note = new Notes();
        $note->title = $request->get('title');
        $note->description = $request->get('description');
        $note->status = $request->get('status');
        $note->save();

        // dd($note);

        $response = [
            'code' => 200,
            'message' => "Note successfully created!",
        ];

        return $response;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|integer'
        ]);

        dd($request);

        $note = Notes::findOrFail($id);
        $note->title = $request->get('title');
        $note->description = $request->get('description');
        $note->status = $request->get('status');
        $note->save();

        $response = [
            'code' => 200,
            'message' => "Note successfully updated!"
        ];

        return $response;
    }

    public function delete($id)
    {
        $note = Notes::findOrFail($id);
        $note->delete();

        $response = [
            'code' => 200,
            'message' => "Note successfully deleted!"
        ];

        return $response;
    }
}
