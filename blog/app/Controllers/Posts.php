<?php

namespace App\Controllers;

class Posts extends BaseController
{
    public function index()
    {
        return view('posts/index');
    }

    public function list()
    {
        return view('posts/list');
    }

    public function create()
    {
        return view('posts/create');
    }

    public function edit()
    {
        return view('posts/edit');
    }
}