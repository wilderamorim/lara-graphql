<?php

namespace App\GraphQL\Schemas;

use Rebing\GraphQL\Support\Contracts\ConfigConvertible;

class CategorySchema implements ConfigConvertible
{
    public function toConfig(): array
    {
        return [
            'query' => [
                'categories' => \App\GraphQL\Queries\CategoriesQuery::class,
            ],
            'mutation' => [
                'createCategory' => \App\GraphQL\Mutations\CreateCategoryMutation::class,
                'updateCategory' => \App\GraphQL\Mutations\UpdateCategoryMutation::class,
                'deleteCategory' => \App\GraphQL\Mutations\DeleteCategoryMutation::class,
            ],
            'types' => [
                'Category' => \App\GraphQL\Types\CategoryType::class,
                'Course' => \App\GraphQL\Types\CourseType::class,
            ],
            'middleware' => null,
            'method' => ['GET', 'POST'],
            'execution_middleware' => null,
        ];
    }
}
