<?php

function nav_menu(): string
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    helper('html');
    $resultBuilder = "<nav class='navbar navbar-expand-lg navbar-light text-light'><div class='container-fluid justify-content-center text-center gap-3' style='padding: 32px'>";

    $resultBuilder .= anchor('book/', 'Books', ['class' => 'nav-item']);
    $resultBuilder .= anchor('author/', 'Authors', ['class' => 'nav-item']);

    $resultBuilder .= "</div></nav>";
    return $resultBuilder;
}