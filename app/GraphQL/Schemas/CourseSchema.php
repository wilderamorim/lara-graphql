<?php

namespace App\GraphQL\Schemas;

use Rebing\GraphQL\Support\Contracts\ConfigConvertible;

class CourseSchema implements ConfigConvertible
{
    public function toConfig(): array
    {
        return [
            'query' => [
                'courses' => \App\GraphQL\Queries\CoursesQuery::class,
            ],
            'mutation' => [
                'createCourse' => \App\GraphQL\Mutations\CreateCourseMutation::class,
                'updateCourse' => \App\GraphQL\Mutations\UpdateCourseMutation::class,
                'deleteCourse' => \App\GraphQL\Mutations\DeleteCourseMutation::class,
            ],
            'types' => [
                'Course' => \App\GraphQL\Types\CourseType::class,
                'Category' => \App\GraphQL\Types\CategoryType::class,
            ],
            'middleware' => null,
            'method' => ['GET', 'POST'],
            'execution_middleware' => null,
        ];
    }
}
