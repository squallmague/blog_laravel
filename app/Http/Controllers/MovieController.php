<?php
namespace Cinema\Http\Controllers;
use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Genre;
use Cinema\Movie;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class MovieController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function find(Route $route){
        $this->movie = Movie::find($route->getParameter('pelicula'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::Movies();
        return view('pelicula.index', compact('movies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::lists('genre', 'id');
        return view('pelicula.create',compact('genres'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movie::create($request->all());
        Session::flash('message','Pelicula Creada Correctamente');
        return Redirect::to('/pelicula');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        $genres = Genre::lists('genre', 'id');
        return view('pelicula.edit',['movie'=>$movie,'genres'=>$genres]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$this->movie->fill($request->all());
        //$this->movie->save();
        $movie = Movie::find($id);
        $movie->fill($request->all());
        $movie->save();

        Session::flash('message','Pelicula Editada Correctamente');
        return Redirect::to('/pelicula');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $this->movie->delete();
        // \Storage::delete($this->movie->path);
        
        Movie::destroy($id);
        $movie = Movie::find($id);

        //faltaaaaaaaaaaaaaaaaaaaaa no he podido borrar los archivos solo el registro de la base de datos
        //\Storage::delete($this->movie->path);

        Session::flash('message','Pelicula Eliminada Correctamente');
        return Redirect::to('/pelicula');
    }
}