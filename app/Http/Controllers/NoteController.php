<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Note;

class NoteController extends Controller
{
    // public function list(Request $request)
    // {
    //     $url = env('APP_GETAPI_URL') . 'notes/list';
    //     $response = Http::post($url, ["data" => $request->all()]);
    //     return $response->body();
    // }

    // public function add(Request $request)
    // {
    //     //dd($request->all());
    //     $url = env('APP_GETAPI_URL') . 'notes/add';
    //     $response = Http::post($url, ["data" => $request->all()]);
    //     return $response->body();
    // }

    public function add(Request $request)
    {
        $request = (object) $request;
        //dd($request->all());
        $data = array();
        $data['user_id'] = $request->user_id;
        $data['created_by'] = Auth::user()->id;
        $data['type'] = $request->note_type;

        if ($request->note_type == "general" || $request->note_type == "occupation" || $request->note_type == "education" || $request->note_type == "location" || $request->note_type == "transportation") {
            $data['eng_text'] = $request->eng_note_text;

        } else if ($request->note_type == "email") {
            $data['eng_text'] = $request->note_email;
        } else if ($request->note_type == "number") {
            $data['eng_text'] = $request->note_number;
        } else if ($request->note_type == "photo") {

            $data['eng_text'] = $request->photo_note_text;
            // $profile = $request->file("note_photo");
            // $profile_name = preg_replace('/\s+/', '_', date('Ymdhis') . $profile->getClientOriginalName());
            // $profile->move(base_path() . '/public/assets/note/', $profile_name);
            // $data['dutch_text'] = $profile_name;
        } else {
            $data['eng_text'] = Null;
        }


        if ($request->id) {
            $save = Note::where('id', $request->id)->update($data);
            if ($save) {
                return json_encode(['error' => '', 'message' => 'Note Updated Successfully!']);
            } else {
                return json_encode(['error' => 'error', 'message' => 'Note not Updated Successfully!']);
            }
        } else {
            $save = Note::create($data);
            if ($save) {
                return json_encode(['error' => '', 'message' => 'Note Created Successfully!']);
            } else {
                return  json_encode(['error' => 'error', 'message' => 'Note not Created Successfully!!']);
            }
        }
    }

    public function list(Request $request)
    {
        $request = (object) $request;
        if ($request->user_id) {
            $list = Note::where('user_id', $request->user_id)->get();
            if ($list) {
                return json_encode(['error' => '', 'data' => $list]);
            } else {
                return json_encode(['error' => 'error', 'message' => 'Note is not available!']);
            }
        } else {
            return json_encode(['error' => 'error', 'message' => 'Please provide user_id !']);
        }
    }
}
