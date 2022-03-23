<?php

namespace App\Controllers;

class Posts extends BaseController
{
    public function index()
    {
        echo 'Page list posts';

    }

    public function create()
    {
        echo 'Page create new posts';

    }

    public function edit()
    {
        echo 'Page edit post';

    }
}