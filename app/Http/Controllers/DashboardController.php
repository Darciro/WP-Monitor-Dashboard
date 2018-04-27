<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;

class DashboardController extends Controller
{
    private $sites;

    public function __construct(Site $sites) {
        $this->sites = $sites;
    }

    public function index() {
        $title = 'Página inicial';
        $sites = $this->sites->all();

		return view('home', compact('title', 'sites'));
    }
}
