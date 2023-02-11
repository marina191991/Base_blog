<?php

namespace app\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminPostController extends Controller
{
    public function show(): View
    {
        $queryParam = DB::table('posts')->select('posts.id', 'posts.title', 'categories.title as category_title')
            ->leftJoin('categories', 'posts.categoryID', '=', 'categories.id');

        $posts = $queryParam->get();
        return view('admin.posts', ['posts' => $posts]);
    }

    public function postFormCreate(): View
    {
        $categoriesTitle = DB::table('categories')->select('title')->get();
        return view('admin.post_form_create', ['categoriesTitle' => $categoriesTitle]);
    }

    public function postFormEdit(Request $request): View
    {
        $id = $request->query('id');
        $post = DB::table('posts')
            ->select('posts.*', 'categories.title as category_title')
            ->leftJoin('categories', 'posts.categoryID', '=', 'categories.id')
            ->where('posts.id', '=', $id)->first();
        $categoriesTitle = DB::table('categories')->select('title')->get();

        return view('admin.post_form_edit', ['post' => $post, 'categoriesTitle' => $categoriesTitle]);
    }

    public function editPost(Request $request): RedirectResponse
    {
        $id = $request->query('id');
        $title = $request->post('title');
        $body = $request->post('body');
        $categoryTitle = $request->post('category');
        $requestCategoryID = DB::table('categories')->where('title', '=', $categoryTitle)->value('id');
        $categoryID = $requestCategoryID;
        DB::table('posts')
            ->where('id', $id)
            ->update(['title' => $title, 'body' => $body, 'categoryID' => $categoryID, 'update_date' => now()]);
        return redirect(route('admin-post-page'));
    }

    public function createPost(Request $request): RedirectResponse
    {
        $title = $request->post('title');
        $body = $request->post('body');
        $categoryTitle = $request->post('category');

        $requestCategoryID = DB::table('categories')->where('title', '=', $categoryTitle)->value('id');
        $categoryID = $requestCategoryID;
        DB::table('posts')
            ->insert(['title' => $title, 'body' => $body, 'categoryID' => $categoryID, 'date' => now()]);
        return redirect(route('admin-post-page'));
    }

    public function deletePost(Request $request): RedirectResponse
    {
        $delID = $request->query('id');
        DB::table('posts')->delete($delID);
        return redirect(route('admin-post-page'));
    }
}
