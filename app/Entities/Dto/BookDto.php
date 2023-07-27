<?php

class BookDto
{
    public function __construct(public ?int $id, public string $title, public float $price, public string $authorName, public int $yearOfPublish)
    {
        //empty
    }

    public static function parseFromArray(array $associativeArray): BookDto {
        return new BookDto(@$associativeArray['id'], @$associativeArray['title'], @$associativeArray['price'], @$associativeArray['authorName'], @$associativeArray['yearOfPublish']);
    }

}