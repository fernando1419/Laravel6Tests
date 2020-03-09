<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Author;
use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Brackets\AdminListing\Facades\AdminListing;
use App\Http\Requests\Admin\Article\IndexArticle;
use App\Http\Requests\Admin\Article\StoreArticle;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Http\Requests\Admin\Article\UpdateArticle;
use Illuminate\Auth\Access\AuthorizationException;
use App\Http\Requests\Admin\Article\DestroyArticle;
use App\Http\Requests\Admin\Article\BulkDestroyArticle;

class ArticlesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param IndexArticle $request
	 * @return array|Factory|View
	 */
	public function index(IndexArticle $request)
	{
		// create and AdminListing instance for a specific model and
		$data = AdminListing::create(Article::class)->processRequestAndGet(
			// pass the request with params
			$request,

			// set columns to query
			['id', 'title', 'published_at', 'author_id'],

			// set columns to searchIn
			['id', 'title', 'description'],

			// callback function to retrieve authors
			function ($query) use ($request)
			{
				$query->with(['author']);

				if ($request->has('authors')) {
					$query->whereIn('author_id', $request->get('authors'));
				}
			}
		);

		if ($request->ajax()) {
			if ($request->has('bulk')) {
				return [
					'bulkItems' => $data->pluck('id')
				];
			}

			return ['data' => $data];
		}

		return view('admin.article.index', [
			'data'    => $data,
			'authors' => Author::all()
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @throws AuthorizationException
	 * @return Factory|View
	 */
	public function create()
	{
		$this->authorize('admin.article.create');

		return view('admin.article.create', ['authors' => Author::all()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreArticle $request
	 * @return array|RedirectResponse|Redirector
	 */
	public function store(StoreArticle $request)
	{
        $sanitized = $request->getSanitized();

		// Store the Article
		Article::create($sanitized);

		if ($request->ajax()) {
			return ['redirect' => url('admin/articles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
		}

		return redirect('admin/articles');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Article $article
	 * @throws AuthorizationException
	 * @return void
	 */
	public function show(Article $article)
	{
		$this->authorize('admin.article.show', $article);

		// TODO your code goes here
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Article $article
	 * @throws AuthorizationException
	 * @return Factory|View
	 */
	public function edit(Article $article)
	{
		// dd(Author::all());
		$this->authorize('admin.article.edit', $article);

		return view('admin.article.edit', [
			'article' => $article,
			'authors' => Author::all(),
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateArticle $request
	 * @param Article $article
	 * @return array|RedirectResponse|Redirector
	 */
	public function update(UpdateArticle $request, Article $article)
	{
		// Sanitize input
		$sanitized = $request->getSanitized();

        // Update changed values Article
		$article->update($sanitized);

		if ($request->ajax()) {
			return [
				'redirect' => url('admin/articles'),
				'message'  => trans('brackets/admin-ui::admin.operation.succeeded'),
				'object'   => $article
			];
		}

		return redirect('admin/articles');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param DestroyArticle $request
	 * @param Article $article
	 * @throws Exception
	 * @return ResponseFactory|RedirectResponse|Response
	 */
	public function destroy(DestroyArticle $request, Article $article)
	{
		$article->delete();

		if ($request->ajax()) {
			return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
		}

		return redirect()->back();
	}

	/**
	 * Remove the specified resources from storage.
	 *
	 * @param BulkDestroyArticle $request
	 * @throws Exception
	 * @return Response|bool
	 */
	public function bulkDestroy(BulkDestroyArticle $request) : Response
	{
		DB::transaction(static function () use ($request)
		{
			collect($request->data['ids'])
				->chunk(1000)
				->each(static function ($bulkChunk)
				{
					Article::whereIn('id', $bulkChunk)->delete();

					// TODO your code goes here
				});
		});

		return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
	}
}
