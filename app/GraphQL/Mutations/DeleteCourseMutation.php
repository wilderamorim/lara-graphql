<?php

namespace App\GraphQL\Mutations;

use Closure;
use App\Models\Course;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Mutation;

class DeleteCourseMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteCourse',
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required'],
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return (bool)Course::findOrFail($args['id'])->delete();
    }
}
