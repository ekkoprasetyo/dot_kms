<?php

namespace App\Http\Controllers;

use UserAuth;
use App\Http\Requests\RewardRequest;
use App\Model\RewardModel;
use DataTables;
use DB;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    private $title;
    private $subtitle;

    public function __construct() {
        $this->title = "Reward";
        $this->subtitle = "";
    }

    public function index(){
        $title = $this->title;
        $subtitle = $this->subtitle;

        return view('reward.v_index', compact('title','subtitle'));
    }

    public function comment(){
        $title = $this->title;
        $subtitle = "Comment";

        return view('reward.v_comment', compact('title','subtitle'));
    }

    public function datatables(){
        $reward = RewardModel::datatables();

        return DataTables::of($reward)
            ->addColumn('action', function($reward) {
                return view('reward.datatables.v_action', ['reward' => $reward]);
            })
            ->editColumn('c_rewardset_code', function($reward) {
                return !empty($reward->c_rewardset_code) ? $reward->c_rewardset_code : 'Not Member';
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function add(){
        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Add Reward',
            'data' => view('reward.v_add_js')->render()]);
    }

    public function store(RewardRequest $request){
        DB::beginTransaction();

        try {
            $reward = new RewardModel([
                'c_reward_number' => strtoupper($request->txt_reward_number),
                'c_reward_name' => $request->txt_reward_name,
                'c_reward_update_by' => UserAuth::getUserID(),
                'c_reward_update_time' => date('Y-m-d H:i:s'),
                'c_reward_softdelete' => 0,
            ]);
            $reward->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data '.$request->txt_reward_name.' has been added ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function edit(Request $request){
        $reward = RewardModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Edit Reward '.$reward->c_reward_name,
            'data' => view('reward.v_edit_js', compact('reward'))->render()]);
    }

    public function update(RewardRequest $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $reward = RewardModel::find($request->txt_reward_id);
            $reward->c_reward_number = strtoupper($request->txt_reward_number);
            $reward->c_reward_name = $request->txt_reward_name;
            $reward->c_reward_update_by = UserAuth::getUserID();
            $reward->c_reward_update_time = date('Y-m-d H:i:s');
            $reward->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Reward '.$request->txt_reward_name.' has been updated ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function delete(Request $request){
        $reward = RewardModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Delete Reward '.$reward->c_reward_name,
            'data' => view('reward.v_delete_js', compact('reward'))->render()]);
    }

    public function destroy(Request $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $reward = RewardModel::find($request->txt_reward_id);
            $reward->c_reward_softdelete = 1;
            $reward->c_reward_update_by = UserAuth::getUserID();
            $reward->c_reward_update_time = date('Y-m-d H:i:s');
            $reward->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Reward '.$reward->c_reward_name.' has been deleted ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }
}