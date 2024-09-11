<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\StudentService;
use App\Http\Requests\StudentAddRequest;
use App\Http\Requests\StudentEditRequest;
use Exception;

class StudentController extends Controller
{
    public function __construct(
        public StudentService $studentService
    ) {}

    public function index()
    {
        $students = $this->studentService->getStudent();
        return view('students.student-list', [
            'students' => $students
        ]);
    }

    public function store(StudentAddRequest $request)
    {
        try {
            $this->studentService->createStudent([
                'name' => $request->name,
                'subject' => $request->subject,
                'mark' => $request->mark
            ]);
            return back()->with('success', 'Student added successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Server Error !');
        }
    }

    public function delete($id)
    {
        try {
            $this->studentService->deleteStudent([
                ['id', $id]
            ]);
            return back()->with('success', 'Student deleted successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Server Error !');
        }
    }

    public function edit($id)
    {
        $student = $this->studentService->firstStudent([
            ['id', $id]
        ]);
        return view('students.student-edit', [
            'student' => $student
        ]);
    }

    public function update(StudentEditRequest $request, $id)
    {
        try {
            $this->studentService->updateStudent(
                where: [
                    ['id', $id]
                ],
                data: [
                    'name' => $request->name,
                    'subject' => $request->subject,
                    'mark' => $request->mark
                ]
            );
            return to_route('student.list')->with('success', 'Student updated successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Server Error !');
        }
    }
}
