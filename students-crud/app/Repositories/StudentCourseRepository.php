<?php

namespace App\Repositories;

use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentCourseRepository
{

    public function listAll(int $studentId): Collection
    {
        return StudentCourse::query()
            ->select(['student_courses.*', 'name', 'code'])
            ->join('courses', 'courses.id', 'student_courses.course_id')
            ->where('student_id', $studentId)
            ->get();
    }

    public function add(int $studentId, int $courseId): Model|StudentCourse
    {
        return StudentCourse::query()->create([
            'student_id' =>$studentId,
            'course_id' =>$courseId
        ]);
    }

    public function remove(int $studentCourseId)
    {
        $sc = $this->findRequiredById($studentCourseId);
        $sc->delete();

        return $sc['student_id'];
    }

    public function findById(int $id): Model|StudentCourse|null
    {
        return StudentCourse::query()->find($id);
    }

    public function findRequiredById(int $id): Model|StudentCourse
    {
        $student = $this->findById($id);
        if (null == $student) {
            throw new ModelNotFoundException('Such student course does not exists');
        }

        return $student;
    }
}
