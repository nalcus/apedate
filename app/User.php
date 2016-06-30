<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'username','email', 'password',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function profile() {
    return $this->hasOne('App\Profile');
  }

  public function store()
  {
    $userData = new User(Input::only('username'));
    $userProfileData = new Profile(Input::except('username'));

    $userData->save();
    $userProfileData->users_id = $userData->id;
    $userProfileData->save();

    Flash::success('A new user has been created successfully.');
    return Redirect::route('\home');
  }
}
