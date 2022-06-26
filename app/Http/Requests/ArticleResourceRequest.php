<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

use App\Models\Article;

class ArticleResourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'         =>  'required|max:255',
            'description'   =>  'required',
            'body'    =>  'required|date_format:Y-m-d H:i',
            'is_published'     =>  'boolean',
            'user_id'   =>  'required'
        ];
    }

    /**
     * Persist the request in the storage
     *
     * @param  App\Models\Article|null $article
     * @return App\Models\Article
     */
    public function persist(Article $article = null)
    {
        $article = $article ?? new Article;

        $article->title = $this->title;
        $article->body = $this->body;
        $article->description = $this->description;
        $article->tldr = $this->tldr;
        $article->published_at = $this->published ? Carbon::now() : null;
        $article->user_id = $this->user_id;

        $article->save();

        return $article;
    }

}
