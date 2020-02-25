<?php

namespace App\Http\Controllers;

use App\Author;
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
		return view('articles.create', ['authors' => $this->getAuthors()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		Article::create($this->validateArticle($request));

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
		$author = Author::findOrFail($article->author_id);

		return view('articles.show', compact('article', 'author'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Article $article
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Article $article)
	{
		$authors = $this->getAuthors();

		return view('articles.edit', compact('article', 'authors'));
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
		$article->update($this->validateArticle($request));

		return redirect()->route('articles.show', ['article' => $article->id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Article  $article
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Article $article)
	{
		$article->delete();

		return redirect()->route('articles.index');
	}

	/**
	 * validateArticle
	 *
	 * @param Request $request
	 * @return array validated attributes
	 */
	protected function validateArticle(Request $request)
	{
		return $request->validate([
			'title'        => 'required|min:3|max:255',
			'description'  => 'required',
			'author_id'    => 'required',
			'published_at' => 'required|date|before_or_equal:today'
		]);
	}

	protected function getAuthors()
	{
		return Author::pluck('name', 'id');
	}
}
