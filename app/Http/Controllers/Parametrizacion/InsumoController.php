<?php

namespace App\Http\Controllers\Parametrizacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class InsumoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

  

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }

}
