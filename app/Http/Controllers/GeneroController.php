<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;

use Cinema\Http\Requests\GenreRequest;

use Cinema\Genre;


//en este controlados uso el metodo resource y hago ejemplos de CRUD con ajax
class GeneroController extends Controller
{
   

    public function listing(){
        $genres = Genre::all();

        return response()->json(
            $genres->toArray()
        );
    }

    public function index()
    {
        return view('genero.index');
    }

    public function create()
    {
    	return view('genero.create');
    }

    public function store(GenreRequest $request)
    {
    	if($request->ajax()){
    		Genre::create($request->all());
    		return response()->json([
    			"mensaje" => "creado"
    			]);
    	}
    }

    public function edit($id)
    {
        $genre = Genre::find($id);

        return response()->json(
            $genre->toArray()
            );
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        $genre->fill($request->all());
        $genre->save();

        return response()->json([
            "mensaje" => "listo"
            ]);
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);
        $genre->delete();
        return response()->json(["msj"=>"borrado"]);
    }
}
