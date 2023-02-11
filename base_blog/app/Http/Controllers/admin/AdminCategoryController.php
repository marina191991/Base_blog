<?php

namespace app\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminCategoryController extends Controller
{
    public function show(): View
    {
        $categories = DB::table('categories')
            ->orderBy('id')
            ->get();
        return view('admin.categories', ['categories' => $categories]);
    }

    public function categoryFormCreate(): View
    {

        return view('admin.category_form_create');
    }

    public function createCategory(Request $request): RedirectResponse
    {
        $categoryTitle = $request->query('category-title');
        DB::table('categories')->insert(['title' => $categoryTitle]);
        return redirect(route('admin-categories'));
    }

    public function categoryFormEdit(Request $request): View
    {
        $id = $request->query('id');
        $category = DB::table('categories')->where('id', $id)
            ->first();
        return view('admin.category_form_edit', ['category' => $category]);
    }

    public function editCategory(Request $request, $id): RedirectResponse
    {
        $title = $request->query('category-title');
        DB::table('categories')
            ->where('id', '=', $id)
            ->update(['title' => $title]);
        return redirect(route('admin-categories'));
    }

    public function deleteCategory(Request $request): RedirectResponse
    {
        $id = $request->query('id');
        DB::table('categories')->delete($id);
        return redirect(route('admin-categories'));
    }
}
