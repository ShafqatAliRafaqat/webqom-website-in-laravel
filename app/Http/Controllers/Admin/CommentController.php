<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCommentRequest;
use App\Models\Article;
use Session;
use Auth;

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

            Session::flash('success', 'The information has been saved successfuly.');
            return redirect()->route('admin.articles.show', [$article->id]);
        }

        return redirect()->back();
    }
}
