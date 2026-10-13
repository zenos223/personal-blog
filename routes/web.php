<?php

use App\Http\Controllers\UiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\StudentCountController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeDislikeController;

  // UI
  Route::get('/',[UiController::class, 'index'] );
  Route::get('posts-ui',[UiController::class, 'postsIndex'] );
  Route::get('posts-ui/{id}/details', [UiController::class, 'postDetails'])->name('posts.details');
  Route::get('search_posts',[UiController::class, 'search']);
  Route::get('search_posts_by_category/{categoryId}',[UiController::class, 'searchByCategory']);
  // LikeDislike
  Route::post('posts/likes/{postId}',[LikeDislikeController::class, 'like'])->name('posts.likes');
  Route::post('posts/dislikes/{postId}',[LikeDislikeController::class, 'dislike'])->name('posts.dislikes');
  // Comments
  Route::post('posts/comments/{postId}',[CommentController::class,'comment'])->name('posts.comments');

  // ADMIN
  Route::middleware(['auth','admin'])->group(function(){
  Route::get('/admin', [AdminDashboardController::class, 'admin'])->middleware('auth','admin');

  // User
  Route::get('/users',[UserController::class, 'index']);
  Route::get('/users/{id}/edit',[UserController::class, 'edit']);
  Route::post('/users/{id}/update', [UserController::class, 'update']);
  Route::post('/users/{id}/delete', [UserController::class, 'destroy']);

  // Skill
  Route::resource('skills', SkillController::class);
  // Project
  Route::resource('projects',ProjectController::class);
  // Student_count
  Route::get('student_counts',[StudentCountController::class, 'index'])->name('student_counts.index');
  Route::post('student_counts/store',[StudentCountController::class, 'store'])->name('student_counts.store');
  Route::put('student_counts/{id}/update',[StudentCountController::class, 'update'])->name('student_counts.update');
  // Category
  Route::resource('categories',CategoryController::class);
  // Posts
  Route::resource('posts',PostController::class);
  Route::post('comment/{commentId}/show_hide',[PostController::class, 'showHide'])->name('comment.show_hide');
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

