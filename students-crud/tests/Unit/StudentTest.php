<?php
namespace Tests\Unit;

use App\Models\Student;
use App\Repositories\StudentRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private readonly StudentRepository $studentRepository;

    public function __construct(string $name)
    {
        parent::__construct($name);

        $this->studentRepository = app()->make(StudentRepository::class);
    }

    /**
     * A basic unit test example.
     */
    public function test_user_creation(): void
    {
        $student = $this->createStudent();

        $this->assertInstanceOf(Student::class, $student);
        $this->assertSame('Adam', $student['first_name']);
        $this->assertSame('Mustapha', $student['last_name']);
        $this->assertSame('U/002', $student['reg_no']);
    }

    public function test_user_info(): void
    {
        $this->createStudent();
        $student = $this->studentRepository->findById(1);
        $this->assertInstanceOf(Student::class, $student);
        $this->assertSame('Adam', $student['first_name']);
        $this->assertSame('Mustapha', $student['last_name']);
        $this->assertSame('U/002', $student['reg_no']);
    }

    public function test_user_update()
    {
        $this->createStudent();
        $student = $this->studentRepository->findById(1);
        $student = $this->studentRepository->update(
            id: 1,
            firstName: 'Chukwudi',
            lastName: $student['last_name'],
            regNo: 'U/003'
        );

        $this->assertNotSame('Adam', $student['first_name']);
        $this->assertSame('Chukwudi', $student['first_name']);

        $this->assertSame('Mustapha', $student['last_name']);
        $this->assertSame('U/003', $student['reg_no']);
        $this->assertNotSame('U/002', $student['reg_no']);
    }

    public function test_user_deletion()
    {
        $this->createStudent();
        $student = $this->studentRepository->findById(1);
        $this->studentRepository->delete(1);
        $fetchDeleted = $this->studentRepository->findById(1);

        self::assertInstanceOf(Student::class, $student);
        self::assertNull($fetchDeleted);
    }

    public function test_non_existent_user()
    {
        $exception = null;

        try {
            $this->studentRepository->findRequiredById(111);
        } catch (ModelNotFoundException $e) {
            $exception = $e;
        }

        self::assertInstanceOf(ModelNotFoundException::class, $exception);
    }

    private function createStudent(): Student
    {
        return $this->studentRepository->create(
            firstName: 'Adam',
            lastName: 'Mustapha',
            regNo: 'U/002'
        );
    }
}