<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Show the Home Page.
     *
     * @return \Inertia\Inertia HomePage
     */
    public function home()
    {
        return Inertia::render('Home');
    }
}
