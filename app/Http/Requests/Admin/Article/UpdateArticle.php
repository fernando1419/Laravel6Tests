<?php

namespace App\Http\Requests\Admin\Article;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateArticle extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(): bool
	{
		return Gate::allows('admin.article.edit', $this->article);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(): array
	{
		return [
<<<<<<< Updated upstream
			'title'         => ['required', 'string'],
			'description'   => ['required', 'string'],
			'published_at'  => ['nullable', 'date'],
			// 'author_id'     => 'required',
			'author'        => ['required'],
=======
			'title'         => ['sometimes', 'string'],
			'description'   => ['sometimes', 'string'],
			'published_at'  => ['nullable', 'date'],
			'author_id'     => ['required'], // ['sometimes', 'string'],
>>>>>>> Stashed changes
			'publish_now'   => ['nullable', 'boolean'],
			'unpublish_now' => ['nullable', 'boolean'],
		];
	}

	/**
	 * Modify input data
	 *
	 * @return array
	 */
	public function getSanitized(): array
	{
		$sanitized = $this->validated();

		if (isset($sanitized['publish_now']) && $sanitized['publish_now'] === true) {
			$sanitized['published_at'] = Carbon::now();
		}

		if (isset($sanitized['unpublish_now']) && $sanitized['unpublish_now'] === true) {
			$sanitized['published_at'] = null;
		}

		//Add your code for manipulation with request data here
<<<<<<< Updated upstream
		$sanitized['author_id'] = $this->getAuthorId();
=======
>>>>>>> Stashed changes

		return $sanitized;
	}

<<<<<<< Updated upstream
	/**
	 * getAuthorId
	 *
	 * @return void
	 */
=======
>>>>>>> Stashed changes
	public function getAuthorId()
	{
		if ($this->has('author')) {
			return $this->get('author')['id'];
		}

		return null;
	}
}
