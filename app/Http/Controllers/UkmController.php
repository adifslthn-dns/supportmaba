<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukm;
use App\Models\Category;

class UkmController extends Controller
{
    /**
     * Display a listing of the UKMs.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('ukm', compact('categories'));
    }

    /**
     * Display the specified UKM.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $ukm = Ukm::findOrFail($id);
        return view('ukm-detail', compact('ukm'));
    }
}