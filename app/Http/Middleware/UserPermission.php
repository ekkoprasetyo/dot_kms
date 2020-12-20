<?php

namespace App\Http\Middleware;

use App\Model\PermissionModel;
use App\Model\RolePermissionModel;
use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use UserAuth;

class UserPermission
{
    public function handle($request, Closure $next)
    {
        $permission_id = PermissionModel::getID(Route::currentRouteName());
        $user_permissions = RolePermissionModel::getPermission(UserAuth::getUserID());
        $permissions = [];
        if (count($user_permissions) > 0) {
            foreach ($user_permissions as $permission) {
                $permissions[] = $permission->c_permission_id;
            }
        }
        else {
            $permissions[] = NULL;
        }

        if(!(in_array($permission_id->c_permission_id, $permissions)) && $request->ajax() && str_is('*datatables*', Route::currentRouteName()) == FALSE){
            return response()->json(['status' => 'auth',
                'title' => 'Authorization Error',
                'message' => 'You are not authorized to perform this ..']);
        }
        if($request->ajax() && str_is('*datatables*', Route::currentRouteName()) == TRUE){
            return $next($request);
        }
        if (!in_array($permission_id->c_permission_id, $permissions)) {
            \Session::flash('auth_error_notification', 'You are not authorized to perform this ..');
            return redirect()->back();
        }
        return $next($request);
    }
}