<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRequest;
use App\Model\ChatModel;
use App\Model\UsersModel;
use DataTables;
use DB;
use Illuminate\Http\Request;
use App\Helpers\UserAuthorization;

class ChatController extends Controller
{
    private $title;
    private $subtitle;

    public function __construct() {
        $this->title = "Chat";
        $this->subtitle = "";
    }

    public function index(){
        $title = $this->title;
        $subtitle = $this->subtitle;
        //dropdown
        $users = UsersModel::where('c_users_softdelete', 0)
            ->where('c_users_status',1)
            ->whereNotIn('c_users_id', [UserAuthorization::getUserID()])
            ->get();

        return view('chat.v_index', compact('title','subtitle','users'));
    }

    public function recent_chat(){
        $chats = ChatModel::recentChat();

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Recent Chat',
            'data' => view('chat.v_recent_chat_js',compact('chats'))->render()]);
    }

    public function direct_chat(Request $request){
        $to = $request->to;
        $direct_chat = ChatModel::directChat($to);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Direct Chat',
            'data' => view('chat.v_direct_chat_js',compact('direct_chat','to'))->render()]);
    }

    public function add(){

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Add Chat',
            'data' => view('chat.v_add_js')->render()]);
    }

    public function store(Request $request){
        DB::beginTransaction();

        try {
            $chat = new ChatModel([
                'c_chat_from' => UserAuthorization::getUserID(),
                'c_chat_to' => $request->txt_chat_to,
                'c_chat_chat' => $request->txt_chat_chat,
                'c_chat_datetime' => date('Y-m-d H:i:s'),
            ]);
            $chat->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'to' => $request->txt_chat_to,
                'message' => 'Data '.$request->txt_chat_name.' has been added ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function edit(Request $request){
        $chat = ChatModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Edit Chat '.$chat->c_chat_name,
            'data' => view('chat.v_edit_js', compact('chat'))->render()]);
    }

    public function update(ChatRequest $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $chat = ChatModel::find($request->txt_chat_id);
            $chat->c_chat_code = strtoupper($request->txt_chat_code);
            $chat->c_chat_name = $request->txt_chat_name;
            $chat->c_chat_update_by = UserAuthorization::getUserID();
            $chat->c_chat_update_time = date('Y-m-d H:i:s');
            $chat->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Chat '.$request->txt_chat_name.' has been updated ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function delete(Request $request){
        $chat = ChatModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Delete Chat '.$chat->c_chat_name,
            'data' => view('chat.v_delete_js', compact('chat'))->render()]);
    }

    public function destroy(Request $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $chat = ChatModel::find($request->txt_chat_id);
            $chat->c_chat_softdelete = 1;
            $chat->c_chat_update_by = UserAuthorization::getUserID();
            $chat->c_chat_update_time = date('Y-m-d H:i:s');
            $chat->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Chat '.$chat->c_chat_name.' has been deleted ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }
}