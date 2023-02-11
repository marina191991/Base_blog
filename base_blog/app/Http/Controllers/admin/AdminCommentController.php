<?php

namespace app\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminCommentController extends Controller
{
    public function show(): View
    {
        $comments = DB::table('comments')
            ->select('comments.*', 'posts.title as post_title')
            ->leftJoin('posts', 'comments.postID', '=', 'posts.id')
            ->get();
        return view('admin.comments', ['comments' => $comments]);
    }

    public function commentFormEdit(Request $request): View
    {
        $id = $request->query('id');
        $comment = DB::table('comments')->where('id', $id)->first();
        return view('admin.comment_form_edit', ['comment' => $comment]);
    }

    public function editComment(Request $request): RedirectResponse
    {
        $id = $request->query('id');
        $name = $request->post('name');
        $body = $request->post('body');
        DB::table('comments')
            ->where('id', $id)
            ->update(['name' => $name, 'body' => $body]);
        return redirect(route('admin-comments'));
    }

    public function deleteComment(Request $request): RedirectResponse
    {
        $id = $request->query('id');
        DB::table('comments')->delete($id);
        return redirect(route('admin-comments'));
    }
}
