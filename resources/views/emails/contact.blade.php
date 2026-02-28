<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 24px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            max-width: 600px;
            margin: 0 auto;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .08);
        }

        .header {
            background: linear-gradient(135deg, #22d3ee, #a78bfa);
            padding: 28px 32px;
        }

        .header h1 {
            color: #050810;
            font-size: 22px;
            margin: 0;
            font-weight: 800;
        }

        .body {
            padding: 32px;
        }

        .row {
            display: flex;
            gap: 8px;
            margin-bottom: 14px;
        }

        .label {
            font-weight: 700;
            color: #0f172a;
            min-width: 120px;
            font-size: 14px;
        }

        .value {
            color: #475569;
            font-size: 14px;
        }

        .message-box {
            background: #f8fafc;
            border-left: 3px solid #22d3ee;
            padding: 16px;
            border-radius: 0 8px 8px 0;
            margin-top: 20px;
            font-size: 14px;
            color: #334155;
            line-height: 1.6;
        }

        .footer {
            background: #f8fafc;
            padding: 16px 32px;
            font-size: 12px;
            color: #94a3b8;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="header">
            <h1>📩 Nouveau message de contact</h1>
            <p style="color: #0f172a; margin: 4px 0 0; font-size: 14px;">Marvel Tech's — Formulaire de contact</p>
        </div>
        <div class="body">
            <div class="row"><span class="label">👤 Nom</span><span class="value">{{ $contact->name }}</span></div>
            <div class="row"><span class="label">✉️ Email</span><span class="value"><a
                        href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></span></div>
            @if($contact->phone)
            <div class="row"><span class="label">📞 Téléphone</span><span class="value">{{ $contact->phone }}</span>
            </div>
            @endif
            <div class="row"><span class="label">🛠️ Service</span><span class="value">{{ $contact->service }}</span>
            </div>
            @if($contact->budget)
            <div class="row"><span class="label">💰 Budget</span><span class="value">{{ $contact->budget }}</span></div>
            @endif
            <div class="message-box"><strong>Message :</strong><br><br>{{ $contact->message }}</div>
        </div>
        <div class="footer">
            Reçu le {{ $contact->created_at->format('d/m/Y à H:i') }} · <a
                href="{{ route('admin.contacts.index') }}">Voir dans l'admin</a>
        </div>
    </div>
</body>

</html>