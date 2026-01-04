<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        // Ambil data subjek
        $subjects = Subject::all();
        return view('subjects', compact('subjects'));
    }
}
