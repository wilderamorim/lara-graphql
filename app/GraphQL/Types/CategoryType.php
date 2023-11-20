<?php

namespace App\GraphQL\Types;

use App\GraphQL\Fields\FormattableDate;
use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CategoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Category',
        'description' => 'A category',
        'model' => Category::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The id of the category',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of category',
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of category',
            ],
            'createdAt' => new FormattableDate([
                'alias' => 'created_at',
            ]),
            'updatedAt' => new FormattableDate([
                'alias' => 'updated_at',
            ]),
            'courses' => [
                'type' => Type::listOf(GraphQL::type('Course')),
                'description' => 'The courses of category',
            ],
            'coursesCount' => [
                'type' => Type::int(),
                'description' => 'The courses count of category',
                'selectable' => false,
                'resolve' => function ($root, $args) {
                    return $root->courses()->count();
                },
            ],
            'hasCourses' => [
                'type' => Type::boolean(),
                'description' => 'The courses count of category',
                'selectable' => false,
                'resolve' => function ($root, $args) {
                    return $root->courses()->exists();
                },
            ],
        ];
    }
}
