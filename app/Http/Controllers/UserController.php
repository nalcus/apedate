<?php

namespace Apedate\Http\Controllers;

use Illuminate\Http\Request;

use Apedate\Http\Requests;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
}
