<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CreateCommentRequest;
use Auth;
use App\Models\Article;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, $id)
    {
        $user = Auth::user();
        $article = Article::find($id);
        if (!empty($article)) {
            $article->comments()->create(array_merge($request->all(), [
                'article_id' => $id,
                'user_id' => $user->id
            ]));

            return redirect()->route('frontend.articles.show', [$article->id]);
        }

        return redirect()->back();
    }
}
