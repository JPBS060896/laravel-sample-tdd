<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class NotesController extends Controller
{
    public function index()
    {
        # code...
    }

    public function store()
    {
        Notes::create(request(['title', 'description', 'status']));
    }
}
