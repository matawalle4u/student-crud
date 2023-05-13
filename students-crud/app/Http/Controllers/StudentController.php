<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\CourseRepository;
use App\Repositories\StudentCourseRepository;
use App\Repositories\StudentRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    //
    public function __construct(
        private readonly StudentRepository $repository,
        private readonly StudentCourseRepository $studentCourseRepository,
        private readonly CourseRepository $courseRepository,
    )
    {
    }

    public function index(): View
    {
        $students = $this->repository->findAll();
        return view('students.index', [
            'students' => $students,
        ]);
    }

    public function create(): View
    {
        return \view('students.create');
    }

    public function edit(int $id): View
    {
        $student = $this->repository->findById($id);
        return \view('students.edit', [
            'student' => $student,
        ]);
    }

    public function store(StudentPostRequest $request): RedirectResponse
    {
        $student = $this->repository->create(
            firstName: $request->validated('first_name'),
            lastName: $request->validated('last_name'),
            regNo: $request->validated('reg_no')
        );

        return redirect(sprintf('/students/%d', $student['id']));
    }

    public function update(int $id, StudentPutRequest $request): RedirectResponse
    {
        $student = $this->repository->update(
            id: $id,
            firstName: $request->validated('first_name'),
            lastName: $request->validated('last_name'),
            regNo: $request->validated('reg_no')
        );

        return redirect(sprintf('/students/%d', $student['id']));
    }

    public function show(int $id): View
    {
        $student = $this->repository->findById($id);
        $student_courses = $this->studentCourseRepository->listAll($id);
        $courses = $this->courseRepository->listAddable($id);

        return \view('students.show', [
            'student' => $student,
            'student_courses' => $student_courses,
            'courses' => $courses,
        ]);
    }

    public function destroy(int $id): RedirectResponse
    {
         $this->repository->delete($id);
        return redirect('/students');
    }

    public function addCourse(int $id, StudentCoursePostRequest $request): RedirectResponse
    {
        $this->studentCourseRepository->add(
            studentId: $id,
            courseId: $request->validated('course_id')
        );

        return redirect(sprintf('/students/%d', $id));
    }

    public function removeCourse(int $studentCourseId): RedirectResponse
    {
        $studentId = $this->studentCourseRepository->remove($studentCourseId);
        return redirect(sprintf('/students/%d', $studentId));
    }


}
