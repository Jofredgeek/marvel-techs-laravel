<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Mail\QuoteMail;
use App\Models\Quote;
use App\Models\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function create()
    {
        $services = Service::active()->orderBy('sort_order')->pluck('title');

        return view('quote', compact('services'));
    }

    public function store(QuoteRequest $request)
    {
        if ($request->filled('website')) {
            return redirect()->route('quote')->with('success', 'Demande envoyée !');
        }

        $quote = Quote::create($request->safe()->only(['name', 'email', 'phone', 'company', 'service', 'budget', 'deadline', 'details']));

        try {
            Mail::to(config('mail.from.address', 'contact@marveltechs.cm'))
                ->send(new QuoteMail($quote));
        } catch (\Exception $e) {
            Log::error('QuoteMail error: '.$e->getMessage());
        }

        return redirect()->route('quote')->with('success', 'Votre demande de devis a bien été reçue. Nous vous contactons sous 24h avec une proposition personnalisée !');
    }
}
