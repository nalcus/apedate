<?php

namespace Apedate\Http\Controllers;

use Illuminate\Http\Request;

use Apedate\Models\User;
use Apedate\Http\Requests;

class ProfileController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function user()
{
    return $this->belongsTo('Apedate\User');
}
}
