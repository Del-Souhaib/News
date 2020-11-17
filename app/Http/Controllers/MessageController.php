<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function Send(MessageRequest $req)
    {
        Message::insert([
            'name' => $req->name,
            'email' => $req->email,
            'message' => $req->message,
            'created_at'=>date('y-m-d h:i:s'),
        ]);
   //     return  redirect()->back();
    }
    public function Messages(){
        $messages=Message::paginate(5);
        return view('Admins/Messages',compact('messages'));
    }
    public function deletemessage($id){
        Message::where('id',$id)->delete();
        return redirect(url('Admins/Messages'));
    }
}
