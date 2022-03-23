<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo '<h1>API Samplemed</h1>';

    }

    public function page_not_found()
    {
        echo 'Method not found';

    }
}
