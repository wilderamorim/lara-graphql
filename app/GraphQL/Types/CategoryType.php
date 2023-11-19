<?php

namespace App\GraphQL\Types;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
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
                'type' => Type::string(),
                'description' => 'The name of category',
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of category',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'The date the student was created',
                'resolve' => function ($model) {
                    return $model->created_at;
                }
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'The date the student was last updated',
                'resolve' => function ($model) {
                    return $model->updated_at;
                }
            ],
        ];
    }
}
