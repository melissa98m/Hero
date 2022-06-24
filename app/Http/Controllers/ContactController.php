<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{

    public function createForm(Request $request) {
        return view('contact-us');
    }

    public function ContactForm(Request $request) {
        // Form validation
        $this->validate($request, [
            'contact_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'subject'=>'required',
            'message' => 'required'
        ]);
        //  Store data in database
        //  Store data in database
        Contact::create($request->all());
        //  Send mail to admin
        \Mail::send('mail', array(
            'contact_name' => $request->get('contact_name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('melissa.mangione@gmail.com', 'Admin')->subject($request->get('subject'));
        });
        return back()->with('success', 'Nous avons bien recu votre message');
    }

}
