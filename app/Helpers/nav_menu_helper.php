<?php

use Config\Services;
use Utils\Role;

function nav_menu(): string
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $userManager = Services::userManager();
    $roleManager = Services::roleManager();
    $isUserAuthenticated = $userManager->isCurrentUserAuthenticated();
    $isUserAdmin = $isUserAuthenticated && $roleManager->isUserInRole($userManager->getCurrentUser(), Role::Admin);

    helper('html');
    $resultBuilder = "<nav class='navbar navbar-expand-lg navbar-light text-light'><div class='container-fluid justify-content-center text-center gap-3' style='padding: 32px'>";
    $resultBuilder .= anchor('book/list', 'Home', ['class' => 'nav-item']);

    if ($isUserAdmin) {
        $resultBuilder .= anchor('book/', 'Books', ['class' => 'nav-item']);
        $resultBuilder .= anchor('author/', 'Authors', ['class' => 'nav-item']);
    }
    if ($isUserAuthenticated) {
        $resultBuilder .= anchor('account/logout', 'Logout', ['class' => 'nav-item']);
    } else {
        $resultBuilder .= anchor('account/login', 'Login', ['class' => 'nav-item']);
        $resultBuilder .= anchor('account/register', 'Register', ['class' => 'nav-item']);
    }

    $resultBuilder .= "</div></nav>";
    return $resultBuilder;
}