<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursePostRequest;
use App\Http\Requests\CoursePutRequest;
use App\Repositories\CourseRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    //
    public function __construct(
        private readonly CourseRepository $repository,
    )
    {
    }

    public function index(): View
    {
        $courses = $this->repository->findAll();
        return view('courses.index', [
            'courses' => $courses,
        ]);
    }

    public function create(): View
    {
        return \view('courses.create');
    }

    public function edit(int $id): View
    {
        $course = $this->repository->findById($id);
        return \view('courses.edit', [
            'course' => $course,
        ]);
    }
    
    public function store(CoursePostRequest $request): RedirectResponse
    {
        $course = $this->repository->create(
            name: $request->validated('name'),
            code: $request->validated('code'),
        );

        return redirect(sprintf('/courses/%d', $course['id']));
    }

    public function update(int $id, CoursePutRequest $request): RedirectResponse
    {
        $course = $this->repository->update(
            id: $id,
            name: $request->validated('name'),
            code: $request->validated('code'),
        );

        return redirect(sprintf('/courses/%d', $course['id']));
    }

    public function show(int $id): View
    {
        $course = $this->repository->findById($id);
        return \view('courses.show', [
            'course' => $course,
        ]);
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->repository->delete($id);
        return redirect('/courses');
    }


}
