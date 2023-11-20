<?php

namespace App\GraphQL\Queries;

use App\Models\Course;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class CoursesQuery extends Query
{
    protected $attributes = [
        'name' => 'courses',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Course'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'category_id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, SelectFields $fields)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $model = Course::select($select)->with($with);

        if (isset($args['id'])) {
            $model->where('id', $args['id']);
        }

        if (isset($args['category_id'])) {
            $model->where('category_id', $args['category_id']);
        }

        if (isset($args['name'])) {
            $model->where('name', 'like', '%' . $args['name'] . '%');
        }

        if (isset($args['description'])) {
            $model->where('description', 'like', '%' . $args['description'] . '%');
        }

        return $model->get();
    }
}
