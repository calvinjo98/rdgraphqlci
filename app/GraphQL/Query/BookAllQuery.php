<?php

namespace App\GraphQL\Query;

use App\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class BookAllQuery extends Query
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
        return [];
    }

    public function resolve($root, $args)
    {
        $book = Book::get();
        return $book;
    }
}