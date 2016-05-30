<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Chat;

class ChatController extends Controller
{
	public function obtener()
    {
        return Chat::all();
    }
     public function storeChat(Request $request)
    {
      //  dd($request)->all();
        $this->validate($request, [
            'usuario' => 'required|min:3'
        ]);
        return Chat::create($request->all());
    }
    public function storeChatt(Request $request)
    {
      //  dd($request)->all();
        $this->validate($request, [
            'usuario' => 'required|min:3'
        ]);
        return Chat::create($request->all());
    }


}
