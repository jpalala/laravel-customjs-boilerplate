<?php

namespace App\Http\Controllers\Pub;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;

use App\Http\Resources\ArticleResource;
use App\Http\Requests\ArticleResourceRequest;
class ArticlesController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @param  ArticleFilters $filters
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return ArticleResource::collection($articles);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Publication\ArticleResourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleResourceRequest $request)
    {
        $user =  Auth::user();

        //if (auth()::user()->can('can:create-articles')) {
            return new ArticleResource($request->persist());
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Publication\ArticleResourceRequest  $request
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleResourceRequest $request, Article $article)
    {
        return new ArticleResource($request->persist($article));
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
