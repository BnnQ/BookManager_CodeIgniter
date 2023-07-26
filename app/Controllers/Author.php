<?php

namespace App\Controllers;

use App\Models\AuthorModel;

class Author extends BaseController
{
    private readonly AuthorModel $model;
    public function __construct()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $this->model = model('App\Models\AuthorModel');
    }

    public function getIndex()
    {
        $authors = $this->model->findAll();
        return view('authorList', ['authors' => $authors]);
    }

    public function getCreate() {
        return view('authorCreate');
    }
    public function postCreate() {
        $author = \Author::parseFromArray($this->request->getPost());
        $this->model->insert($author);

        return $this->redirectToIndex();
    }

    public function getEdit(int $id) {
        $author = $this->model->find($id);
        return view('authorEdit', ['author' => $author]);
    }
    public function postEdit() {
        $id = $this->request->getPost('id');
        $editedAuthor = \Author::parseFromArray($this->request->getPost());

        $this->model->update($id, $editedAuthor);
        return $this->redirectToIndex();
    }

    public function getDelete(int $id) {
        $this->model->delete($id);

        return $this->redirectToIndex();
    }

    private function redirectToIndex() {
        return redirect()->to('author/');
    }
}
