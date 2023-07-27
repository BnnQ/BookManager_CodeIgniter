<?php

namespace App\Controllers;

use App\Models\AuthorModel;
use Config\Services;
use Services\Abstractions\IRoleManager;
use Services\Abstractions\UserManagerBase;
use Utils\Role;

class Author extends BaseController
{
    private readonly AuthorModel $model;
    private readonly UserManagerBase $userManager;
    private readonly IRoleManager $roleManager;
    public function __construct()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $this->model = model('App\Models\AuthorModel');

        $this->userManager = Services::userManager();
        $this->roleManager = Services::roleManager();
    }

    public function getIndex()
    {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        $authors = $this->model->findAll();
        return view('authorList', ['authors' => $authors]);
    }

    public function getCreate() {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        return view('authorCreate');
    }
    public function postCreate() {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        $author = \Author::parseFromArray($this->request->getPost());
        $this->model->insert($author);

        return $this->redirectToIndex();
    }

    public function getEdit(int $id) {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        $author = $this->model->find($id);
        return view('authorEdit', ['author' => $author]);
    }
    public function postEdit() {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        $id = $this->request->getPost('id');
        $editedAuthor = \Author::parseFromArray($this->request->getPost());

        $this->model->update($id, $editedAuthor);
        return $this->redirectToIndex();
    }

    public function getDelete(int $id) {
        if (!$this->hasAccess())
            return $this->redirectToLogin();

        $this->model->delete($id);
        return $this->redirectToIndex();
    }

    private function redirectToIndex() {
        return redirect()->to('author/');
    }

    private function hasAccess() {
        return $this->userManager->isCurrentUserAuthenticated() && $this->roleManager->isUserInRole($this->userManager->getCurrentUser(), Role::Admin);
    }

    private function redirectToLogin() {
        return redirect()->to('account/login')->withCookies();
    }

}
