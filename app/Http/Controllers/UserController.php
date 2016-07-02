<?php

namespace Apedate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Apedate\Http\Requests;
use Apedate\User;
use Apedate\Profile;

class UserController extends Controller
{

  public function postSignUp(Request $request)
  {
    $this->validate($request, [
      'email' => 'email|unique:users|required',
      'username' => 'required|max:64',
      'password' => 'required|min:6|confirmed'
    ]);

    $username = $request['username'];
    $email = $request['email'];
    $password = bcrypt($request['password']);

    $user = new User();
    $user->username = $username;
    $user->email = $email;
    $user->password = $password;

    $user->save();

    Auth::login($user);

    $profile = new Profile();
    $profile->user_id = $user->id;

    $profile->save();

    return redirect()->route('dashboard');
  }

  public function postSignIn(Request $request)
  {
    if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
      return redirect()->route('dashboard');
    } else {
      return redirect()->back();
    }
  }

  public function getLogOut()
  {
    Auth::logout();

    return redirect('/');
  }

  public function getDashboard()
  {
    return view('dashboard');
  }
}
