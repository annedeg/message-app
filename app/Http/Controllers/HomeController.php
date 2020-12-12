<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->messageController = new MessageController();
    }

    public function index() {
        $user = false;
        if(Auth::user()) {
            $loggedin = Auth::user();
        }
        $messages = $this->messageController->getAll();
        return view('home', [
            'messages' => $messages,
            'user' => $loggedin
        ]);
    }

    public function newMessage(Request $request) {
        $this->messageController->create($request);
        return $this->index();
    }
}
