<?php

namespace App\Http\Controllers\Contexto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AlcanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            return view('pages.Contexto.alcance.index');
        }
    }

  
}
