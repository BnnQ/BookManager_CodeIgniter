<?php

class Author
{
    public function __construct(public ?int $id, public string $firstname, public string $surname, public int $yearOfBirth)
    {
        //empty
    }

    public static function parseFromArray(array $associativeArray): Author {
        return new Author(@$associativeArray['id'], @$associativeArray['firstname'], @$associativeArray['surname'], @$associativeArray['yearOfBirth']);
    }

    public function __toString(): string
    {
        return $this->firstname.' '.$this->surname;
    }

}