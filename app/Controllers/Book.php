<?php

namespace App\Controllers;

use App\Models\BookModel;

class Book extends BaseController
{
    private readonly BookModel $model;
    public function __construct()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $this->model = model('App\Models\BookModel');
    }

    public function getIndex()
    {
        $books = $this->model->findAll();
        return view('bookList', ['books' => $books]);
    }

    public function getCreate() {
        $authors = model('App\Models\AuthorModel')->findAll();
        return view('bookCreate', ['authors' => $authors]);
    }
    public function postCreate() {
        $book = \Book::parseFromArray($this->request->getPost());
        $this->model->insert($book);

        return $this->redirectToIndex();
    }

    public function getEdit(int $id) {
        $book = $this->model->find($id);
        $authors = model('App\Models\AuthorModel')->findAll();

        return view('bookEdit', ['book' => $book, 'authors' => $authors]);
    }
    public function postEdit() {
        $id = $this->request->getPost('id');
        $editedBook = \Book::parseFromArray($this->request->getPost());

        $this->model->update($id, $editedBook);
        return $this->redirectToIndex();
    }

    public function getDelete(int $id) {
        $this->model->delete($id);

        return $this->redirectToIndex();
    }

    private function redirectToIndex() {
        return redirect()->to('book/');
    }

}
