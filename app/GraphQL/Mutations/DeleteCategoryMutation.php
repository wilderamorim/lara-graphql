<?php

namespace App\GraphQL\Mutations;

use Closure;
use App\Models\Category;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Mutation;

class DeleteCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteCategory',
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
        return (bool)Category::findOrFail($args['id'])->delete();
    }
}
