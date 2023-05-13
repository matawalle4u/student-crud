<?php
    namespace App\Repositories;
    use App\Models\Student;
    use App\Models\StudentCourse;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\ModelNotFoundException;

    class StudentRepository {

        public function create() {

        }
        public function findAll(): Collection{
            
        }
        public function findById(int $id){

        }
        public function findRequiredById(int $id){

        }
        public function update(int $id, string $firstName, string $lastName, string $regNo){

        }

        public function delete(int $id){
            
        }
    }