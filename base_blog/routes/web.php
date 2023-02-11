<?php

use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminPostController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminCommentController;

Route::get('/', [IndexController::class, 'show'])->name('index');

Route::get('/post/{id}', [PostController::class, 'show'])->name('posts');

Route::get('/admin/posts', [AdminPostController::class, 'show'])->name('admin-post-page');

Route::get('/admin/delete_post', [AdminPostController::class, 'deletePost'])->name('admin-delete-post');

Route::get('/admin/post_form_create', [AdminPostController::class, 'postFormCreate'])->name('admin-post_form-create');

Route::get('/admin/post_form_edit', [AdminPostController::class, 'postFormEdit'])->name('admin-post_form-edit');

Route::post('/admin/create_post', [AdminPostController::class, 'createPost'])->name('admin-create-post');

Route::post('/admin/edit_post', [AdminPostController::class, 'editPost'])->name('admin-edit-post');

Route::get('/admin/categories', [AdminCategoryController::class, 'show'])->name('admin-categories');

Route::get('/admin/category_form_create', [AdminCategoryController::class, 'categoryFormCreate'])->name('admin-category_form-create');

Route::get('/admin/create_category', [AdminCategoryController::class, 'createCategory'])->name('admin-create-category');

Route::get('/admin/category_form_edit', [AdminCategoryController::class, 'categoryFormEdit'])->name('admin-category_form-edit');

Route::get('/admin/edit_category/{id}', [AdminCategoryController::class, 'editCategory'])->name('admin-category-edit');

Route::get('/admin/delete_category', [AdminCategoryController::class, 'deleteCategory'])->name('admin-delete-category');

Route::get('/admin/comments', [AdminCommentController::class, 'show'])->name('admin-comments');

Route::get('/admin/comment_form_edit', [AdminCommentController::class, 'commentFormEdit'])->name('admin-comment_form-edit');

Route::post('/admin/edit_comment', [AdminCommentController::class, 'editComment'])->name('admin-comment-edit');

Route::get('/admin/delete_comment', [AdminCommentController::class, 'deleteComment'])->name('admin-comment-delete');
