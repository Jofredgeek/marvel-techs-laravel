<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminChatController extends Controller
{
    public function index(): View
    {
        $sessions = ChatMessage::select(
            'session_id',
            DB::raw('COUNT(*) as messages_count'),
            DB::raw('MIN(created_at) as started_at'),
            DB::raw('MAX(created_at) as last_at')
        )
            ->groupBy('session_id')
            ->orderByDesc(DB::raw('MAX(created_at)'))
            ->paginate(15);

        // SQLite renvoie MIN/MAX(created_at) comme chaînes brutes → Carbon
        $sessions->getCollection()->transform(function ($session) {
            $session->started_at = \Illuminate\Support\Carbon::parse($session->started_at);
            $session->last_at = \Illuminate\Support\Carbon::parse($session->last_at);

            return $session;
        });

        // Dernier message de chaque session + compteur de messages client
        $lastMessages = ChatMessage::whereIn('session_id', $sessions->pluck('session_id'))
            ->orderBy('id')
            ->get()
            ->groupBy('session_id');

        return view('admin.chats.index', [
            'sessions' => $sessions,
            'lastMessages' => $lastMessages,
        ]);
    }

    public function destroy(string $sessionId): RedirectResponse
    {
        ChatMessage::where('session_id', $sessionId)->delete();

        return redirect()->route('admin.chats.index')->with('success', 'Conversation IA supprimée.');
    }
}
