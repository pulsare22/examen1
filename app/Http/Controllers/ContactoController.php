<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Agenda;

class ContactoController extends Controller
{
   public function obtener()
    {
        return Agenda::all();
    }

    public function storeAgenda(Request $request)
    {
      //  dd($request)->all();
        $this->validate($request, [
            'nombre' => 'required|min:3'
        ]);
        return Agenda::create($request->all());
    }


}
