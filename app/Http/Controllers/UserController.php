<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Adminright;
use Hash;
use Auth;
use Mail;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main') {
            if (CheckRights(Auth::user()->rights, 1) || CheckRights(Auth::user()->rights, 3)) {
                return view('users.index');
            } else {
                smilify('error', 'You Have a no rights to access this page!!');
                return redirect()->route('home');
            }
        } else {
            if (Auth::user()->user_type == 'owner') {
                return view('users.index');
            }
            if (Auth::user()->user_type == 'supervisor') {
                if (CheckRights(Auth::user()->rights, 7)) {
                    return view('users.index');
                } else {
                    smilify('error', 'You Have a no rights to access this page!!');
                    return redirect()->route('home');
                }
            }

            if (Auth::user()->user_type == 'user') {
                smilify('error', 'You Have a no rights to access this page!!');
                return redirect()->route('home');
            }
        }
    }
    public function list()
    {
        $where = array('user_id' => Auth::user()->id);
        $rights = Auth::user()->rights;
        $rightsIn = array();
        if ($rights) {
            $newrights = explode(',', $rights);
            if (in_array(1, $newrights)) {
                $rightsIn[] = 'admin';
            }
            if (in_array(3, $newrights)) {
                $rightsIn[] = 'owner';
            }
        }

        //dd($rightsIn);
        if (Auth::user()->user_type == 'main') {
            $users = User::where($where)->where('user_type', '!=', 'main')->orderBy('created_at', 'DESC')->get();
        } elseif (Auth::user()->user_type == 'admin') {
            $users = User::where($where)->where('user_type', '!=', 'main')->whereIn('user_type', $rightsIn)->orderBy('created_at', 'DESC')->get();
        } elseif (Auth::user()->user_type == 'supervisor') {
            $users = User::where($where)->where('user_type', '!=', 'main')->where('user_type', 'user')->orderBy('created_at', 'DESC')->get();
        } else {
            $users = User::where($where)->where('user_type', '!=', 'main')->where('user_type', 'supervisor')->orderBy('created_at', 'DESC')->get();
        }

        return datatables($users)->toJson();
    }
    public function userview($id = null)
    {
        $data['user'] = User::find(base64_decode($id));
        return view('users.view')->with($data);
    }
    public function add($id = null)
    {

        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main') {
            $data['rights'] = Adminright::where('type', '!=', 'supervisor')->get();
        } elseif (Auth::user()->user_type == 'owner') {
            $data['rights'] = Adminright::where('type', 'supervisor')->get();
        }

        $data['user'] = User::find(base64_decode($id));
        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main') {
            if (CheckRights(Auth::user()->rights, 2) || CheckRights(Auth::user()->rights, 4)) {
                return view('users.add')->with($data);
            } else {
                smilify('error', 'You Have a no rights to access this page!!');
                return redirect()->route('home');
            }
        } else {
            return view('users.add')->with($data);
        }
    }
    public function store(Request $request)
    {
        //dd($request->all());

        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main') {
            if (!CheckRights(Auth::user()->rights, 2)) {
                smilify('error', 'You Have a no rights to access this page!!');
                return redirect()->route('home');
            }
            if (!CheckRights(Auth::user()->rights, 4)) {
                smilify('error', 'You Have a no rights to access this page!!');
                return redirect()->route('home');
            }
        }

        if (Auth::user()->user_type == 'supervisor') {
            if (!CheckRights(Auth::user()->rights, 7)) {
                smilify('error', 'You Have a no rights to access this page!!');
                return redirect()->route('home');
            }
        }

        if ($request->id) {
            $user = User::find(base64_decode($request->id));
            $msg = 'upadated';
        } else {
            $user = new User;
            $user->password = Hash::make($request->password);
            $msg = 'created';
        }

        if ($request->user_type == 'admin' || $request->user_type == 'owner' || $request->user_type == 'supervisor') {
            if ($request->rights) {
                if (count($request->rights) != 0) {
                    $string = implode(",", $request->rights);
                    $user->rights = $string;
                } else {
                    $user->rights = NULL;
                }
            } else {
                $user->rights = NULL;
            }
        } else {
            $user->rights = NULL;
        }
        $user->user_type = $request->user_type;
        $user->user_id = Auth::user()->id;
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
        if ($msg == 'created') {
            if ($is_save) {
                try {
                    $post = array(
                        'name' => $request->fname . ' ' . $request->lname,
                        'email' => $request->email,
                        'phone_number' => $request->phone,
                        'password' => $request->password,
                        'created_by' => Auth::user()->fname . ' ' . Auth::user()->lname,
                    );

                    $Mdata = Mail::send('templete.email.newuser', $post, function ($message) use ($post) {
                        $message->to($post['email'])
                            ->subject('Your welcome in ' . config('app.name', 'Pittige-Dates'));
                    });
                } catch (\Throwable $th) {
                }
            }
        }

        setErrors($is_save, 'User ' . $msg . ' successfully!', 'User not ' . $msg . '!');
        return redirect(route('user.index'));
    }
    public function destroy(Request $request)
    {

        $deleted = User::where('id', base64_decode($request->id))->delete();
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

        $arrData = User::where($where)->get();

        if (count($arrData) != "0") {
            return response()->json(array('valid' => false));
        }
        return response()->json(array('valid' => true));
    }
}
