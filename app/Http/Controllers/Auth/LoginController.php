<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request, $user)
    {

        // if($user->user_type == "owner") {
        //      smilify('error','Studio user is not permitted to login without URL slug.');
        //      \Auth::logout();
        //     $this->redirectTo = ('/admin/login');

        // }
        // else
        // {
        $update = User::where('id', \Auth::user()->id)->update(['is_online' => '1']);
        $this->redirectTo = RouteServiceProvider::HOME;
        //}
        return redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {

        $update = User::where('id', \Auth::user()->id)->update(['is_online' => '0']);
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    // public function Studiologin($slug = null)
    // {
    //     $data['slug']=$slug;
    //     return view('auth.studiologin')->with($data);
    // }

    // public function StudiologinCheck(request $request)
    // {

    //     $user=User::where(['slug'=>$request->slug,'email'=>$request->email])->first();

    //     if($user){
    //         $credentials = $request->only('email', 'password');
    //         if (\Auth::attempt($credentials)) {
    //             return redirect()->intended('admin/home');
    //         }else{
    //             smilify('error','Studio user credentials is wrong!!.');
    //         }
    //     }else{
    //         smilify('error','Studio user credentials is wrong!!.');
    //         return back();
    //     }
    // }
}
