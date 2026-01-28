<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index', ['students' => Student::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        return redirect()->route('students.index')->with('swal', ['icon' => 'success', 'title' => 'Usuario creado', 'text' => 'Usuario creado correctamente']);
        // return redirect()->route('students.index')->with('success', 'Usuario creado correctamente');
        // 'success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('students.index')->with('swal', ['icon' => 'success', 'title' => 'Usuario actualizado', 'text' => 'Usuario actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('swal', ['icon' => 'success', 'title' => 'Usuario eliminado', 'text' => 'Usuario eliminado correctamente']);
    }
}
