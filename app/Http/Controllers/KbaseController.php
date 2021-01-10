<?php

namespace App\Http\Controllers;

use App\Model\ForumModel;
use App\Model\RewardModel;
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

    public function detail(Request $request){
        $kbase = KbaseModel::detailKbase($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Detail Knowlodge Base '.$kbase->c_kbase_title,
            'data' => view('kbase.v_detail_js', compact('kbase'))->render()]);
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
        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Add Kbase',
            'data' => view('kbase.v_add_js')->render()]);
    }

    public function store(KbaseRequest $request){
        DB::beginTransaction();

        try {
            $kbase = new KbaseModel([
                'c_kbase_title' => $request->txt_kbase_title,
                'c_kbase_content' => $request->txt_kbase_content,
                'c_kbase_tags' => $request->txt_kbase_tags,
                'c_kbase_update_by' => UserAuth::getUserID(),
                'c_kbase_update_time' => date('Y-m-d H:i:s'),
                'c_kbase_softdelete' => 0,
            ]);
            $kbase->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data '.$request->txt_kbase_title.' has been added ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function store_forum(Request $request){
        DB::beginTransaction();

        try {
            $kbase = new KbaseModel([
                'c_kbase_title' => $request->txt_kbase_title,
                'c_kbase_content' => $request->txt_kbase_content,
                'c_kbase_tags' => $request->txt_kbase_tags,
                'c_kbase_update_by' => UserAuth::getUserID(),
                'c_kbase_update_time' => date('Y-m-d H:i:s'),
                'c_kbase_softdelete' => 0,
            ]);
            $kbase->save();

            $forum = ForumModel::find($request->txt_forum_id);
            $forum->c_forum_status = 2;
            $forum->save();
            
            $reward = new RewardModel([
                'c_reward_forum' => $request->txt_forum_id,
                'c_reward_receiver' => $request->txt_reward_receiver,
                'c_reward_point' => 1,
                'c_reward_update_by' => UserAuth::getUserID(),
                'c_reward_update_time' => date('Y-m-d H:i:s'),
                'c_reward_softdelete' => 0,
            ]);
            $reward->save();

            DB::commit();

            return redirect()->route('kbase');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('kbase');
        }
    }

    public function edit(Request $request){
        $kbase = KbaseModel::findOrFail($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Edit Kbase '.$kbase->c_kbase_title,
            'data' => view('kbase.v_edit_js', compact('kbase'))->render()]);
    }

    public function update(KbaseRequest $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $kbase = KbaseModel::find($request->txt_kbase_id);
            $kbase->c_kbase_tags = $request->txt_kbase_tags;
            $kbase->c_kbase_title = $request->txt_kbase_title;
            $kbase->c_kbase_content = $request->txt_kbase_content;
            $kbase->c_kbase_update_by = UserAuth::getUserID();
            $kbase->c_kbase_update_time = date('Y-m-d H:i:s');
            $kbase->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Kbase '.$request->txt_kbase_title.' has been updated ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function delete(Request $request){
        $kbase = KbaseModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Delete Kbase '.$kbase->c_kbase_name,
            'data' => view('kbase.v_delete_js', compact('kbase'))->render()]);
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