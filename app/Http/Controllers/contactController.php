<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\User;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function contact_messages ()

    {

        $messages = contact::get();

        return view ('admin.contact.contact_messages',compact('messages'));
    }

    public function message_view ($id)
    {
        $message = contact::findOrFail($id);

        return view ('admin.contact.view_message',compact('message'));
    }

    public function users_list ()

    {
        $users = User::get();

        return view('admin.customers.users_list',compact('users'));

    }
}
