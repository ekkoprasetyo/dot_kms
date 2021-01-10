<?php

namespace App\Http\Controllers;

use App\Model\CommentModel;
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
        $forums_open = ForumModel::open();
        $forums_close = ForumModel::close();
        $title = $this->title;
        $subtitle = $this->subtitle;

        return view('forum.v_index', compact('title','subtitle'));
    }

    public function content(){
        $forums_open = ForumModel::open();
        $forums_close = ForumModel::close();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Content ',
            'data' => view('forum.v_content_js', compact('forums_close','forums_open'))->render()]);
    }

    public function add(){
        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Add Forum',
            'data' => view('forum.v_add_js')->render()]);
    }

    public function comment(Request $request){
        $thread = ForumModel::detail($request->forum_id);
        $comments = CommentModel::where('c_comment_forum', $request->forum_id)
            ->leftJoin('t_kms_users', 't_kms_comment.c_comment_update_by', '=', 't_kms_users.c_users_id' )
            ->orderBy('c_comment_update_time', 'DESC')
            ->get();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Comments '.$thread->c_forum_issue,
            'data' => view('forum.v_comment_js', compact('thread','comments'))->render()]);
    }

    public function close_thread(Request $request){
        $thread = ForumModel::detail($request->forum_id);
        $comments = CommentModel::where('c_comment_forum', $request->forum_id)
            ->leftJoin('t_kms_users', 't_kms_comment.c_comment_update_by', '=', 't_kms_users.c_users_id' )
            ->orderBy('c_comment_update_time', 'DESC')
            ->get();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Close Thread '.$thread->c_forum_issue,
            'data' => view('forum.v_close_thread_js', compact('thread','comments'))->render()]);
    }

    public function store(ForumRequest $request){
        DB::beginTransaction();

        try {
            $forum = new ForumModel([
                'c_forum_issue' => $request->txt_forum_issue,
                'c_forum_tags' => $request->txt_forum_tags,
                'c_forum_status' => 1,
                'c_forum_update_by' => UserAuth::getUserID(),
                'c_forum_update_time' => date('Y-m-d H:i:s'),
                'c_forum_softdelete' => 0,
            ]);
            $forum->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data '.$request->txt_forum_issue.' has been added ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function store_comment(Request $request){
        DB::beginTransaction();

        try {
            $comment = new CommentModel([
                'c_comment_forum' => $request->txt_forum_id,
                'c_comment_comment' => $request->txt_comment,
                'c_comment_update_by' => UserAuth::getUserID(),
                'c_comment_update_time' => date('Y-m-d H:i:s'),
            ]);
            $comment->save();
            DB::commit();

            return redirect()->route('forum');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('forum');
        }
    }

    public function edit(Request $request){
        $forum = ForumModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Edit Forum '.$forum->c_forum_issue,
            'data' => view('forum.v_edit_js', compact('forum'))->render()]);
    }

    public function update(ForumRequest $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $forum = ForumModel::find($request->txt_forum_id);
            $forum->c_forum_issue = $request->txt_forum_issue;
            $forum->c_forum_tags = $request->txt_forum_tags;
            $forum->c_forum_update_by = UserAuth::getUserID();
            $forum->c_forum_update_time = date('Y-m-d H:i:s');
            $forum->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Forum '.$request->txt_forum_issue.' has been updated ..']);
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
            'message' => 'Delete Forum '.$forum->c_forum_issue,
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
                'message' => 'Data Forum '.$forum->c_forum_issue.' has been deleted ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }
}