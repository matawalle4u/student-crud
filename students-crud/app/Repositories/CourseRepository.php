<?php
    namespace App\Repositories;
   
    use App\Models\Course;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Illuminate\Database\Query\Builder;

    class CourseRepository {

        public function create() {

        }
        public function findAll(): Collection{
            
        }
        public function findById(int $id){

        }
        public function findRequiredById(int $id){

        }
        public function update(int $id, string $name, string $code){

        }

        public function delete(int $id){
            
        }
    }