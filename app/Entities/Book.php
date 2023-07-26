<?php

class Book
{
    public function __construct(public ?int $id, public string $title, public float $price, public int $authorId, public int $yearOfPublish)
    {
        //empty
    }

    public static function parseFromArray(array $associativeArray): Book {
        return new Book(@$associativeArray['id'], @$associativeArray['title'], @$associativeArray['price'], @$associativeArray['authorId'], @$associativeArray['yearOfPublish']);
    }
}