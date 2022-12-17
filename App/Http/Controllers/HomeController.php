<?php
namespace App\Http\Controllers;

class  HomeController
{
    public function index($data)
    {
        dd($data);
    }

    public function store() {
        dd('store');
    }
}
