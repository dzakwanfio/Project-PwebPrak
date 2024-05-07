<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        return view('pages.services.index');
    }

    public function eye_specialist()
    {
        return view('pages.services.eye_specialist');
    }

    public function kulitkelamin()
    {
        return view('pages.services.kulitkelamin');
    }

    public function penyakitdalam()
    {
        return view('pages.services.penyakitdalam');
    }

    public function tht_specialist()
    {
        return view('pages.services.tht_specialist');
    }
}
