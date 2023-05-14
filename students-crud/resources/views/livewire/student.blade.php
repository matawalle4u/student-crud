<div style="text-align: center">
    <div class="input-group mb-3">
        <input
            type="text"
            class="form-control"
            placeholder="Search Student"
            aria-label="Search Student"
            aria-describedby="button-addon2"
            wire:model="searchQuery"
            wire:input="search"
            wire:blur="clearResult">
    </div>

    <div class="search-result list-group shadow-sm">
        @isset($searchResults)
            @foreach($searchResults as $student)
                <a href="/students/{{$student['id']}}"
                   class="search-item list-group-item list-group-item-action text-start">
                    {{$student['first_name']}} {{$student['last_name']}}
                </a>
            @endforeach
        @endisset
    </div>
</div>

<style>
    .search-item:hover {
        background-color: floralwhite!important;
    }
</style>