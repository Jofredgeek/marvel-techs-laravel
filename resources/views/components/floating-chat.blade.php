{{-- ═══════════════════════════════════════════════════════════════
     Widget flottant : Tchat IA (bot ⚡ répond via POST /api/chat,
     conversations sauvegardées) + bascule "laisser un message" (→
     /contact, boîte de réception admin) + bouton WhatsApp
     — pages publiques uniquement.
     ⚠️ Définir WHATSAPP_NUMBER dans le .env avec le vrai numéro.
     ═══════════════════════════════════════════════════════════════ --}}
@php
$whatsapp = preg_replace('/[^0-9]/', '', env('WHATSAPP_NUMBER', ''));
$waText = rawurlencode("Bonjour Marvel Tech's ! J'aimerais discuter d'un projet IT.");
@endphp

<div id="fx-float" x-data="{ open: false }" @keydown.escape.window="open = false">

    {{-- ─── Panneau tchat ─── --}}
    <div id="fchat-panel" class="fchat-panel" x-cloak x-show="open"
        x-transition:enter="fchat-transition" x-transition:enter-start="fchat-hidden"
        x-transition:leave="fchat-transition" x-transition:leave-end="fchat-hidden">

        <header class="fchat-head">
            <span class="fchat-avatar">⚡</span>
            <div>
                <strong>Tchat Marvel Tech's</strong>
                <span class="fchat-status">
                    <span class="fchat-dot"></span> Assistant IA · Techniciens sous 24h
                </span>
            </div>
            <button type="button" class="fchat-close" aria-label="Fermer le tchat" @click="open = false">✕</button>
        </header>

        <div class="fchat-body" id="fchat-msgs">
            <div class="fchat-bubble fchat-bot">
                👋 Bonjour ! Je suis l'assistant Marvel Tech's, tapez votre question et
                je réponds tout de suite. Pour joindre un technicien, il y a une section
                dédiée juste en dessous ⬇️
            </div>

            <div class="fchat-actions" id="fchat-quick-actions">
                <a href="{{ route('quote') }}">📝 Demander un devis</a>
                <a href="{{ route('services.index') }}">🛠️ Voir les services</a>
                <a href="#" id="fchat-mode-form">📩 Laisser un message</a>
            </div>

            {{-- Chat IA : champ de saisie (visible par défaut) --}}
            <form id="fchat-ai-form" class="fchat-form">
                <div class="fchat-row fchat-ai-row">
                    <input type="text" name="aimessage" id="fchat-ai-input" required maxlength="1000"
                        placeholder="Posez votre question…" class="form-input" autocomplete="off">
                    <button type="submit" class="fchat-send-ai" id="fchat-ai-send" aria-label="Envoyer">➤</button>
                </div>
                <button type="button" id="fchat-mode-ai"
                    class="fchat-switch-link hidden">💬 Revenir à l'assistant IA</button>
            </form>

            {{-- mini-formulaire → /contact (boîte de réception admin), masqué par défaut --}}
            <form id="fchat-form" class="fchat-form hidden">
                <input type="text" name="website" class="fchat-honeypot" tabindex="-1" autocomplete="off">
                <div class="fchat-row">
                    <input type="text" name="name" id="fchat-name" placeholder="Votre nom" required maxlength="150"
                        class="form-input">
                    <input type="email" name="email" id="fchat-email" placeholder="Votre email" required
                        maxlength="200" class="form-input">
                </div>
                <textarea name="message" id="fchat-message" rows="3" required maxlength="3000"
                    placeholder="Décrivez votre besoin (min. 20 caractères)…" class="form-input"></textarea>
                <button type="submit" class="btn-primary fchat-send">Envoyer le message 🚀</button>
                <button type="button" id="fchat-back-ai"
                    class="fchat-switch-link">💬 Revenir à l'assistant IA</button>
            </form>
        </div>
    </div>

    {{-- ─── Boutons flottants ─── --}}
    <div class="fchat-buttons">
        @if ($whatsapp)
        <a href="https://wa.me/{{ $whatsapp }}?text={{ $waText }}" target="_blank" rel="noopener"
            class="fchat-btn fchat-wa" aria-label="Discuter sur WhatsApp" title="Discuter sur WhatsApp">
            <svg viewBox="0 0 32 32" fill="currentColor" class="w-7 h-7" aria-hidden="true">
                <path
                    d="M16.04 5.33c-5.88 0-10.63 4.77-10.63 10.64 0 1.87.49 3.7 1.42 5.32l.02.06-1.5 5.53 5.67-1.49.05.03a10.57 10.57 0 0 0 4.97 1.25h.01c5.87 0 10.63-4.77 10.63-10.64 0-2.84-1.11-5.51-3.12-7.52a10.55 10.55 0 0 0-7.52-3.18zm0 19.45h-.01a8.86 8.86 0 0 1-4.51-1.23l-.32-.19-3.36.88.9-3.28-.21-.34a8.79 8.79 0 0 1-1.35-4.68c0-4.88 3.97-8.85 8.86-8.85 2.36 0 4.59.92 6.25 2.59a8.8 8.8 0 0 1 2.59 6.26c0 4.88-3.97 8.84-8.84 8.84zm4.85-6.61c-.27-.13-1.58-.78-1.82-.87-.24-.09-.42-.13-.6.13-.18.27-.68.87-.84 1.05-.15.18-.31.2-.58.07-.27-.13-1.13-.42-2.15-1.33-.79-.71-1.33-1.58-1.48-1.85-.16-.27-.02-.41.12-.55.12-.12.27-.31.4-.47.13-.15.18-.27.27-.44.09-.18.04-.33-.02-.47-.07-.13-.61-1.45-.83-1.99-.22-.53-.44-.46-.6-.46h-.51c-.18 0-.47.07-.71.33-.24.27-.93.91-.93 2.22 0 1.31.96 2.58 1.09 2.76.13.18 1.89 2.88 4.57 4.04.64.27 1.14.44 1.53.57.64.2 1.23.17 1.69.11.51-.08 1.58-.65 1.8-1.27.22-.63.22-1.16.16-1.27-.06-.11-.24-.18-.51-.31z" />
            </svg>
        </a>
        @endif
        <button type="button" id="fchat-toggle" class="fchat-btn fchat-chat" aria-label="Ouvrir le tchat"
            title="Tchat en ligne" @click="open = !open">
            <span class="fchat-chat-icon">💬</span>
            <span class="fchat-badge"></span>
        </button>
    </div>
</div>

<script>
    (function () {
        const meta = document.querySelector('meta[name="csrf-token"]');
        const msgs = document.getElementById('fchat-msgs');
        const aiForm = document.getElementById('fchat-ai-form');
        const aiInput = document.getElementById('fchat-ai-input');
        const aiSend = document.getElementById('fchat-ai-send');
        const msgForm = document.getElementById('fchat-form');
        const quickActions = document.getElementById('fchat-quick-actions');
        const modeForm = document.getElementById('fchat-mode-form');
        const modeAi = document.getElementById('fchat-mode-ai');
        const backAi = document.getElementById('fchat-back-ai');
        if (!meta || !aiForm) return;
        const csrf = meta.getAttribute('content');

        // Session persistante (l'historique réel vit dans la BDD côté serveur)
        // → même conversation retrouvée si le visiteur ferme/rouvre le widget
        let sessionId = null;
        try {
            sessionId = localStorage.getItem('fchat_session');
        } catch (e) { /* localStorage indisponible (mode privé) */ }
        if (!sessionId) {
            sessionId = 'w-' + (Date.now().toString(36) + Math.random().toString(36).slice(2, 10));
            try { localStorage.setItem('fchat_session', sessionId); } catch (e) { /* no-op */ }
        }
        let exchangeCount = 0;

        function addBubble(text, kind) {
            const div = document.createElement('div');
            div.className = 'fchat-bubble ' + kind;
            div.textContent = text;
            msgs.appendChild(div);
            msgs.scrollTop = msgs.scrollHeight;
            return div;
        }

        function bubbleTyping() {
            const div = document.createElement('div');
            div.className = 'fchat-bubble fchat-bot fchat-typing';
            div.innerHTML = '<span></span><span></span><span></span>';
            msgs.appendChild(div);
            msgs.scrollTop = msgs.scrollHeight;
            return div;
        }

        // ── Bascule de mode : IA (par défaut) ↔ formulaire "technicien" ──
        function showForm() {
            aiForm.classList.add('hidden');
            msgForm.classList.remove('hidden');
            quickActions.classList.add('hidden');
            msgs.scrollTop = msgs.scrollHeight;
        }
        function showAi() {
            msgForm.classList.add('hidden');
            aiForm.classList.remove('hidden');
            quickActions.classList.remove('hidden');
            msgs.scrollTop = msgs.scrollHeight;
        }
        modeForm.addEventListener('click', (e) => { e.preventDefault(); addBubble('📩 Rédigez votre message au technicien ci-dessous 👇 (email + message)', 'fchat-user'); showForm(); });
        modeAi.addEventListener('click', () => showAi());
        backAi.addEventListener('click', () => showAi());

        // ── Chat IA ──
        let aiBusy = false;
        aiForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const text = aiInput.value.trim();
            if (!text || aiBusy) return;
            if (text.length < 2) { addBubble('⚡ Écrivez au moins un mot 🙂', 'fchat-bot'); return; }

            aiBusy = true;
            aiInput.value = '';
            aiSend.disabled = true;
            addBubble(text, 'fchat-user');
            const typing = bubbleTyping();

            fetch('{{ route("chat.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ session_id: sessionId, message: text })
            }).then((resp) => resp.json().then((data) => ({ ok: resp.ok, data })))
                .then(({ ok, data }) => {
                    typing.remove();
                    if (ok && data.reply) {
                        addBubble(data.reply, 'fchat-bot');
                        exchangeCount++;
                        // Au bout de 4 échanges, une seule fois, proposer le message technicien
                        if (exchangeCount === 4 && quickActions && !quickActions.classList.contains('hidden')) {
                            addBubble('💡 Besoin d\'un vrai technicien ? Cliquez sur « Laisser un message » et on vous répond sous 24h.', 'fchat-bot');
                        }
                    } else {
                        addBubble("⚠️ L'assistant est momentanément indisponible — utilisez « 📩 Laisser un message » ci-dessus, un technicien vous répond sous 24h.", 'fchat-bot');
                    }
                }).catch(() => {
                    typing.remove();
                    addBubble("❌ Connexion perdue avec l'assistant. Réessayez ou utilisez « 📩 Laisser un message ».", 'fchat-bot');
                }).finally(() => {
                    aiBusy = false;
                    aiSend.disabled = false;
                });
        });

        // ── Message au technicien : envoi réel vers /contact (boîte admin) ──
        msgForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const name = msgForm.name.value.trim();
            const email = msgForm.email.value.trim();
            const message = msgForm.message.value.trim();

            if (message.length < 20) {
                addBubble('⚠️ Votre message doit contenir au moins 20 caractères.', 'fchat-bot');
                return;
            }

            const sendBtn = msgForm.querySelector('.fchat-send');
            const original = sendBtn.textContent;
            sendBtn.disabled = true;
            sendBtn.textContent = 'Envoi en cours…';

            addBubble(name + ' : ' + message, 'fchat-user');

            fetch('{{ route("contact.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    service: 'Chat en ligne',
                    message: message
                })
            }).then((resp) => {
                msgForm.reset();
                sendBtn.disabled = false;
                sendBtn.textContent = original;
                if (resp.ok) {
                    addBubble('✅ Message reçu ! Un technicien vous répond sous 24h.', 'fchat-bot');
                } else {
                    addBubble("⚠️ Informations invalides — vérifiez votre email et le message (min. 20 caractères).", 'fchat-bot');
                }
            }).catch(() => {
                sendBtn.disabled = false;
                sendBtn.textContent = original;
                addBubble("❌ Oups, l'envoi a échoué. Réessayez ou utilisez la page Contact.", 'fchat-bot');
            });
        });
    })();
</script>
