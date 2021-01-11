<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\KnowledgeDocumentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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

        //Route Branch
        Route::get('/branch', [BranchController::class, 'index'])->name('branch');
        Route::post('/branch/datatables',[BranchController::class, 'datatables'])->name('branch.datatables');//JSON Request
        Route::post('/branch/add', [BranchController::class, 'add'])->name('branch.add');
        Route::post('/branch/store', [BranchController::class, 'store'])->name('branch.store');
        Route::post('/branch/edit', [BranchController::class, 'edit'])->name('branch.edit');
        Route::patch('/branch/update', [BranchController::class, 'update'])->name('branch.update');
        Route::post('/branch/delete', [BranchController::class, 'delete'])->name('branch.delete');
        Route::patch('/branch/destroy', [BranchController::class, 'destroy'])->name('branch.destroy');

        //Route Position
        Route::get('/position', [PositionController::class, 'index'])->name('position');
        Route::post('/position/add',[PositionController::class, 'add'])->name('position.add');
        Route::post('/position/datatables',[PositionController::class, 'datatables'])->name('position.datatables');//JSON Request
        Route::post('/position/store', [PositionController::class, 'store'])->name('position.store');
        Route::post('/position/edit', [PositionController::class, 'edit'])->name('position.edit');
        Route::patch('/position/update', [PositionController::class, 'update'])->name('position.update');
        Route::post('/position/delete', [PositionController::class, 'delete'])->name('position.delete');
        Route::patch('/position/destroy', [PositionController::class, 'destroy'])->name('position.destroy');

        //Route Forum
        Route::get('/forum', [ForumController::class, 'index'])->name('forum');
        Route::post('/forum/comment', [ForumController::class, 'comment'])->name('forum.detail');
        Route::post('/forum/content',[ForumController::class, 'content'])->name('forum.content');//JSON Request
        Route::post('/forum/add', [ForumController::class, 'add'])->name('forum.add');
        Route::post('/forum/store', [ForumController::class, 'store'])->name('forum.store');
        Route::post('/forum/store-comment', [ForumController::class, 'store_comment'])->name('forum.store-comment');
        Route::post('/forum/edit', [ForumController::class, 'edit'])->name('forum.edit');
        Route::patch('/forum/update', [ForumController::class, 'update'])->name('forum.update');
        Route::post('/forum/delete', [ForumController::class, 'delete'])->name('forum.delete');
        Route::patch('/forum/destroy', [ForumController::class, 'destroy'])->name('forum.destroy');
        Route::post('/forum/comment', [ForumController::class, 'comment'])->name('forum.comment');
        Route::post('/forum/close-thread', [ForumController::class, 'close_thread'])->name('forum.close-thread');

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

        //Route Knowledge Base
        Route::get('/knowledge-base', [KnowledgeBaseController::class, 'index'])->name('knowledge-base');
        Route::post('/knowledge-base/datatables',[KnowledgeBaseController::class, 'datatables'])->name('knowledge-base.datatables');//JSON Request
        Route::post('/knowledge-base/detail',[KnowledgeBaseController::class, 'detail'])->name('knowledge-base.detail');
        Route::post('/knowledge-base/add', [KnowledgeBaseController::class, 'add'])->name('knowledge-base.add');
        Route::post('/knowledge-base/store', [KnowledgeBaseController::class, 'store'])->name('knowledge-base.store');
        Route::post('/knowledge-base/store-forum', [KnowledgeBaseController::class, 'store_forum'])->name('knowledge-base.store-forum');
        Route::post('/knowledge-base/edit', [KnowledgeBaseController::class, 'edit'])->name('knowledge-base.edit');
        Route::patch('/knowledge-base/update', [KnowledgeBaseController::class, 'update'])->name('knowledge-base.update');
        Route::post('/knowledge-base/delete', [KnowledgeBaseController::class, 'delete'])->name('knowledge-base.delete');
        Route::patch('/knowledge-base/destroy', [KnowledgeBaseController::class, 'destroy'])->name('knowledge-base.destroy');

        //Route Knowledge Document
        Route::get('/knowledge-document', [KnowledgeDocumentController::class, 'index'])->name('knowledge-document');
        Route::post('/knowledge-document/datatables',[KnowledgeDocumentController::class, 'datatables'])->name('knowledge-document.datatables');//JSON Request
        Route::post('/knowledge-document/detail',[KnowledgeDocumentController::class, 'detail'])->name('knowledge-document.detail');
        Route::post('/knowledge-document/add', [KnowledgeDocumentController::class, 'add'])->name('knowledge-document.add');
        Route::post('/knowledge-document/store', [KnowledgeDocumentController::class, 'store'])->name('knowledge-document.store');
        Route::post('/knowledge-document/store-forum', [KnowledgeDocumentController::class, 'store_forum'])->name('knowledge-document.store-forum');
        Route::post('/knowledge-document/edit', [KnowledgeDocumentController::class, 'edit'])->name('knowledge-document.edit');
        Route::patch('/knowledge-document/update', [KnowledgeDocumentController::class, 'update'])->name('knowledge-document.update');
        Route::post('/knowledge-document/delete', [KnowledgeDocumentController::class, 'delete'])->name('knowledge-document.delete');
        Route::patch('/knowledge-document/destroy', [KnowledgeDocumentController::class, 'destroy'])->name('knowledge-document.destroy');
        Route::post('/knowledge-document/upload', [KnowledgeDocumentController::class, 'upload'])->name('knowledge-document.upload');
        Route::post('/knowledge-document/check-document', [KnowledgeDocumentController::class, 'check_document'])->name('knowledge-document.check-document');

        //Route Chat
        Route::get('/chat', [ChatController::class, 'index'])->name('chat');
        Route::post('/chat/recent-chat',[ChatController::class, 'recent_chat'])->name('chat.recent-chat');//JSON Request
        Route::post('/chat/direct-chat', [ChatController::class, 'direct_chat'])->name('chat.direct-chat');
        Route::post('/chat/store', [ChatController::class, 'store'])->name('chat.store');
    });
});