<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Hash;
use App\models\User;
use App\Http\Middleware\AuthentificationTest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mails;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Category;

class mainContr extends Controller
{
    public function registerr()
    {
        return view('register');
    }
    public function log_in()
    {
        return view('log_in');
    }
    public function getData(Request $request)
    {
        $request->validate([
            'Username' => 'required|min:6|max:12',
            'Email' => 'required|unique:Users,email',
            'Password' => 'required|min:4|max:12',
            'rPassword' => 'required|same:Password',
            'checkbox' => 'accepted',
            'pnumber' => 'required|unique:Users,pnumber|min:8|max:12',
        ]);
        $user = new User;
        $user->Username=$request->Username;
        $user->Email=$request->Email;
        $user->Password=HASH::make($request->Password);
        $user->rPassword=HASH::make($request->rPassword);
        $user->role="1";
        $user->pnumber=$request->pnumber;
        $save = $user->save();

        if($save)
        {
            return back()->with('success',(__('messages.Pavyk')));
        }else
            {
                return back()->with('fail',(__('messages.Nepavyk')));
            }
        }
    public function access(Request $request)
        {
            $request->validate
            ([
                'Email'=>'required|email',
                'Password'=>'required|min:6|max:12',
            ]);
            $user=User::where('Email','=',$request->Email)->first();
            if(!$user)
            {
                return back()->with('fail',(__('messages.REmail')));}
                else
                {
                    if($user)
                    {
                        if(Hash::check($request->Password,$user->password))
                        {
                            $request->session()->put('loginID',$user->id);
                            return redirect( "/homepage");
                        }
                        else
                        {
                            return back()->with('fail',(__('messages.Nesekmingai')));
                        }
                    }
                    else
                    {
                        return back()->with('success',(__('messages.Sekmingai')));
                    }

                }
                }
    public function logout()
            {
                if(session::has('loginID'))
                {
                    session::pull('loginID');
                }
                return redirect ('/');
            }
    public function home()
            {
                $info =['UserInfo'=>User::where('id','=',session('loginID'))->first()];
                return view("homepage",$info);
            }
    public function category()
            {
                $data =['UserInfo'=>User::where('id','=',session('loginID'))->first()];
                return view("index",$data);
            }

    public function profile()
    {
        $UserInfo = User::with('category')->find(session('loginID'));
        return view("profile", compact('UserInfo'));
    }

    public function updateProfile(Request $request)
{
    $UserInfo = User::find(session('loginID'));
    $UserInfo->pnumber = $request->input('pnumber');
    $UserInfo->email = $request->input('email');
    $UserInfo->save();

    $category = Category::where('user_id', session('loginID'))->first();
    $category->provider = $request->input('provider');
    $category->save();

    return redirect()->route('profile')->with('success', __('messages.AtnaujintasProfilis'));
}
    public function RemindPassword()
    {
        return view('test');
    }
    public function PasswordRemindPost(Request $request)
    {
        $request->validate([
            'email'=>"required|email|exists:Users",
        ]);
        $token=Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at' => Carbon::now(),
        ]);
        Mail::send('ForgotPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });
        return redirect()->to(route('PasswordRemind'))->with('success',(__('messages.Uzklausa')));
    }

    public function resetPassword($token)
    {
        $email = DB::table('password_reset_tokens')
            ->where('token', $token)
            ->value('email');

        if (!$email) {
            return redirect()->back()->with('error', 'Klaida');
        }
        return view('resetpassword', compact('token', 'email'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|string|min:4",
        ]);
        User::where('email', $request->email)
            ->update(["password" => Hash::make($request->password)]);

        DB::table('password_reset_tokens')
            ->where(["email" => $request->email])
            ->delete();

        return redirect()->to(route('login'))->with('success',(__('messages.Slapatsatytas')));
    }

}






