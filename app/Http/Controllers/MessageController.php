<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function getAll() {
        return DB::table('messages')->join('users', 'messages.userId', '=' , 'users.id')->get(['name', 'message']);
   }

   public function get($id) {
        return Message::find($id);
   }

   public function create(Request $request) {
        return Message::create($request->all());
   }

   public function update(Request $request, $id) {
        $message_to_update = Message::findOrFail($id);
        return $message_to_update->update($request->all());
   }

   public function delete(Request $request, $id) {
        $message = Message::findOrFail($id);
        $message->delete();
        return 204;
   }
}
