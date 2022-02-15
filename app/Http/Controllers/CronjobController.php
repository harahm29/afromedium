<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\User;
use \Carbon\Carbon;

class CronjobController extends Controller
{

    public function cronjob()
    {
        $url = env('APP_GETAPI_URL') . 'chat/newmsg/assign_user';
        $response = Http::get($url);
        $data = json_decode($response->body(), true);
        $infoArray = array();
        if (!$data["error"]) {
            $user_not = array();
            if (count($data['data']) != 0) {
                foreach ($data['data'] as $keym => $m) {
                    if ($m['assign_user']) {
                        $assign_user = $m['assign_user'];
                        $now = Carbon::now()->format('Y-m-d H:i:s');

                        $to_time = strtotime($now);

                        if ($m['assign_time']) {
                            $assign_time = Carbon::createFromFormat('Y-m-d H:i:s', $m['assign_time']);
                        } else {
                            $assign_time = Carbon::now()->subHours(2)->format('Y-m-d H:i:s');
                        }
                        $from_time = strtotime($assign_time);
                        $minutes = round(abs($to_time - $from_time) / 60, 2);

                        if ($minutes >= 7) {

                            $this->update_msg($assign_user, $m['id'], 'unassignmsg');
                        } else {

                            $user_not[] =  $assign_user;
                        }
                    }
                }
            }
        }
        $old_user = User::where('is_old', '1')->first();

        $uarry = array();
        $twou = array();
        if ($old_user) {
            $where = array('user_id' => $old_user->id, 'is_online' => '1');
            $online_users = User::where($where)->get();
            if ($online_users) {

                $url_new = env('APP_GETAPI_URL') . 'chat/newmsg';
                $response_new = Http::get($url_new);
                $data_new = json_decode($response_new->body(), true);
                //dd($online_users,$data_new);
                if ($data_new['error'] == "") {
                    $msgcount = count($data_new['data']);
                    $usercount = count($online_users);

                    if ($msgcount != 0 && $usercount != 0) {

                        if ($msgcount == $usercount) {
                            $ara = [];
                            foreach ($data_new['data'] as $mkey => $m) {
                                if ($mkey <= $usercount) {
                                    if ($online_users[$mkey]->id) {
                                        $ara[] =  $this->update_msg($online_users[$mkey]->id, $m['id'], '');
                                    }
                                }
                            }
                        } elseif ($msgcount < $usercount) {

                            foreach ($online_users as $ukey => $u) {
                                if ($ukey < $msgcount) {
                                    if ($data_new['data'][$ukey]['id']) {
                                        $this->update_msg($u->id, $data_new['data'][$ukey]['id'], '');
                                    } else {
                                        break;
                                    }
                                }
                            }
                        } else {
                            foreach ($data_new['data'] as $mkey => $m) {
                                if ($mkey < $usercount) {

                                    if ($online_users[$mkey]->id) {
                                        $uarry[] = $online_users[$mkey]->id;
                                        $this->update_msg($online_users[$mkey]->id, $m['id'], '');
                                    } else {
                                        break;
                                    }
                                } else {
                                    break;
                                }
                            }
                        }
                    }
                }
            }
        }
    }


    public function update_msg($user_id = NULL, $id, $unassignmsg = '')
    {
        try {
            if($id){
                $url = env('APP_GETAPI_URL') . 'chat/update';
                $responses = Http::post($url, ['user_id' => $user_id, 'id' => $id, 'unassignmsg' => $unassignmsg]);
                $data = json_decode($responses->body(), true);
                if ($data["error"] != '') {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }
}
