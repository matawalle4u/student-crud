<?php

namespace App\Http\Livewire;

use App\Repositories\StudentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Student extends Component
{
    private readonly StudentRepository $studentRepository;
    public string $searchQuery = '';
    public ?Collection $searchResult;

    public function __construct($id = null)
    {
        $this->studentRepository = app()->make(StudentRepository::class);
        parent::__construct($id);
    }

    public function clearResult(): void
    {
        sleep(1);
        $this->searchResult = null;
    }


    public function search(): void
    {
        $this->searchResult = $this->studentRepository->search($this->searchQuery);
    }

    public function render(): View
    {
        return view('livewire.student', [
            'searchResults' => $this->searchResult ?? null,
        ]);
    }
}
