<?php

namespace App\Controllers;

use App\Models\BookModel;
use Config\Services;
use Services\Abstractions\IRoleManager;
use Services\Abstractions\UserManagerBase;
use Utils\Role;

class Book extends BaseController
{
    private readonly BookModel $model;
    private readonly UserManagerBase $userManager;
    private readonly IRoleManager $roleManager;
    public function __construct()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $this->model = model('App\Models\BookModel');

        $this->userManager = Services::userManager();
        $this->roleManager = Services::roleManager();
    }

    public function getList() {
        $books = $this->model->findAllDto();
        return view('bookClient', ['books' => $books]);
    }

    public function getIndex()
    {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        $books = $this->model->findAll();
        return view('bookList', ['books' => $books]);
    }

    public function getCreate() {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        $authors = model('App\Models\AuthorModel')->findAll();
        return view('bookCreate', ['authors' => $authors]);
    }
    public function postCreate() {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        $book = \Book::parseFromArray($this->request->getPost());
        $this->model->insert($book);

        return $this->redirectToIndex();
    }

    public function getEdit(int $id) {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        $book = $this->model->find($id);
        $authors = model('App\Models\AuthorModel')->findAll();

        return view('bookEdit', ['book' => $book, 'authors' => $authors]);
    }
    public function postEdit() {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        $id = $this->request->getPost('id');
        $editedBook = \Book::parseFromArray($this->request->getPost());

        $this->model->update($id, $editedBook);
        return $this->redirectToIndex();
    }

    public function getDelete(int $id) {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        $this->model->delete($id);

        return $this->redirectToIndex();
    }

    private function redirectToIndex() {
        return redirect()->to('book/');
    }

    private function hasAccess() {
        return $this->userManager->isCurrentUserAuthenticated() && $this->roleManager->isUserInRole($this->userManager->getCurrentUser(), Role::Admin);
    }

    private function redirectToLogin() {
        return redirect()->to('account/login')->withCookies();
    }

}
