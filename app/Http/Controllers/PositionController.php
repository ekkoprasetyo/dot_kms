<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Model\PositionLevelModel;
use App\Model\PositionModel;
use App\Model\BranchModel;
use DataTables;
use DB;
use Illuminate\Http\Request;
use App\Helpers\UserAuthorization;

class PositionController extends Controller
{
    private $title;
    private $subtitle;

    public function __construct() {
        $this->title = "Position";
        $this->subtitle = "";
    }

    public function index(){
        $title = $this->title;
        $subtitle = $this->subtitle;

        return view('position.v_index', compact('title','subtitle'));
    }

    public function datatables(){
        $position = PositionModel::datatables();

        return DataTables::of($position)
            ->addColumn('action', function($position) {
                return view('position.datatables.v_action', ['position' => $position]);
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function add(){
        $branchs = BranchModel::dropdown();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Add Position',
            'data' => view('position.v_add_js', compact('branchs'))->render()]);
    }

    public function store(PositionRequest $request){
        DB::beginTransaction();

        try {
            $position = new PositionModel([
                'c_position_abbr' => strtoupper($request->txt_position_abbr),
                'c_position_name' => $request->txt_position_name,
                'c_position_branch' => $request->txt_position_branch,
                'c_position_position_level' => $request->txt_position_position_level,
                'c_position_update_by' => UserAuthorization::getUserID(),
                'c_position_update_time' => date('Y-m-d H:i:s'),
                'c_position_softdelete' => 0,
            ]);
            $position->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data '.$request->txt_position_name.' has been added ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function edit(Request $request){
        $position = PositionModel::find($request->id);
        $branchs = BranchModel::dropdown();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Edit Position '.$position->c_position_name,
            'data' => view('position.v_edit_js', compact('position','branchs'))->render()]);
    }

    public function update(PositionRequest $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $position = PositionModel::find($request->txt_position_id);
            $position->c_position_abbr = strtoupper($request->txt_position_abbr);
            $position->c_position_name = $request->txt_position_name;
            $position->c_position_branch = $request->txt_position_branch;
            $position->c_position_update_by = UserAuthorization::getUserID();
            $position->c_position_update_time = date('Y-m-d H:i:s');
            $position->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Position '.$request->txt_position_name.' has been updated ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function delete(Request $request){
        $position = PositionModel::find($request->id);
        $branchs = BranchModel::dropdown();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Delete Position '.$position->c_position_name,
            'data' => view('position.v_delete_js', compact('position','branchs'))->render()]);
    }

    public function destroy(Request $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $position = PositionModel::find($request->txt_position_id);
            $position->c_position_softdelete = 1;
            $position->c_position_update_by = UserAuthorization::getUserID();
            $position->c_position_update_time = date('Y-m-d H:i:s');
            $position->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Position '.$position->c_position_name.' has been deleted ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }
}