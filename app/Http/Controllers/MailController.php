<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;

use Mail;

use Session;

use Redirect;

class MailController extends Controller
{
    public function store(Request $request)
    {
    	Mail::send('emails.contact',$request->all(), function($msj){
    		$msj->subject('Correo de Contacto');
    		$msj->to('ibrahimzerpa@gmail.com');
    	});

    	Session::flash('message','Mensaje enviado Correctamente');

    	return Redirect::to('/contacto');
    }
}
