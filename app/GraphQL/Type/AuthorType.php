<?php

namespace App\GraphQL\Type;

use App\Author;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AuthorType extends GraphQLType
{
    protected $attributes = [
        'name' => 'author',
        'description' => 'A type',
        'model' => Author::class, // define model for users type
    ];
    
    // define field of type
    public function fields() : array
    {
        return [
            'id' => [
                'type' => Type::int()
            ],
            'name' => [
                'type' => Type::string()
            ],
            'age' => [
                'type' => Type::int()
            ]
        ];
    }
}