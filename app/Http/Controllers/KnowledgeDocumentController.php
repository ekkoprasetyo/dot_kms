<?php

namespace App\Http\Controllers;

use UserAuth;
use App\Http\Requests\KnowledgeDocumentRequest;
use App\Model\KnowledgeDocumentModel;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KnowledgeDocumentController extends Controller
{
    private $title;
    private $subtitle;

    public function __construct() {
        $this->title = "Knowledge";
        $this->subtitle = "Document";
    }

    public function index(){
        $title = $this->title;
        $subtitle = $this->subtitle;

        return view('knowledge_document.v_index', compact('title','subtitle'));
    }

    public function detail(Request $request){
        $knowledge_document = KnowledgeDocumentModel::detailKnowledgeDocument($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Detail Knowlodge Document '.$knowledge_document->c_knowledge_document_title,
            'data' => view('knowledge_document.v_detail_js', compact('knowledge_document'))->render()]);
    }

    public function datatables(){
        $knowledge_document = KnowledgeDocumentModel::datatables();

        return DataTables::of($knowledge_document)
            ->addColumn('action', function($knowledge_document) {
                return view('knowledge_document.datatables.v_action', ['knowledge_document' => $knowledge_document]);
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function add(){
        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Add Knowledge Document',
            'data' => view('knowledge_document.v_add_js')->render()]);
    }

    public function store(KnowledgeDocumentRequest $request){
        DB::beginTransaction();

        try {
            $knowledge_document = new KnowledgeDocumentModel([
                'c_knowledge_document_title' => $request->txt_knowledge_document_title,
                'c_knowledge_document_document' => $request->txt_knowledge_document_document,
                'c_knowledge_document_tags' => $request->txt_knowledge_document_tags,
                'c_knowledge_document_update_by' => UserAuth::getUserID(),
                'c_knowledge_document_update_time' => date('Y-m-d H:i:s'),
                'c_knowledge_document_softdelete' => 0,
            ]);
            $knowledge_document->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data '.$request->txt_knowledge_document_title.' has been added ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function edit(Request $request){
        $knowledge_document = KnowledgeDocumentModel::findOrFail($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Edit Knowledge Document '.$knowledge_document->c_knowledge_document_title,
            'data' => view('knowledge_document.v_edit_js', compact('knowledge_document'))->render()]);
    }

    public function update(KnowledgeDocumentRequest $request){
        DB::beginTransaction();

        try {
            //Update to Datadocument
            $knowledge_document = KnowledgeDocumentModel::find($request->txt_knowledge_document_id);
            $knowledge_document->c_knowledge_document_tags = $request->txt_knowledge_document_tags;
            $knowledge_document->c_knowledge_document_title = $request->txt_knowledge_document_title;
            $knowledge_document->c_knowledge_document_document = $request->txt_knowledge_document_document;
            $knowledge_document->c_knowledge_document_update_by = UserAuth::getUserID();
            $knowledge_document->c_knowledge_document_update_time = date('Y-m-d H:i:s');
            $knowledge_document->save();
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Knowledge Document '.$request->txt_knowledge_document_title.' has been updated ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function delete(Request $request){
        $knowledge_document = KnowledgeDocumentModel::find($request->id);

        return response()->json(['status' => 'success',
            'title' => 'Fetch Data Success',
            'message' => 'Delete Knowledge Document '.$knowledge_document->c_knowledge_document_name,
            'data' => view('knowledge_document.v_delete_js', compact('knowledge_document'))->render()]);
    }

    public function destroy(Request $request){
        DB::beginTransaction();

        try {
            //Update to Database
            $knowledge_document = KnowledgeDocumentModel::find($request->txt_knowledge_document_id);
            $knowledge_document->delete();

            @Storage::delete(env('UPLOAD_DOCUMENT').$knowledge_document->c_knowledge_document_document);
            DB::commit();

            return response()->json(['status' => 'success',
                'title' => 'Success',
                'message' => 'Data Knowledge Document '.$knowledge_document->c_knowledge_document_title.' has been deleted ..']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => $e]);
        }
    }

    public function upload(Request $request) {
        $file = $request->file('document');
        $fileName = $file->getClientOriginalName();

        $request->file('document')->storeAs(
            env('UPLOAD_DOCUMENT'), $fileName
        );
    }

    public function check_document(Request $request) {
        $document = Storage::exists(env('UPLOAD_DOCUMENT').$request->fileName);

        if ($document) {
            return response()->json(['status' => 'success',
                'message' => 'File berhasil upload ..']);
        }
        else {
            return response()->json(['status' => 'error',
                'message' => 'File gagal upload ..']);
        }
    }
}