<?php

namespace App\Models;

use Author;
use CodeIgniter\Model;

class AuthorModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Authors';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'firstname', 'surname', 'yearOfBirth'];

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

        $authors = [];
        foreach ($query->get()->getResultArray() as $authorRow)
            $authors[] = Author::parseFromArray($authorRow);

        return $authors;
    }

    public function find($id = null)
    {
        $builder = $this->builder();
        $query = $builder
            ->select()
            ->where('id', $id);

        return Author::parseFromArray($query->get()->getRowArray());
    }

}
