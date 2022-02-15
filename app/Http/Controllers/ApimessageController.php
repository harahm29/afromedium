<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use datatables;
use App\Models\User;

class ApimessageController extends Controller
{

    public function index()
    {

        $data['user'] = User::where('user_type', 'supervisor')->get();
        return view('apimessage.index')->with($data);
    }

    public function getmessage(request $request)
    {
        try {

            $url = env('APP_GETAPI_URL') . 'message/list';
            $response = Http::post($url, ['data' => $request->all()]);

            return $response->body();
       } catch (\Throwable $th) {
           return json_encode(['error' => 'Message server not responding or not available!!', 'message' => $th]);
    }
    }


    public function send_msg(request $request)
    {
        try {
            $url = env('APP_GETAPI_URL') . 'message/send';
            $response = Http::post($url, ["data" => $request->all()]);
            return $response->body();
        } catch (\Throwable $th) {
            return json_encode(['error' => 'Message server not responding or not available!!', 'message' => $th]);
        }
    }
    public function view(request $request)
    {
        try {
            $url = env('APP_GETAPI_URL') . 'message/get_msg';
            $response = Http::post($url, ["data" => $request->all()]);
            return $response->body();
        } catch (\Throwable $th) {
            return json_encode(['error' => 'Message server not responding or not available!!', 'message' => $th]);
        }
    }

    public function get_user(request $request)
    {
        try {
            $url = env('APP_GETAPI_URL') . 'message/get_user';
            $response = Http::post($url, ["data" => $request->all()]);
            return $response->body();
        } catch (\Throwable $th) {
            return json_encode(['error' => 'Message server not responding or not available!!', 'message' => $th]);
        }
    }


    function change_user(request $request)
    {
        try {
            $url = env('APP_GETAPI_URL') . 'message/change_user';
            $response = Http::post($url, ["data" => $request->all()]);
            return $response->body();
        } catch (\Throwable $th) {
            return json_encode(['error' => 'Message server not responding or not available!!', 'message' => $th]);
        }
    }
    function msg_count(request $request)
    {
        try {
            $url = env('APP_GETAPI_URL') . 'message/msg_count';
            $response = Http::post($url, ["data" => $request->all()]);
            return $response->body();
        } catch (\Throwable $th) {
            return json_encode(['error' => 'Message server not responding or not available!!', 'message' => $th]);
        }
    }
}
