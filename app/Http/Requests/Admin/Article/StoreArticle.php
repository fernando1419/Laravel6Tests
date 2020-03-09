<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreArticle extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(): bool
	{
		return Gate::allows('admin.article.create');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(): array
	{
		return [
			'title'        => ['required', 'string'],
			'description'  => ['required', 'string'],
			'published_at' => ['nullable', 'date'],
			// 'author_id'    => ['required'],
			'author'       => ['required'],
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

		//Add your code for manipulation with request data here
        $sanitized['author_id'] = $this->getAuthorId();

		return $sanitized;
	}

	/**
	 * getAuthorId
	 *
	 * @return void
	 */
	public function getAuthorId()
	{
		if ($this->has('author')) {
			return $this->get('author')['id'];
		}

		return null;
	}
}
