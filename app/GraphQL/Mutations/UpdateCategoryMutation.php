<?php

namespace App\GraphQL\Mutations;

use Closure;
use App\Models\Category;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateCategory',
    ];

    public function type(): Type
    {
        return GraphQL::type('Category');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::string(),
            ],
        ];
    }

    protected function rules(array $args = []): array
    {
        return [
            'name' => ['required'],
            'description' => ['nullable'],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $model = Category::findOrFail($args['id']);
        $model->fill($args);
        $model->save();
        return $model;
    }
}
