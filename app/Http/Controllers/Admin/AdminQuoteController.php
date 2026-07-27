<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function updateStatus(Request $request, Quote $quote): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['new', 'in_review', 'sent', 'accepted', 'declined'])],
        ]);

        $quote->update(['status' => $validated['status']]);

        return back()->with('success', 'Le statut du devis a été mis à jour.');
    }
}
