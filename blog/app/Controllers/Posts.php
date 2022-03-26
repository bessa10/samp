<?php

namespace App\Controllers;

use Exception;

class Posts extends BaseController
{
    private $postsModel;
    private $categoriesModel;

    public function __construct()
    {
        $this->postsModel = new \App\Models\postsModel();
        $this->categoriesModel = new \App\Models\categoriesModel();
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

        $list_categories = $this->categoriesModel->list();

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

        return view('posts/create', compact('validation_error', 'list_categories'));
    }

    public function edit($cod_post)
    {
        $post_data = $this->postsModel->find($cod_post);

        if (!$post_data) {

            $alert['type'] = 'danger';
            $alert['msg']  = 'Unable to edit the post, please try again.';

            session()->setFlashdata($alert);

            return redirect()->route('posts/list');
        }

        $validation_error = null;
        $list_categories = $this->categoriesModel->list();

        if ($_SERVER['REQUEST_METHOD']=='POST') {

            $response = $this->postsModel->edit($cod_post, $_POST);

            if ($response['response'] == 'success') {

                $alert['type'] = 'success';
                $alert['msg']  = 'Post successfully changed';

                session()->setFlashdata($alert);

                return redirect()->route('posts/list');

            } else {

                if ($response['validation_error']) {

                    $validation_error = $response['validation_error'];

                    $type = 'danger';
                    $msg  = 'There are validation errors';

                } else {

                    $type = 'danger';
                    $msg  = 'Unable to change post';
                }

                $alert['type'] = $type;
                $alert['msg']  = $msg;

                session()->setFlashdata($alert);
            }
        }

        return view('posts/edit', compact('validation_error', 'list_categories', 'post_data'));
    }

    public function remove()
    {  
        if ($_SERVER['REQUEST_METHOD']=='POST') {

            if ($this->request->getPost('exc_cod_post')) {

                $cod_post = $this->request->getPost('exc_cod_post');

                $response = $this->postsModel->remove($cod_post);

                if ($response['response'] == 'success') {

                    $type = 'success';
                    $msg  = 'Post successfully removed.';

                } else {

                    $type = 'danger';
                    $msg  = 'Unable to remove post, please try again.';
                }
            }

        } else {

            $type = 'danger';
            $msg  = 'Unable to remove post, please try again.';
        }

        $alert['type'] = $type;
        $alert['msg']  = $msg;

        session()->setFlashdata($alert);

        return redirect()->route('posts/list');
    }



}