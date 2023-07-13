<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Grade;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        // Filter dan urutan berdasarkan NIM
        if ($request->has('sort_by') && $request->input('sort_by') == 'nim') {
            $sort_type = $request->input('sort_type', 'asc');
            $query->orderBy('nim', $sort_type);
        }

        // Filter dan urutan berdasarkan Nama
        if ($request->has('sort_by') && $request->input('sort_by') == 'nama') {
            $sort_type = $request->input('sort_type', 'asc');
            $query->orderBy('nama', $sort_type);
        }

        // Filter dan urutan berdasarkan Program Studi
        if ($request->has('sort_by') && $request->input('sort_by') == 'program_studi') {
            $sort_type = $request->input('sort_type', 'asc');
            $query->orderBy('program_studi', $sort_type);
        }

        $students = $query->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'program_studi' => 'required',
            'no_hp' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('admin.students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(Student $student, Request $request)
    {
        $query = $student->grade();

        // Filter and sort by mata_kuliah
        if ($request->has('sort_by') && $request->input('sort_by') == 'mata_kuliah') {
            $sort_type = $request->input('sort_type', 'asc');
            $query->orderBy('mata_kuliah', $sort_type);
        }

        if ($request->has('sort_by') && $request->input('sort_by') == 'nilai') {
            $sort_type = $request->input('sort_type', 'asc');
            $query->orderBy('nilai', $sort_type);
        }

        if ($request->has('sort_by') && $request->input('sort_by') == 'grade') {
            $sort_type = $request->input('sort_type', 'asc');
            $query->orderBy('grade', $sort_type);
        }

        $grades = $query->get();

        return view('students.show', compact('student', 'grades'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'program_studi' => 'required',
            'no_hp' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }

    public function createGrade(Student $student)
    {
        return view('students.create-grade', compact('student'));
    }

    public function storeGrade(Request $request, Student $student)
    {
        $request->validate([
            'mata_kuliah' => 'required',
            'nilai' => 'required',
        ]);

        $nilai = $request->get('nilai');
        $grade = '';

        if ($nilai >= 85) {
            $grade = 'A';
        } elseif ($nilai >= 75 && $nilai < 85) {
            $grade = 'B';
        } elseif ($nilai >= 65 && $nilai < 75) {
            $grade = 'C';
        } elseif ($nilai >= 50 && $nilai < 65) {
            $grade = 'D';
        } else {
            $grade = 'E';
        }

        $newGrade = new Grade([
            'mata_kuliah' => $request->get('mata_kuliah'),
            'nilai' => $nilai,
            'grade' => $grade,
        ]);

        $student->grade()->save($newGrade);

        return redirect()->route('admin.students.show', $student->id)
            ->with('success', 'Grade created successfully.');
    }

    public function editGrade(Student $student, Grade $grade)
    {
        return view('students.edit-grade', compact('student', 'grade'));
    }

    public function updateGrade(Request $request, Student $student, Grade $grade)
    {
        $request->validate([
            'mata_kuliah' => 'required',
            'nilai' => 'required',
        ]);

        $nilai = $request->get('nilai');
        $newGrade = '';

        if ($nilai >= 85) {
            $newGrade = 'A';
        } elseif ($nilai >= 75 && $nilai < 85) {
            $newGrade = 'B';
        } elseif ($nilai >= 65 && $nilai < 75) {
            $newGrade = 'C';
        } elseif ($nilai >= 50 && $nilai < 65) {
            $newGrade = 'D';
        } else {
            $newGrade = 'E';
        }

        $grade->update([
            'mata_kuliah' => $request->get('mata_kuliah'),
            'nilai' => $nilai,
            'grade' => $newGrade,
        ]);

        return redirect()->route('admin.students.show', $student->id)
            ->with('success', 'Grade updated successfully.');
    }

    public function destroyGrade(Student $student, Grade $grade)
    {
        $grade->delete();

        return redirect()->route('admin.students.show', $student->id)
            ->with('success', 'Grade deleted successfully.');
    }
}