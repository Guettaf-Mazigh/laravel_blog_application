<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }
    public function login(){
        return view('formes.login');
    }

    public function authentification(Request $request){
        $isUser = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

       if(Auth::attempt($isUser)){
            $request->session()->regenerate();
            $url = '';
            if(Auth::user()->role === 'admin'){
                $url = '/admin/dashboard';
            }else{
                $url = '/';
            }
            return redirect()->intended($url);
       }
        return redirect()->back()->withErrors(['user_login' => 'Invalid email or password']);
    }

    public function register(){
        return view('formes.register');
    }

    public function store(Request $request){
        $request->validate([
            'username' => ['required'],
            'email' => ['required','email','lowercase',Rule::unique('users')->ignore('id')],
            'password' => ['required','confirmed',
            Password::min(8)->numbers()->letters()->mixedCase()->symbols()
            ]
        ]);
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($user){
            Auth::login($user,true);
            return redirect('/')->with('success','You are logged now');
        }
        return redirect()->back()->withErrors(['user_creation' => 'Something went wrong. Please try again.']);
    }

    public function logout(Request $request) : RedirectResponse{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function editProfile(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('user.edit',compact("userData"));
    }

    public function updateProfile(Request $request){
       
        $user = Auth::user();
        $request->validate([
            'username' => ['required','string','max:255'],
            'location' => ['nullable','string','max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable','numeric', Rule::unique('users','phone')->ignore($user->id)],
        ]);

        if($user->role === 'lector' && $request->role === 'author'){
            return redirect()->route('pending.requests');
        }else{
            User::find($user->id)->update([
                'username' => $request->username,
                'location' => $request->location,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
            return redirect()->route('index')->with('success','Profile updated successfylly');
        }
    }

    public function storeAvatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);
        $data = User::find(Auth::user()->id);
        if($request->file('avatar')){
            $file = $request->file('avatar');
            if(!empty($data->avatar)){
                @unlink(public_path('user_images/' . $data->avatar)); 
            }  
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('user_images/'),$filename);
            $data->update(['avatar' => $filename]);
            return redirect()->route('index')->with('success','Profile picture uploaded successfully !');
        }
        return redirect()->back()->withErrors(['upload_pic_error' => 'Please respect the file size and format rules.']);
    }

    public function editPassword(){
        return view('user.editPassword');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'password' => 'required',
            'new_password' => ['required','confirmed',
            Password::min(8)->numbers()->letters()->mixedCase()->symbols()]
       ]);

       $user = Auth::user();
       if(!Hash::check($request->password,$user->password)){
            return redirect()->back()->withErrors(['password_error' => 'Invalid password']);
       }
       $user->password = Hash::make($request->new_password);
       $user->save();
       return redirect('/')->with('success','Password updated successfully !');
    }
}
