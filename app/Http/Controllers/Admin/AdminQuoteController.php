<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;

class AdminQuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest()->paginate(20);
        Quote::where('read', false)->update(['read' => true]);
        return view('admin.quotes.index', compact('quotes'));
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('admin.quotes.index')->with('success', 'Devis supprimé.');
    }
}