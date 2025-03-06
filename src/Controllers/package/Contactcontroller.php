<?php

namespace Awaistech\Larpack\Controllers\Package;

use App\Http\Controllers\Controller;
use Awaistech\Larpack\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Contactcontroller extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role === 'super') {
            // Include soft-deleted records
            $datas = Contact::orderBy('created_at', 'desc')->withTrashed()->get();
        } else {
            // Only show active records
            $datas = Contact::orderBy('created_at', 'desc')->get();
        }
        return view('full-Admin-Panel.backend.contact.dashboard', compact('datas'));
    }
    public function Contactdelete($id)
    {
        $blog = Contact::find($id)->delete();
        return redirect()->back()->with('message', 'contact information Has been deleted');
    }
    public function restore($id)
    {
        // Use withTrashed to include soft-deleted records.
        $contact = Contact::withTrashed()->findOrFail($id);

        // Restore the contact if it is soft deleted.
        if ($contact->trashed()) {
            $contact->restore();
            return redirect()->back()->with('success', 'Contact restored successfully.');
        }
        
        return redirect()->back()->with('info', 'Contact is not deleted.');
    }
    public function Contact_store(request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'services' => 'required',
            'email' => 'required',
            'date' => 'required',
            'message' => 'required',
        ]);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'services' => 'required',
            'email' => 'required',
            'date' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->messages()], 422);
        }
        // Create a new model instance
        $contact = new Contact([
            'name' => $data['name'],
            'service' => json_encode($data['services']), // Store services as JSON
            'email' => $data['email'],
            'date' => $data['date'],
            'message' => $data['message'],
        ]);

        $contact->save();
        return response()->json(['message' => 'Your message has been submitted successfully!']);
    }
}
