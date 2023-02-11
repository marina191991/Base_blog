<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    public function show(Request $request, $id): View
    {
        $queryBuilder = DB::table('posts')
            ->select('posts.*', 'categories.title as category_title')
            ->leftJoin('categories', 'posts.categoryID', '=', 'categories.id')
            ->where('posts.id', '=', $id);
        $post = $queryBuilder->first();

        if (($nameComment = $request->get('comment-input-name')) && ($textComment = $request->get('comment-input-text'))) {
            DB::table('comments')
                ->insert(['name' => $nameComment, 'body' => $textComment, 'postID' => $id, 'date' => now()]);
        }
        $queryBuilder = DB::table('comments')
            ->where('postID', '=', $id);
        $commentsPost = $queryBuilder->get();
        $sidebar = new SidebarController();
        $comments = $sidebar->getComments();
        $categories = $sidebar->getCategories();
        return view('post_page', ['comments' => $comments, 'categories' => $categories, 'post' => $post, 'commentsPost' => $commentsPost]);
    }
}
