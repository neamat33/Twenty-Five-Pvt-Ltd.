<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Contact;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
class ContactController extends Controller
{
    public function index(){
        $data['contacts'] = Contact::all();
        return view('admin.contact.index',$data);
    }


    
    public function destroy(Request $request){
        try {
            $contact = Contact::findOrFail(decrypt($request->id));
            $contact->delete();
            return redirect()->route('contacts.index')->with('success', 'contact deleted successfully');
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return redirect()->route('contact.index')->with('error', $err_message);
        }
    }

}//apartmentController
