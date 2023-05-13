<?php
    namespace App\Repositories;
   
    use App\Models\Course;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Illuminate\Database\Query\Builder;

    class CourseRepository {

        public function create(string $name, string $code): Model|Course {
            return Course::query()->create([
                'name' => $name,
                'code' => $code,
            ]);
        }

        public function findAll(): Collection{
            return Course::all();
        }

        public function listAddable(int $studentId): Collection
    {
        return Course::query()
            ->whereNotIn('id', function (Builder $builder) use ($studentId) {
                $builder->select('id')
                    ->from('student_courses')
                    ->where('student_courses.student_id', $studentId)
                    ->whereNull('student_courses.deleted_at');
            })
            ->get();
    }
        
        public function findById(int $id): Model|Course|null{
            return Course::query()->find($id);
        }

        public function findRequiredById(int $id): Model|Course{

            $course = $this->findById($id);
            if (null == $course) {
                throw new ModelNotFoundException('Such course does not exists');
            }
            return $course;
        }

        public function update(int $id, string $name, string $code): Model|Course{

            $course = $this->findRequiredById($id);
            $course->update([
                'name' => $name,
                'code' => $code, 
            ]);
            return $course;
        }

        public function delete(int $id): void{

            $course = $this->findRequiredById($id);
            $course->delete();
        }
    }