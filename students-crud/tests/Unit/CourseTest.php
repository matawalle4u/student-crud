<?php
namespace Tests\Unit;

use App\Models\Course;
use App\Repositories\CourseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private readonly CourseRepository $courseRepository;

    public function __construct(string $name)
    {
        parent::__construct($name);

        $this->courseRepository = app()->make(CourseRepository::class);
    }

    /**
     * A basic unit test example.
     */
    public function test_course_creation(): void
    {
        $course = $this->createCourse();

        $this->assertInstanceOf(Course::class, $course);
        $this->assertSame('MATHS', $course['name']);
        $this->assertSame('1301', $course['code']);
        
    }

    public function test_course_info(): void
    {
        $this->createCourse();
        $course = $this->courseRepository->findById(1);
        $this->assertInstanceOf(Course::class, $course);

        $this->assertSame('MATHS', $course['name']);
        $this->assertSame('1301', $course['code']);
        
    }

    public function test_course_update()
    {
        $this->createCourse();
        $course = $this->courseRepository->findById(1);
        $course = $this->courseRepository->update(
            id: 1,
            name: 'BIO',
            code: $course['code'],
           
        );

        $this->assertNotSame('MATHS', $course['name']);
        $this->assertSame('1301', $course['code']);

        
        
    }

    public function test_course_deletion()
    {
        $this->createCourse();
        $course = $this->courseRepository->findById(1);
        $this->courseRepository->delete(1);
        $fetchDeleted = $this->courseRepository->findById(1);

        self::assertInstanceOf(Course::class, $course);
        self::assertNull($fetchDeleted);
    }

    public function test_non_existent_course()
    {
        $exception = null;

        try {
            $this->courseRepository->findRequiredById(111);
        } catch (ModelNotFoundException $e) {
            $exception = $e;
        }

        self::assertInstanceOf(ModelNotFoundException::class, $exception);
    }

    private function createCourse(): Course
    {
        return $this->courseRepository->create(
            name: 'MATHS',
            code: '1301',
            
        );
    }
}