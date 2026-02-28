<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        // Honeypot check
        if ($request->filled('website')) {
            return redirect()->route('contact')->with('success', 'Message envoyé avec succès !');
        }

        $contact = Contact::create($request->safe()->only(['name', 'email', 'phone', 'service', 'budget', 'message']));

        try {
            Mail::to(config('mail.from.address', 'contact@marveltechs.cm'))
                ->send(new ContactMail($contact));
        }
        catch (\Exception $e) {
            Log::error('ContactMail error: ' . $e->getMessage());
        }

        return redirect()->route('contact')->with('success', 'Message reçu ! Nous vous répondons sous 24h. Merci de nous avoir contactés.');
    }
}