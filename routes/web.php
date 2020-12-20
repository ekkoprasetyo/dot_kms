<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PositionLevelController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DirectorateController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\KbaseController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\TrainTypeController;
use App\Http\Controllers\TopItemChecksheetController;
use App\Http\Controllers\MidItemChecksheetController;
use App\Http\Controllers\LowItemChecksheetController;
use App\Http\Controllers\MaintenanceTypeController;
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

//    // Route Need Permission
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
        
        //Route Position
        Route::get('/position', [PositionController::class, 'index'])->name('position');
        Route::post('/position/datatables',[PositionController::class, 'datatables'])->name('position.datatables');//JSON Request
        Route::post('/position/store', [PositionController::class, 'store'])->name('position.store');
        Route::post('/position/edit', [PositionController::class, 'edit'])->name('position.edit');
        Route::patch('/position/update', [PositionController::class, 'update'])->name('position.update');
        Route::post('/position/delete', [PositionController::class, 'delete'])->name('position.delete');
        Route::patch('/position/destroy', [PositionController::class, 'destroy'])->name('position.destroy');

        //Route Position Level
        Route::get('/position-level', [PositionLevelController::class, 'index'])->name('position-level');
        Route::post('/position-level/datatables',[PositionLevelController::class, 'datatables'])->name('position-level.datatables');//JSON Request
        Route::post('/position-level/add', [PositionLevelController::class, 'add'])->name('position-level.add');
        Route::post('/position-level/store', [PositionLevelController::class, 'store'])->name('position-level.store');
        Route::post('/position-level/edit', [PositionLevelController::class, 'edit'])->name('position-level.edit');
        Route::patch('/position-level/update', [PositionLevelController::class, 'update'])->name('position-level.update');
        Route::post('/position-level/delete', [PositionLevelController::class, 'delete'])->name('position-level.delete');
        Route::patch('/position-level/destroy', [PositionLevelController::class, 'destroy'])->name('position-level.destroy');

        //Route Position
        Route::get('/position', [PositionController::class, 'index'])->name('position');
        Route::post('/position/datatables',[PositionController::class, 'datatables'])->name('position.datatables');//JSON Request
        Route::post('/position/add', [PositionController::class, 'add'])->name('position.add');
        Route::post('/position/store', [PositionController::class, 'store'])->name('position.store');
        Route::post('/position/edit', [PositionController::class, 'edit'])->name('position.edit');
        Route::patch('/position/update', [PositionController::class, 'update'])->name('position.update');
        Route::post('/position/delete', [PositionController::class, 'delete'])->name('position.delete');
        Route::patch('/position/destroy', [PositionController::class, 'destroy'])->name('position.destroy');

        //Route Directorate
        Route::get('/directorate', [DirectorateController::class, 'index'])->name('directorate');
        Route::post('/directorate/datatables',[DirectorateController::class, 'datatables'])->name('directorate.datatables');//JSON Request
        Route::post('/directorate/add', [DirectorateController::class, 'add'])->name('directorate.add');
        Route::post('/directorate/store', [DirectorateController::class, 'store'])->name('directorate.store');
        Route::post('/directorate/edit', [DirectorateController::class, 'edit'])->name('directorate.edit');
        Route::patch('/directorate/update', [DirectorateController::class, 'update'])->name('directorate.update');
        Route::post('/directorate/delete', [DirectorateController::class, 'delete'])->name('directorate.delete');
        Route::patch('/directorate/destroy', [DirectorateController::class, 'destroy'])->name('directorate.destroy');

        //Route Area
        Route::get('/area', [AreaController::class, 'index'])->name('area');
        Route::post('/area/datatables',[AreaController::class, 'datatables'])->name('area.datatables');//JSON Request
        Route::post('/area/add', [AreaController::class, 'add'])->name('area.add');
        Route::post('/area/store', [AreaController::class, 'store'])->name('area.store');
        Route::post('/area/edit', [AreaController::class, 'edit'])->name('area.edit');
        Route::patch('/area/update', [AreaController::class, 'update'])->name('area.update');
        Route::post('/area/delete', [AreaController::class, 'delete'])->name('area.delete');
        Route::patch('/area/destroy', [AreaController::class, 'destroy'])->name('area.destroy');

        //Route Unit
        Route::get('/unit', [UnitController::class, 'index'])->name('unit');
        Route::post('/unit/datatables',[UnitController::class, 'datatables'])->name('unit.datatables');//JSON Request
        Route::post('/unit/add', [UnitController::class, 'add'])->name('unit.add');
        Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
        Route::post('/unit/edit', [UnitController::class, 'edit'])->name('unit.edit');
        Route::patch('/unit/update', [UnitController::class, 'update'])->name('unit.update');
        Route::post('/unit/delete', [UnitController::class, 'delete'])->name('unit.delete');
        Route::patch('/unit/destroy', [UnitController::class, 'destroy'])->name('unit.destroy');

        //Route Maintenance Type
        Route::get('/maintenance-type', [MaintenanceTypeController::class, 'index'])->name('maintenance-type');
        Route::post('/maintenance-type/datatables',[MaintenanceTypeController::class, 'datatables'])->name('maintenance-type.datatables');//JSON Request
        Route::post('/maintenance-type/add', [MaintenanceTypeController::class, 'add'])->name('maintenance-type.add');
        Route::post('/maintenance-type/store', [MaintenanceTypeController::class, 'store'])->name('maintenance-type.store');
        Route::post('/maintenance-type/edit', [MaintenanceTypeController::class, 'edit'])->name('maintenance-type.edit');
        Route::patch('/maintenance-type/update', [MaintenanceTypeController::class, 'update'])->name('maintenance-type.update');
        Route::post('/maintenance-type/delete', [MaintenanceTypeController::class, 'delete'])->name('maintenance-type.delete');
        Route::patch('/maintenance-type/destroy', [MaintenanceTypeController::class, 'destroy'])->name('maintenance-type.destroy');

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

        //Route Train Type
        Route::get('/forum-type', [TrainTypeController::class, 'index'])->name('forum-type');
        Route::post('/forum-type/datatables',[TrainTypeController::class, 'datatables'])->name('forum-type.datatables');//JSON Request
        Route::post('/forum-type/add', [TrainTypeController::class, 'add'])->name('forum-type.add');
        Route::post('/forum-type/store', [TrainTypeController::class, 'store'])->name('forum-type.store');
        Route::post('/forum-type/edit', [TrainTypeController::class, 'edit'])->name('forum-type.edit');
        Route::patch('/forum-type/update', [TrainTypeController::class, 'update'])->name('forum-type.update');
        Route::post('/forum-type/delete', [TrainTypeController::class, 'delete'])->name('forum-type.delete');
        Route::patch('/forum-type/destroy', [TrainTypeController::class, 'destroy'])->name('forum-type.destroy');

        //Route Kbase
        Route::get('/kbase', [KbaseController::class, 'index'])->name('kbase');
        Route::post('/kbase/datatables',[KbaseController::class, 'datatables'])->name('kbase.datatables');//JSON Request
        Route::post('/kbase/add', [KbaseController::class, 'add'])->name('kbase.add');
        Route::post('/kbase/store', [KbaseController::class, 'store'])->name('kbase.store');
        Route::post('/kbase/edit', [KbaseController::class, 'edit'])->name('kbase.edit');
        Route::patch('/kbase/update', [KbaseController::class, 'update'])->name('kbase.update');
        Route::post('/kbase/delete', [KbaseController::class, 'delete'])->name('kbase.delete');
        Route::patch('/kbase/destroy', [KbaseController::class, 'destroy'])->name('kbase.destroy');

        //Route Top Item Checksheet
        Route::get('/top-item-checksheet', [TopItemChecksheetController::class, 'index'])->name('top-item-checksheet');
        Route::post('/top-item-checksheet/datatables',[TopItemChecksheetController::class, 'datatables'])->name('top-item-checksheet.datatables');//JSON Request
        Route::post('/top-item-checksheet/add', [TopItemChecksheetController::class, 'add'])->name('top-item-checksheet.add');
        Route::post('/top-item-checksheet/store', [TopItemChecksheetController::class, 'store'])->name('top-item-checksheet.store');
        Route::post('/top-item-checksheet/edit', [TopItemChecksheetController::class, 'edit'])->name('top-item-checksheet.edit');
        Route::patch('/top-item-checksheet/update', [TopItemChecksheetController::class, 'update'])->name('top-item-checksheet.update');
        Route::post('/top-item-checksheet/delete', [TopItemChecksheetController::class, 'delete'])->name('top-item-checksheet.delete');
        Route::patch('/top-item-checksheet/destroy', [TopItemChecksheetController::class, 'destroy'])->name('top-item-checksheet.destroy');

        //Route Mid Item Checksheet
        Route::get('/mid-item-checksheet', [MidItemChecksheetController::class, 'index'])->name('mid-item-checksheet');
        Route::post('/mid-item-checksheet/datatables',[MidItemChecksheetController::class, 'datatables'])->name('mid-item-checksheet.datatables');//JSON Request
        Route::post('/mid-item-checksheet/add', [MidItemChecksheetController::class, 'add'])->name('mid-item-checksheet.add');
        Route::post('/mid-item-checksheet/store', [MidItemChecksheetController::class, 'store'])->name('mid-item-checksheet.store');
        Route::post('/mid-item-checksheet/edit', [MidItemChecksheetController::class, 'edit'])->name('mid-item-checksheet.edit');
        Route::patch('/mid-item-checksheet/update', [MidItemChecksheetController::class, 'update'])->name('mid-item-checksheet.update');
        Route::post('/mid-item-checksheet/delete', [MidItemChecksheetController::class, 'delete'])->name('mid-item-checksheet.delete');
        Route::patch('/mid-item-checksheet/destroy', [MidItemChecksheetController::class, 'destroy'])->name('mid-item-checksheet.destroy');

        //Route Low Item Checksheet
        Route::get('/low-item-checksheet', [LowItemChecksheetController::class, 'index'])->name('low-item-checksheet');
        Route::post('/low-item-checksheet/datatables',[LowItemChecksheetController::class, 'datatables'])->name('low-item-checksheet.datatables');//JSON Request
        Route::post('/low-item-checksheet/add', [LowItemChecksheetController::class, 'add'])->name('low-item-checksheet.add');
        Route::post('/low-item-checksheet/store', [LowItemChecksheetController::class, 'store'])->name('low-item-checksheet.store');
        Route::post('/low-item-checksheet/edit', [LowItemChecksheetController::class, 'edit'])->name('low-item-checksheet.edit');
        Route::patch('/low-item-checksheet/update', [LowItemChecksheetController::class, 'update'])->name('low-item-checksheet.update');
        Route::post('/low-item-checksheet/delete', [LowItemChecksheetController::class, 'delete'])->name('low-item-checksheet.delete');
        Route::patch('/low-item-checksheet/destroy', [LowItemChecksheetController::class, 'destroy'])->name('low-item-checksheet.destroy');
        
    });
});