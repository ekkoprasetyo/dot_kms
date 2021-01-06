<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\KbaseController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\RewardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Login Section
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/validate', [LoginController::class, 'validateLogin'])->name('login.validate');
Route::get('/login/disable', [LoginController::class, 'disable'])->name('login.disable');
Route::get('/login/destroy', [LoginController::class, 'destroy'])->name('login.destroy');

//Route Need Session
Route::group(['middleware' => ['user.session']], function () {

    //Route Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    //Route Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/home/route', [HomeController::class, 'route'])->name('home.route');
    Route::get('/home/logout', [HomeController::class, 'logout'])->name('home.logout');

//  Route Need Permission
    Route::group(['middleware' => []], function () {

        //Route Permission
        Route::get('/permission', [PermissionController::class, 'index'])->name('permission');
        Route::post('/permission/datatables',[PermissionController::class, 'datatables'])->name('permission.datatables');//JSON Request
        Route::post('/permission/add', [PermissionController::class, 'add'])->name('permission.add');
        Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');
        Route::post('/permission/edit', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::patch('/permission/update', [PermissionController::class, 'update'])->name('permission.update');
        Route::post('/permission/delete', [PermissionController::class, 'delete'])->name('permission.delete');
        Route::patch('/permission/destroy', [PermissionController::class, 'destroy'])->name('permission.destroy');

        //Route Role
        Route::get('/role', [RoleController::class, 'index'])->name('role');
        Route::post('/role/datatables',[RoleController::class, 'datatables'])->name('role.datatables');//JSON Request
        Route::post('/role/add', [RoleController::class, 'add'])->name('role.add');
        Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
        Route::post('/role/edit', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/role/edit-permission', [RoleController::class, 'edit_permission'])->name('role.edit-permission');
        Route::patch('/role/update', [RoleController::class, 'update'])->name('role.update');
        Route::patch('/role/update-permission', [RoleController::class, 'update_permission'])->name('role.update-permission');
        Route::post('/role/delete', [RoleController::class, 'delete'])->name('role.delete');
        Route::patch('/role/destroy', [RoleController::class, 'destroy'])->name('role.destroy');

        //Route Users
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        Route::post('/users/datatables',[UsersController::class, 'datatables'])->name('users.datatables');//JSON Request
        Route::post('/users/add', [UsersController::class, 'add'])->name('users.add');
        Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
        Route::post('/users/detail', [UsersController::class, 'detail'])->name('users.detail');
        Route::post('/users/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::patch('/users/update', [UsersController::class, 'update'])->name('users.update');
        Route::post('/users/edit-password', [UsersController::class, 'edit_password'])->name('users.edit-password');
        Route::patch('/users/update-password', [UsersController::class, 'update_password'])->name('users.update-password');
        Route::post('/users/delete', [UsersController::class, 'delete'])->name('users.delete');
        Route::patch('/users/destroy', [UsersController::class, 'destroy'])->name('users.destroy');

        //Route Forum
        Route::get('/forum', [ForumController::class, 'index'])->name('forum');
        Route::get('/forum/comment', [ForumController::class, 'comment'])->name('forum.detail');
        Route::post('/forum/datatables',[ForumController::class, 'datatables'])->name('forum.datatables');//JSON Request
        Route::post('/forum/add', [ForumController::class, 'add'])->name('forum.add');
        Route::post('/forum/store', [ForumController::class, 'store'])->name('forum.store');
        Route::post('/forum/edit', [ForumController::class, 'edit'])->name('forum.edit');
        Route::patch('/forum/update', [ForumController::class, 'update'])->name('forum.update');
        Route::post('/forum/delete', [ForumController::class, 'delete'])->name('forum.delete');
        Route::patch('/forum/destroy', [ForumController::class, 'destroy'])->name('forum.destroy');
        Route::post('/forum/comment', [ForumController::class, 'comment'])->name('forum.comment');

        //Route Reward
        Route::get('/reward', [RewardController::class, 'index'])->name('reward');
        Route::get('/reward/comment', [RewardController::class, 'comment'])->name('reward.detail');
        Route::post('/reward/datatables',[RewardController::class, 'datatables'])->name('reward.datatables');//JSON Request
        Route::post('/reward/add', [RewardController::class, 'add'])->name('reward.add');
        Route::post('/reward/store', [RewardController::class, 'store'])->name('reward.store');
        Route::post('/reward/edit', [RewardController::class, 'edit'])->name('reward.edit');
        Route::patch('/reward/update', [RewardController::class, 'update'])->name('reward.update');
        Route::post('/reward/delete', [RewardController::class, 'delete'])->name('reward.delete');
        Route::patch('/reward/destroy', [RewardController::class, 'destroy'])->name('reward.destroy');

        //Route Kbase
        Route::get('/kbase', [KbaseController::class, 'index'])->name('kbase');
        Route::post('/kbase/datatables',[KbaseController::class, 'datatables'])->name('kbase.datatables');//JSON Request
        Route::post('/kbase/add', [KbaseController::class, 'add'])->name('kbase.add');
        Route::post('/kbase/store', [KbaseController::class, 'store'])->name('kbase.store');
        Route::post('/kbase/edit', [KbaseController::class, 'edit'])->name('kbase.edit');
        Route::patch('/kbase/update', [KbaseController::class, 'update'])->name('kbase.update');
        Route::post('/kbase/delete', [KbaseController::class, 'delete'])->name('kbase.delete');
        Route::patch('/kbase/destroy', [KbaseController::class, 'destroy'])->name('kbase.destroy');
        
    });
});