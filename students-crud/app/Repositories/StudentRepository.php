<?php
    namespace App\Repositories;

    use App\Models\Student;
    use App\Models\StudentCourse;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    
    class StudentRepository
    {
        public function create(string $firstName, string $lastName, string $regNo): Model|Student
        {
            return Student::query()->create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'reg_no' => $regNo
            ]);
        }
    
        public function findAll(): Collection
        {
            return Student::all();
        }
    
        public function delete(int $id): int
        {
            $student = $this->findRequiredById($id);
            $student->delete();
    
            return $student['id'];
        }
    
        public function findById(int $id): Model|Student|null
        {
            return Student::query()->find($id);
        }
    
        public function findRequiredById(int $id): Model|Student
        {
            $student = $this->findById($id);
            if (null == $student) {
                throw new ModelNotFoundException('Such student does not exists');
            }
    
            return $student;
        }
    
        public function search(string $q, int $limit = 5)
        {
            return Student::query()
                ->search($q)
                ->limit($limit)
                ->get();
        }
    
        public function update(int $id, string $firstName, string $lastName, string $regNo): Model|Student
        {
            $student = $this->findRequiredById($id);
            $student->update([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'reg_no' => $regNo
            ]);
    
            return $student;
        }
    }