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
}
