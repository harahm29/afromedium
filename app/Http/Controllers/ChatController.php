<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use datatables;
use App\Models\User;
use \Carbon\Carbon;

class ChatController extends Controller
{
    public function index()
    {
        return view('apimessage.view');
    }
    public function get_info(Request $request)
    {
        try {
            $url = env('APP_GETAPI_URL') . 'chat/getmsg';
            $response = Http::post($url, ["data" => $request->all()]);
            return $response->body();
        } catch (\Throwable $th) {
            return json_encode(['error' => 'Message server not responding or not available!!', 'message' => $th]);
        }
    }

    //get_msg_count
    public function get_msg_count(Request $request)
    {
        try {
            $url = env('APP_GETAPI_URL') . 'chat/get_msg_count';
            $response = Http::post($url, ["data" => $request->all()]);
            return $response->body();
        } catch (\Throwable $th) {
            return json_encode(['error' => 'Message server not responding or not available!!', 'message' => $th]);
        }
    }
}
