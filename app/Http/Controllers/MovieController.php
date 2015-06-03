<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Review;
use App\Rating;
use App\Like;
use Auth; 

use App\Http\Requests\CreateMovieRequest;
use Request;





class MovieController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function index()
	{
		//
		$movies = Movie::all();
		return view('movies.index', compact('movies'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('movies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateMovieRequest $request)
	{
		//


		
		Movie::create($request->all());
		
		return redirect('movies');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$movie = Movie::find($id);
		$reviews=Review::all();
		//$ratings=Rating::all();
		$ratings = Rating::where('movie_id', $id)->get();
		$user=Auth::user();
		$total=Rating::where('movie_id', $id)->sum('value');
		if($total==0)
			$total=1;

		
		//Auth::user()->products->sum('price');
		//Employee::where('login', $login)->first();
		//ss$user = DB::table('users')->where('name', 'John')->first();
		//$name = DB::table('users')->where('name', 'John')->pluck('name');





		return view('movies.show', compact('movie','reviews','ratings','total', 'user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$movie = Movie::find($id);
		return view('movies.edit', compact('movie'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//

		$movie = Movie::find($id);
		$input = $request::all();
		$movie->update($input);
		return redirect('movies');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Movie::destroy($id);
		return redirect('movies');
		//
	}

}
