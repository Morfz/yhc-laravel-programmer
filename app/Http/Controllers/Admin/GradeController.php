<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'mata_kuliah' => 'required',
            'nilai' => 'required',
            'grade' => 'required',
        ]);

        Grade::create($request->all());

        return redirect()->route('grades.index')
            ->with('success', 'Grade created successfully.');
    }

    public function show(Grade $grade)
    {
        return view('grades.show', compact('grade'));
    }

    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'student_id' => 'required',
            'mata_kuliah' => 'required',
            'nilai' => 'required',
            'grade' => 'required',
        ]);

        $grade->update($request->all());

        return redirect()->route('grades.index')
            ->with('success', 'Grade updated successfully.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')
            ->with('success', 'Grade deleted successfully.');
    }
}
