<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchRequest;
use App\Model\BranchModel;
use DataTables;
use DB;
use Illuminate\Http\Request;
use App\Helpers\UserAuthorization;

class BranchController extends Controller
{
    private $title;
    private $subtitle;

    public function __construct() {
        $this->title = "Branch";
        $this->subtitle = "";
    }

    public function index(){
        $title = $this->title;
        $subtitle = $this->subtitle;

        return view('branch.v_index', compact('title','subtitle'));
    }

    public function datatables(){
        $branch = BranchModel::datatables();

        return DataTables::of($branch)
            ->addColumn('action', function($branch) {
                return view('branch.datatables.v_action', ['branch' => $branch]);
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function add(){

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Add Branch',
            'data' => view('branch.v_add_js')->render()]);
    }

    public function store(BranchRequest $request){
        DB::beginTransaction();

        try {
            $branch = new BranchModel([
                'c_branch_code' => strtoupper($request->txt_branch_code),
                'c_branch_name' => $request->txt_branch_name,
                'c_branch_update_by' => UserAuthorization::getUserID(),
                'c_branch_update_time' => date('Y-m-d H:i:s'),
                'c_branch_softdelete' => 0,
            ]);
            $branch->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data '.$request->txt_branch_name.' has been added ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function edit(Request $request){
        $branch = BranchModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Edit Branch '.$branch->c_branch_name,
            'data' => view('branch.v_edit_js', compact('branch'))->render()]);
    }

    public function update(BranchRequest $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $branch = BranchModel::find($request->txt_branch_id);
            $branch->c_branch_code = strtoupper($request->txt_branch_code);
            $branch->c_branch_name = $request->txt_branch_name;
            $branch->c_branch_update_by = UserAuthorization::getUserID();
            $branch->c_branch_update_time = date('Y-m-d H:i:s');
            $branch->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Branch '.$request->txt_branch_name.' has been updated ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function delete(Request $request){
        $branch = BranchModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Delete Branch '.$branch->c_branch_name,
            'data' => view('branch.v_delete_js', compact('branch'))->render()]);
    }

    public function destroy(Request $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $branch = BranchModel::find($request->txt_branch_id);
            $branch->c_branch_softdelete = 1;
            $branch->c_branch_update_by = UserAuthorization::getUserID();
            $branch->c_branch_update_time = date('Y-m-d H:i:s');
            $branch->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Branch '.$branch->c_branch_name.' has been deleted ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }
}