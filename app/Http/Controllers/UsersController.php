<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Model\PositionModel;
use App\Model\RoleModel;
use App\Model\UsersModel;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use UserAuth;

class UsersController extends Controller
{
    private $title;
    private $subtitle;

    public function __construct() {
        $this->title = "Users Management";
        $this->subtitle = "Users";
    }

    public function index(){
        $title = $this->title;
        $subtitle = $this->subtitle;

        return view('users.v_index', compact('title','subtitle'));
    }

    public function detail(Request $request){
        $user = UsersModel::detailUser($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Detail User '.$user->c_users_fullname,
            'data' => view('users.v_detail_js', compact('user'))->render()]);
    }

    public function datatables(){
        $users = UsersModel::datatables();

        return DataTables::of($users)
            ->addColumn('action', function($users) {
                return view('users.datatables.v_action', ['users' => $users]);
            })
            ->editColumn('c_users_status', function($users) {
                return $users->c_users_status == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-warning">Inactive</span>';
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function add(){
        $positions = PositionModel::dropdown();
        $roles = RoleModel::dropdown();
        $used_position = UsersModel::getUsedPosition();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Add User',
            'data' => view('users.v_add_js', compact('roles','positions','used_position'))->render()]);
    }

    public function store(UsersRequest $request){
        DB::beginTransaction();

        try {
            $user = new UsersModel([
                'c_users_nip' => $request->txt_users_nip,
                'c_users_fullname' => $request->txt_users_fullname,
                'c_users_email' => strtolower($request->txt_users_email),
                'c_users_password' => Hash::make($request->txt_users_password),
                'c_users_position' => $request->txt_users_position,
                'c_users_role' => $request->txt_users_role,
                'c_users_status' => $request->txt_users_status,
                'c_users_update_by' => UserAuth::getUserID(),
                'c_users_update_time' => date('Y-m-d H:i:s'),
                'c_users_softdelete' => 0,
            ]);
            $user->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data '.$request->txt_users_fullname.' has been added ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function edit(Request $request){
        $user = UsersModel::find($request->id);
        $roles = RoleModel::dropdown();
        $positions = PositionModel::dropdown();
        $used_position = UsersModel::getUsedPosition();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Edit User '.$user->c_users_fullname,
            'data' => view('users.v_edit_js', compact('user','roles','positions','used_position'))->render()]);
    }

    public function update(UsersRequest $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $users = UsersModel::find($request->txt_users_id);
            $users->c_users_nip = strtolower($request->txt_users_nip);
            $users->c_users_fullname = $request->txt_users_fullname;
            $users->c_users_email = strtolower($request->txt_users_email);
            $users->c_users_position = $request->txt_users_position;
            $users->c_users_role = $request->txt_users_role;
            $users->c_users_status = $request->txt_users_status;
            $users->c_users_update_by = UserAuth::getUserID();
            $users->c_users_update_time = date('Y-m-d H:i:s');
            $users->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data User '.$request->txt_users_fullname.' has been updated ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function edit_password(Request $request){
        $user = UsersModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Change User Password '.$user->c_users_fullname,
            'data' => view('users.v_edit_password_js', compact('user'))->render()]);
    }

    public function update_password(UsersRequest $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $users = UsersModel::find($request->txt_users_id);
            $users->c_users_password = Hash::make($request->txt_users_password);
            $users->c_users_update_by = UserAuth::getUserID();
            $users->c_users_update_time = date('Y-m-d H:i:s');
            $users->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data User Password '.$users->c_users_fullname.' has been updated ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function delete(Request $request){
        $user = UsersModel::find($request->id);
        $roles = RoleModel::dropdown();
        $positions = PositionModel::dropdown();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Delete User '.$user->c_users_fullname,
            'data' => view('users.v_delete_js', compact('user','roles','positions'))->render()]);
    }

    public function destroy(Request $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $users = UsersModel::find($request->txt_users_id);
            $users->c_users_position = NULL;
            $users->c_users_status = 0;
            $users->c_users_softdelete = 1;
            $users->c_users_update_by = UserAuth::getUserID();
            $users->c_users_update_time = date('Y-m-d H:i:s');
            $users->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data User '.$users->c_users_fullname.' has been deleted ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }
}