<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Monolog\ErrorHandler;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function register(Request $request) {
        $values = $request->all();
        if($values['password'] == $values['password2']) {
            $user = new User;
            $user->name = $values['name'];
            $user->email = $values['email'];
            $user->password = bcrypt($values['password']);
            try {
                $user->save();
            } catch(QueryException $ex) {
                $error = null;
                switch($ex->getCode()) {
                    case "23000":
                        $error = "Account with this email is already registered. Please try again.";
                        break;
                }

                return Redirect::back()->withErrors([$error]);
            }
            return redirect('/login');
        } else {
            return Redirect::back()->withErrors(["Passwords were not the same please try again"]);
        }
    }
}
