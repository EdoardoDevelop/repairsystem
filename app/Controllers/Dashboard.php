<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        return view('pages/dashboard', ['title' => 'Dashboard']);
    }
}