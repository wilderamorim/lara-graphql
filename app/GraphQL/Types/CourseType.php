<?php

namespace App\GraphQL\Types;

use App\GraphQL\Fields\FormattableDate;
use App\Models\Course;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CourseType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Course',
        'description' => 'A course',
        'model' => Course::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The id of the course',
            ],
            'category_id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The id of the category',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of course',
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of course',
            ],
            'createdAt' => new FormattableDate([
                'alias' => 'created_at',
            ]),
            'updatedAt' => new FormattableDate([
                'alias' => 'updated_at',
            ]),
        ];
    }
}
