<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SidebarController extends Controller
{

    public function getComments(): Collection
    {
        return DB::table('comments')
            ->select('comments.*', 'posts.title as post_title')
            ->leftJoin('posts', 'comments.postID', '=', 'posts.id')
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

    }

    public function getCategories(): Collection
    {
        return DB::table('categories')->get();
    }
}
