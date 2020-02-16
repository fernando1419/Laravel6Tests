<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$articles = Article::latest('published_at')->take(25)->get();

		return view('articles.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// TODO: validate the form request data
		$article                = new Article();
		$article->title         = $request->title; // dd(request()->title);
		$article->description   = $request->description; // dd(request()->description);
		$article->published_at  = $request->published_at; // dd(request()->published_at);
		$article->save();

		return redirect()->route('articles.index'); // redirect()->action('ArticlesController@index'); (redirect using an action)
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Article  $article (id of an article)
	 * @return \Illuminate\Http\Response
	 */
	public function show(Article $article)
	{
		return view('articles.show', ['article' => $article]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Article $article
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Article $article)
	{
		return view('articles.edit', compact('article'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Article $article
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Article $article)
	{
		$article->title        = $request->title;
		$article->description  = $request->description;
		$article->published_at = $request->published_at;
		$article->save();

		return redirect()->route('articles.show', ['article' => $article->id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
