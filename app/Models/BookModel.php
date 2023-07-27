<?php

namespace App\Models;

use Book;
use BookDto;
use CodeIgniter\Model;

class BookModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Books';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'title', 'price', 'authorId', 'yearOfPublish'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findAll(int $limit = 0, int $offset = 0)
    {
        $builder = $this->builder();
        $query = $builder->select();

        if ($limit > 0)
            $query = $query->limit($limit);

        if ($offset > 0)
            $query = $query->offset($offset);

        $books = [];
        foreach ($query->get()->getResultArray() as $bookRow)
            $books[] = Book::parseFromArray($bookRow);

        return $books;
    }

    public function find($id = null)
    {
        $builder = $this->builder();
        $query = $builder
            ->select()
            ->where('id', $id);

        return Book::parseFromArray($query->get()->getRowArray());
    }

    public function findAllDto(int $limit = 0, int $offset = 0) {
        $builder = $this->builder();
        $query = $builder
            ->select("Books.id, Books.title, Books.price, Books.yearOfPublish, CONCAT(Authors.firstname, ' ', Authors.surname) as authorName")
            ->join('Authors', 'Books.authorId = Authors.id');

        if ($limit > 0)
            $query = $query->limit($limit);

        if ($offset > 0)
            $query = $query->offset($offset);

        $books = [];
        foreach ($query->get()->getResultArray() as $bookRow)
            $books[] = BookDto::parseFromArray($bookRow);

        return $books;
    }

}
