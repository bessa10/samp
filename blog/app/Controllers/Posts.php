<?php

namespace App\Controllers;

use Exception;

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
        $validation_error = null;

        if ($_SERVER['REQUEST_METHOD']=='POST') {

            $retorno = $this->postsModel->create($_POST);

            if ($retorno['response'] == 'success') {

                $alert['type'] = 'success';
                $alert['msg']  = 'Post registered successfully';

                session()->setFlashdata($alert);

                return redirect()->route('posts/list');

            } else {

                if ($retorno['validation_error']) {

                    $validation_error = $retorno['validation_error'];

                    $type = 'danger';
                    $msg  = 'There are validation errors';

                } else {

                    $type = 'danger';
                    $msg  = 'Unable to register the post';
                }

                $alert['type'] = $type;
                $alert['msg']  = $msg;

                session()->setFlashdata($alert);
            }
        }

        return view('posts/create', compact('validation_error'));
    }

    public function edit()
    {
        return view('posts/edit');
    }
}