<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TestController extends Controller
{


    public function index(): View
    {
        return View('backend.pages.Test.inde');
    }
}
