<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Validator;
use Mail;

class ProfileController extends Controller
{
    public function index()
    {
        $data['user'] = User::find(Auth::user()->id);
        return view('profile.index')->with($data);
    }

    public function setting()
    {
        $data['user'] = User::find(Auth::user()->id);
        return view('profile.settings')->with($data);
    }

    public function update(Request $request)
    {
        $email='';
        if ($request->id) {
            $user = User::find(base64_decode($request->id));
            $msg = 'upadated';
            if($request->email!=$user->email){
                $email=$user->email;
            }
        } else {
            $user = new User;
            $msg = 'created';
        }

        if(isset($request->profile) ) {
            $profile = $request->file("profile");
            $profile_name = preg_replace('/\s+/', '_', date('Ymdhis').$profile->getClientOriginalName());
            $profile->move(base_path().'/public/assets/profile/', $profile_name);
            $user->profile=$profile_name;
        }else{
            if(isset($request->old_profile)){
                $user->profile=$request->old_profile;
            }else{
                $user->profile='user.jpg';
            }
        }

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
        if($is_save){
            if($email!=''){
                try {
                    $post = array(
                        'name' => $request->fname . ' ' . $request->lname,
                        'new_email' => $request->email,
                        'old_email' => $email
                    );

                    $new = Mail::send('templete.email.index', $post, function ($message) use ($post) {
                        $message->to($post['new_email'])
                            ->subject('Your Email successfully updated in '.config('app.name', 'Pittige-Dates'));
                    });

                    $oldnew = Mail::send('templete.email.index', $post, function ($message) use ($post) {
                        $message->to($post['old_email'])
                            ->subject('Your Email successfully updated in '.config('app.name', 'Pittige-Dates'));
                    });
                } catch (\Throwable $th) {
                }
            }
        }

        setErrors($is_save, 'Your Info ' . $msg . ' successfully!', 'Your Info not ' . $msg . '!');
        return redirect(route('profile.setting'));
    }

    public function change_password()
    {
        $data['user'] = User::find(Auth::user()->id);
        return view('profile.change')->with($data);
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $userPassword = $user->password;

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword)) {

            return back()->withErrors(['current_password' => 'password not match']);
        }

        $user->password = Hash::make($request->password);

        $is_save = $user->save();

        if($is_save){

            try {
                $post = array(
                    'name' => $user->fname . ' ' . $user->lname,
                    'email' => $user->email,
                    'new_password' => $request->password,
                );

                $Mdata = Mail::send('templete.email.changepassword', $post, function ($message) use ($post) {
                    $message->to($post['email'])
                        ->subject('Your Password successfully updated in '.config('app.name', 'Pittige-Dates'));
                });
            } catch (\Throwable $th) {

            }

        }
        setErrors($is_save, 'Password successfully updated!', 'Password not successfully updated!');

        return redirect()->back();
    }
}
