<?php

namespace App\GraphQL\Query;

use App\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class BookQuery extends Query
{
    protected $attributes = [
        'name' => 'Book Query',
        'description' => 'A query of nook'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('book'));
    }
    
    // arguments to filter query
    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
        };
        $book = Book::where($where)
            ->get();
        return $book;
    }
}