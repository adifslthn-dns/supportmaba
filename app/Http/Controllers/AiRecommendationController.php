<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AiRecommendationController extends Controller
{
    /**
     * Display the AI recommendation page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('ai-recommendation');
    }
}