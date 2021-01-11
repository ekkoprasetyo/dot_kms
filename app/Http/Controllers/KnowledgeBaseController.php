<?php

namespace App\Http\Controllers;

use App\Model\ForumModel;
use App\Model\RewardModel;
use UserAuth;
use App\Http\Requests\KnowledgeBaseRequest;
use App\Model\KnowledgeBaseModel;
use DataTables;
use DB;
use Illuminate\Http\Request;

class KnowledgeBaseController extends Controller
{
    private $title;
    private $subtitle;

    public function __construct() {
        $this->title = "Knowledge";
        $this->subtitle = "Base";
    }

    public function index(){
        $title = $this->title;
        $subtitle = $this->subtitle;

        return view('knowledge_base.v_index', compact('title','subtitle'));
    }

    public function detail(Request $request){
        $knowledge_base = KnowledgeBaseModel::detailKnowledgeBase($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Detail Knowlodge Base '.$knowledge_base->c_knowledge_base_title,
            'data' => view('knowledge_base.v_detail_js', compact('knowledge_base'))->render()]);
    }

    public function datatables(){
        $knowledge_base = KnowledgeBaseModel::datatables();

        return DataTables::of($knowledge_base)
            ->addColumn('action', function($knowledge_base) {
                return view('knowledge_base.datatables.v_action', ['knowledge_base' => $knowledge_base]);
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function add(){
        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Add Knowledge Base',
            'data' => view('knowledge_base.v_add_js')->render()]);
    }

    public function store(KnowledgeBaseRequest $request){
        DB::beginTransaction();

        try {
            $knowledge_base = new KnowledgeBaseModel([
                'c_knowledge_base_title' => $request->txt_knowledge_base_title,
                'c_knowledge_base_content' => $request->txt_knowledge_base_content,
                'c_knowledge_base_tags' => $request->txt_knowledge_base_tags,
                'c_knowledge_base_update_by' => UserAuth::getUserID(),
                'c_knowledge_base_update_time' => date('Y-m-d H:i:s'),
                'c_knowledge_base_softdelete' => 0,
            ]);
            $knowledge_base->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data '.$request->txt_knowledge_base_title.' has been added ..']);
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
            $knowledge_base = new KnowledgeBaseModel([
                'c_knowledge_base_title' => $request->txt_knowledge_base_title,
                'c_knowledge_base_content' => $request->txt_knowledge_base_content,
                'c_knowledge_base_tags' => $request->txt_knowledge_base_tags,
                'c_knowledge_base_update_by' => UserAuth::getUserID(),
                'c_knowledge_base_update_time' => date('Y-m-d H:i:s'),
                'c_knowledge_base_softdelete' => 0,
            ]);
            $knowledge_base->save();

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

            return redirect()->route('knowledge-base');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('knowledge-base');
        }
    }

    public function edit(Request $request){
        $knowledge_base = KnowledgeBaseModel::findOrFail($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Edit Knowledge Base '.$knowledge_base->c_knowledge_base_title,
            'data' => view('knowledge_base.v_edit_js', compact('knowledge_base'))->render()]);
    }

    public function update(KnowledgeBaseRequest $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $knowledge_base = KnowledgeBaseModel::find($request->txt_knowledge_base_id);
            $knowledge_base->c_knowledge_base_tags = $request->txt_knowledge_base_tags;
            $knowledge_base->c_knowledge_base_title = $request->txt_knowledge_base_title;
            $knowledge_base->c_knowledge_base_content = $request->txt_knowledge_base_content;
            $knowledge_base->c_knowledge_base_update_by = UserAuth::getUserID();
            $knowledge_base->c_knowledge_base_update_time = date('Y-m-d H:i:s');
            $knowledge_base->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Knowledge Base '.$request->txt_knowledge_base_title.' has been updated ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function delete(Request $request){
        $knowledge_base = KnowledgeBaseModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Delete Knowledge Base '.$knowledge_base->c_knowledge_base_name,
            'data' => view('knowledge_base.v_delete_js', compact('knowledge_base'))->render()]);
    }

    public function destroy(Request $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $knowledge_base = KnowledgeBaseModel::find($request->txt_knowledge_base_id);
            $knowledge_base->delete();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Knowledge Base '.$knowledge_base->c_knowledge_base_title.' has been deleted ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }
}