<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController  extends BaseController
{
	use AuthenticatesUsers;
    protected $redirectTo = '/home';
	
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
	
	 protected function checkLogin(Request $request)
		{
			$field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL) ? $this->username() : 'username';
			return [$field => $request->get($this->username()),'password' => $request->password,];
		}
	}
	
	
}
