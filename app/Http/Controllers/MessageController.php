<?php

namespace App\Http\Controllers;

use Pusher;
use App\User;
use App\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Events\PrivateMessageSent;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
   
    
    public function privateMessages($from,$to)
    {
       $message=DB::table('messages')
               ->where('from', '=', $from)
              ->orWhere('to', '=', $to)
              ->orWhere('from', '=', $to)
              ->orWhere('to', '=', $from)
              ->get();

      return $message;
    }

    public function sendPrivateMessage(Request $request)
    {

        $from =$request->from;
        $to = $request->to;
        $message = $request->message;
       
        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->save();
   
       
        broadcast(new PrivateMessageSent($data))->toOthers();

        return response(['status'=>'Message private sent successfully','message'=>$data]);
    }
   
}
