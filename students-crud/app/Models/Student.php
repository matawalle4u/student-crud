<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Nicolaslopezj\Searchable\SearchableTrait;

    class Student extends BaseModel
    {
        use HasFactory;
        use SoftDeletes;
        use SearchableTrait;

        /**
         * Searchable rules.
         *
         * @var array
         */
        protected array $searchable = [
            /**
             * Columns and their priority in search results.
             * Columns with higher values are more important.
             * Columns with equal values have equal importance.
             *
             */
            'columns' => [
                'students.first_name' => 10,
                'students.last_name' => 10,
                'students.reg_no' => 9,
            ],
        ];
    }