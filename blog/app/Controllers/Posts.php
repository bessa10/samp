<?php

namespace App\Controllers;

class Posts extends BaseController
{
    private $postsModel;

    public function __construct()
    {
        $this->postsModel = new \App\Models\postsModel();
    }

    public function index()
    {
        return view('posts/index');
    }

    public function list()
    {
        $list_posts = $this->postsModel->list();

        return view('posts/list', compact('list_posts'));
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