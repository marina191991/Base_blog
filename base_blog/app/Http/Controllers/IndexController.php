<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function show(Request $request): View
    {
        $page = $request->query('page', 1);

        $queryBuilder = DB::table('posts')
            ->select('posts.*', 'categories.title as category_title')
            ->leftJoin('categories', 'posts.categoryID', '=', 'categories.id')
            ->orderBy('date', 'desc');

        if ($categoryTitle = $request->get('category_title')) {
            $queryBuilder->where('categories.title', '=', $categoryTitle);

        }
        $totalCountPost = $queryBuilder->count();
        $queryBuilder->limit(5);
        $queryBuilder->offset(((int)$page - 1) * 5);

        $posts = $queryBuilder->get();

        $totalCountPages = ceil($totalCountPost / 5);
        $sidebar = new SidebarController();
        $comments = $sidebar->getComments();
        $categories = $sidebar->getCategories();

        return view('index', ['posts' => $posts, 'comments' => $comments, 'categories' => $categories, 'totalCountPages' => $totalCountPages, 'page' => $page, 'totalCountPost' => $totalCountPost, 'categoryTitle' => $categoryTitle]);
    }
}
