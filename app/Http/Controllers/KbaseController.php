<?php

namespace App\Http\Controllers;

use App\Model\TrainModel;
use UserAuth;
use App\Http\Requests\KbaseRequest;
use App\Model\KbaseModel;
use DataTables;
use DB;
use Illuminate\Http\Request;

class KbaseController extends Controller
{
    private $title;
    private $subtitle;

    public function __construct() {
        $this->title = "Knowledge Base";
        $this->subtitle = "";
    }

    public function index(){
        $title = $this->title;
        $subtitle = $this->subtitle;

        return view('kbase.v_index', compact('title','subtitle'));
    }

    public function datatables(){
        $kbase = KbaseModel::datatables();

        return DataTables::of($kbase)
            ->addColumn('action', function($kbase) {
                return view('kbase.datatables.v_action', ['kbase' => $kbase]);
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function add(){
        $trains = TrainModel::dropdown();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Add Kbase',
            'data' => view('kbase.v_add_js', compact('trains'))->render()]);
    }

    public function store(KbaseRequest $request){
        DB::beginTransaction();

        try {
            $kbase = new KbaseModel([
                'c_kbase_code' => strtoupper($request->txt_kbase_code),
                'c_kbase_name' => $request->txt_kbase_name,
                'c_kbase_member' => serialize($request->txt_kbase_member),
                'c_kbase_update_by' => UserAuth::getUserID(),
                'c_kbase_update_time' => date('Y-m-d H:i:s'),
                'c_kbase_softdelete' => 0,
            ]);
            $kbase->save();
            foreach ($request->txt_kbase_member as $trains) {
                $train = TrainModel::find($trains);
                $train->c_train_kbase = $kbase->c_kbase_id;
                $train->save();
            }

            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data '.$request->txt_kbase_name.' has been added ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function edit(Request $request){
        $kbase = KbaseModel::findOrFail($request->id);
        $kbase->c_kbase_member != NULL ? $kbase_member = unserialize($kbase->c_kbase_member) : $kbase_member = [];
        $trains = TrainModel::dropdown();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Edit Kbase '.$kbase->c_kbase_name,
            'data' => view('kbase.v_edit_js', compact('kbase','trains','kbase_member'))->render()]);
    }

    public function update(KbaseRequest $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $kbase = KbaseModel::find($request->txt_kbase_id);
            $kbase->c_kbase_code = strtoupper($request->txt_kbase_code);
            $kbase->c_kbase_name = $request->txt_kbase_name;
            $kbase->c_kbase_member = serialize($request->txt_kbase_member);
            $kbase->c_kbase_update_by = UserAuth::getUserID();
            $kbase->c_kbase_update_time = date('Y-m-d H:i:s');
            $kbase->save();

            //remove old kbase to forum
            TrainModel::where('c_train_kbase',$request->txt_kbase_id)->update(['c_train_kbase' => NULL]);

            //add new kbase to forum
            foreach ($request->txt_kbase_member as $trains) {
                $train = TrainModel::find($trains);
                $train->c_train_kbase = $kbase->c_kbase_id;
                $train->save();
            }
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Kbase '.$request->txt_kbase_name.' has been updated ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function delete(Request $request){
        $kbase = KbaseModel::find($request->id);
        $kbase_member = unserialize($kbase->c_kbase_member);
        $trains = TrainModel::dropdown();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Delete Kbase '.$kbase->c_kbase_name,
            'data' => view('kbase.v_delete_js', compact('kbase','trains','kbase_member'))->render()]);
    }

    public function destroy(Request $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $kbase = KbaseModel::find($request->txt_kbase_id);
            $kbase->c_kbase_member = NULL;
            $kbase->c_kbase_softdelete = 1;
            $kbase->c_kbase_update_by = UserAuth::getUserID();
            $kbase->c_kbase_update_time = date('Y-m-d H:i:s');
            $kbase->save();
            //remove old kbase to forum
            TrainModel::where('c_train_kbase',$request->txt_kbase_id)->update(['c_train_kbase' => NULL]);
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Kbase '.$kbase->c_kbase_name.' has been deleted ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }
}