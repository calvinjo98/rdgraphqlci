<?php

namespace App\GraphQL\Type;

use App\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BookType extends GraphQLType
{
    protected $attributes = [
        'name' => 'book',
        'description' => 'A type',
        'model' => Book::class, // define model for users type
    ];
    
    // define field of type
    public function fields() : array
    {
        return [
            'id' => [
                'type' => Type::int()
            ],
            'id_author_fk' => [
                'type' => Type::int()
            ],
            'name' => [
                'type' => Type::string()
            ],
            'genre' => [
                'type' => Type::string()
            ],
            'author' => [
                'type'          => Type::listOf(GraphQL::type('author')),
                'args'          => [
                    'id_author_fk' => [
                        'type' => Type::int(),
                    ],
                 ],
                'query'         => function(array $args, $query, $ctx) {
                    return $query->where('author.id', '=', $args['id_author_fk']);
                }
            ]
        ];
    }
}