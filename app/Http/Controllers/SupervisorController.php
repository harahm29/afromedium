<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supervisor;
use App\Models\Adminright;

class SupervisorController extends Controller
{
    public function index()
    {
        return view('supervisors.index');
    }
    public function list()
    {
        $users = Supervisor::orderBy('created_at', 'DESC')->get();
        return datatables($users)->toJson();
    }
    public function userview($id = null)
    {
        $data['user'] = Supervisor::find(base64_decode($id));
        return view('supervisors.view')->with($data);
    }
    public function add($id = null)
    {
        $data['rights'] = Adminright::where('type','supervisor')->get();
        $data['user'] = Supervisor::find(base64_decode($id));

        return view('supervisors.add')->with($data);
    }
    public function store(Request $request)
    {
        //dd($request->all());
        if ($request->id) {
            $user = Supervisor::find(base64_decode($request->id));
            $msg = 'upadated';
        } else {
            $user = new Supervisor;
            $user->password = Hash::make($request->password);
            $msg = 'created';
        }
        if ($request->user_type == 'admin') {
            if ($request->rights) {
                if (count($request->rights) != 0) {
                    $string = implode(",", $request->rights);
                    $user->rights = $string;
                }
            }
        } else {
            $user->rights = NULL;
        }
        $user->user_type = $request->user_type;
        $user->fname = $request->fname;
        $user->lname = $request->lname;


        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->zip_code = $request->zip_code;
        $is_save = $user->save();
        setErrors($is_save, 'User ' . $msg . ' successfully!', 'User not ' . $msg . '!');
        return redirect('supervisor');
    }
    public function destroy(Request $request)
    {
        //dd($request->all());
        $deleted = Supervisor::where('id', base64_decode($request->id))->delete();
        if ($deleted) {
            $status = true;
        } else {
            $status = false;
        }
        return response()->json($status);
    }
    public function checkEmail(Request $request, $id = null)
    {
        $where = array('email' => $request->email);
        if ($id != "") {

            $where = array(
                array('email', $request->email),
                array('id', '<>', $id)
            );
        }

        $arrData = Supervisor::where($where)->get();

        if (count($arrData) != "0") {
            return response()->json(array('valid' => false));
        }
        return response()->json(array('valid' => true));
    }
}
