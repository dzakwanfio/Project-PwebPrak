<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        return view('index');
    }
    public function services()
    {
        return view('service');
    }
    public function kulitkelamin()
    {
        return view('kulitkelamin');
    }
    public function eye_specialist()
    {
        return view('eye_specialist');
    }
    public function penyakitdalam()
    {
        return view('penyakitdalam');
    }
    public function tht_specialist()
    {
        return view('tht_specialist');
    }
}
