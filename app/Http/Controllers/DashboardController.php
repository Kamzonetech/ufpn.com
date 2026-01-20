<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard(){

        $role = Auth::user()->user_type;


        switch ($role) {

          case 'Admin':
             return redirect()->route('admin.dashboard');
             break;
          case 'Guest':
             return redirect()->route('welcome');
             break;
        }
    }

    public function changepassword(Request $request){
        $data =  $request->validate([
             'current_passowrd' => ['required', 'string', 'min:8'],
             'password' => ['required', 'string', 'min:8'],
             'password_confirmation' => ['required', 'string', 'min:8','same:password'],
         ]);

         if(!Hash::check($data['current_passowrd'], Auth()->user()->password)){
             return back()->with('errorfeedback',  "Your current password does not match our record");
         }else{
             User::find(Auth::user()->id)->update([
                 'password' => Hash::make($data['password']),
             ]);
             return back()->with('feedback', 'Password Successfully Changed');
         }
    }
}
