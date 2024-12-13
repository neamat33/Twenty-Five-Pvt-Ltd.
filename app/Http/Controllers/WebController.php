<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
class WebController extends Controller
{

    public function index()
    {
        return view('web.home');
    }
    
    public function faq()
    {
        $data['masalahs'] = Masalah::where('status',1)->get();
        return view('web.masalah',$data);
    }
    public function aboutUs()
    {
        return view('web.about');
    }

    public function contact()
    {
        return view('web.contact');
    }

    // contact us Save
    public function contactSave(Request $request)
    {
        // Validate input fields
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:128'],
            'mobile' => ['required', 'regex:/^(\+?[0-9]{10,15})$/'], // Validate international mobile numbers
            'email' => ['nullable', 'email'], // Optional email validation
            'message' => ['required', 'string'],
        ]);
    
        // If validation fails, redirect back with errors and old input
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Save the contact message
            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->mobile = $request->input('mobile');
            $contact->email = $request->input('email', null); // Defaults to null if not provided
            $contact->message = $request->input('message');
            $contact->save();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Your message was sent successfully!');
        } catch (\Exception $e) {
            // Handle exception and log for debugging purposes
            \Log::error('Contact Form Error: ' . $e->getMessage());
    
            // Redirect back with error message and old input
            return redirect()->back()->with('error', 'An error occurred while sending your message. Please try again.')->withInput();
        }
    }
}
