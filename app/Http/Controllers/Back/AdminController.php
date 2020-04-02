<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('back.index');
    }
    public function contact()
    {
        $messages = Contact::paginate(12);
        return view('back.contact',compact('messages'));
    }

    public function messagedelete($id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.contact')->with('success','You have deleted message successfully');
    }
}
