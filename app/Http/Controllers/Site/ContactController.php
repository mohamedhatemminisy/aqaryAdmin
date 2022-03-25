<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactFormRequest;
use App\Models\Contact;
use App\Models\Page;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contact_text = Page::where('identifier', 'contact_page')->first();
        return view('site.contact', compact('contact_text'));
    }

    public function contactForm(ContactFormRequest $request)
    {
        $contactForm = new Contact();
        $contactForm->name = $request->name;
        $contactForm->email = $request->email;
        $contactForm->phone = $request->phone;
        $contactForm->message = $request->message;
        $contactForm->save();
        if ($contactForm) {
            return response()->json([
                'success' => 'true'
            ]);
        }
    }
}
