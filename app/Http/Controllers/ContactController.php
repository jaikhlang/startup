<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    /**
     * Show the application contact form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getContact()
    {
        return view('contact.index');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10', ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message,
            ];

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to(env('MAIL_FROM'));
            $message->subject($data['subject']);
        });

        return redirect('/contact')->with('success', trans('startup.notifications.contactform.created'));
    }
}
