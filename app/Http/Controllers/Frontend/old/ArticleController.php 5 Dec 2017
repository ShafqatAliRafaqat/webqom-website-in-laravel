<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use DB;
use Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $grouped_articles = collect();
        $list_articles_by_years = collect();
        $grouped_articles = Article::groupBy(DB::raw("YEAR(post_date)"))->get();

        if (!$grouped_articles->isEmpty()) {
            $grouped_articles->map(function($article){
                $article->list_articles = Article::PostDateByYear($article->post_date_year)->orderBy('created_at','desc')->get();
            });
        }

        return view('frontend.blog.index', ['articles' => $grouped_articles]);
    }

    public function show(Request $request, $id)
    {
        $user = Auth::user();
        $articles = Article::orderBy('created_at','desc')->get();

        //popular posts
        $popular_post = $articles->map(function($article){
            $article->total_comments = $article->comments->count();
            return $article;
        })->sortByDesc(function($article){
            return $article->total_comments;
        })->splice(0,3);

        //recent posts
        $recent_post = $articles->splice(0,3);

        // grouped article
        $grouped_articles = collect();
        $grouped_articles = Article::groupBy(DB::raw("YEAR(post_date)"))->get();

        $article = Article::find($id);
        if (!empty($article)) {
            return view('frontend.blog.show', ['article' => $article, 'user' => $user, 'popular_post' => $popular_post, 'recent_post' => $recent_post, 'grouped_articles' => $grouped_articles]);
        }
        return redirect()->route('frontend.articles.index');
    }
}
