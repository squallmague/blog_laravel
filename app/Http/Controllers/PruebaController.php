<?php namespace Cinema\Http\Controllers;
class PruebaController extends Controller {
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return "Hola desde Controller";
	}

	public function nombre($nombre = "sin nombre")
	{
		return "Hola mi nombre es: ".$nombre;
	}
}