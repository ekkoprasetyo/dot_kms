<?php

namespace App\Http\Controllers;

use UserAuth;
use App\Http\Requests\ForumRequest;
use App\Model\ForumModel;
use DataTables;
use DB;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    private $title;
    private $subtitle;

    public function __construct() {
        $this->title = "Forum";
        $this->subtitle = "";
    }

    public function index(){
        $title = $this->title;
        $subtitle = $this->subtitle;

        return view('forum.v_index', compact('title','subtitle'));
    }

    public function datatables(){
        $forum = ForumModel::datatables();

        return DataTables::of($forum)
            ->addColumn('action', function($forum) {
                return view('forum.datatables.v_action', ['forum' => $forum]);
            })
            ->editColumn('c_forumset_code', function($forum) {
                return !empty($forum->c_forumset_code) ? $forum->c_forumset_code : 'Not Member';
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function add(){
        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Add Forum',
            'data' => view('forum.v_add_js')->render()]);
    }

    public function comment(){
        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Comments',
            'data' => view('forum.v_comment_js')->render()]);
    }

    public function store(ForumRequest $request){
        DB::beginTransaction();

        try {
            $forum = new ForumModel([
                'c_forum_number' => strtoupper($request->txt_forum_number),
                'c_forum_name' => $request->txt_forum_name,
                'c_forum_update_by' => UserAuth::getUserID(),
                'c_forum_update_time' => date('Y-m-d H:i:s'),
                'c_forum_softdelete' => 0,
            ]);
            $forum->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data '.$request->txt_forum_name.' has been added ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function edit(Request $request){
        $forum = ForumModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Edit Forum '.$forum->c_forum_name,
            'data' => view('forum.v_edit_js', compact('forum'))->render()]);
    }

    public function update(ForumRequest $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $forum = ForumModel::find($request->txt_forum_id);
            $forum->c_forum_number = strtoupper($request->txt_forum_number);
            $forum->c_forum_name = $request->txt_forum_name;
            $forum->c_forum_update_by = UserAuth::getUserID();
            $forum->c_forum_update_time = date('Y-m-d H:i:s');
            $forum->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Forum '.$request->txt_forum_name.' has been updated ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function delete(Request $request){
        $forum = ForumModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Delete Forum '.$forum->c_forum_name,
            'data' => view('forum.v_delete_js', compact('forum'))->render()]);
    }

    public function destroy(Request $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $forum = ForumModel::find($request->txt_forum_id);
            $forum->c_forum_softdelete = 1;
            $forum->c_forum_update_by = UserAuth::getUserID();
            $forum->c_forum_update_time = date('Y-m-d H:i:s');
            $forum->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Forum '.$forum->c_forum_name.' has been deleted ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }
}