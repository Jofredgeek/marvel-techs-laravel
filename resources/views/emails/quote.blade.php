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
            background: linear-gradient(135deg, #a78bfa, #34d399);
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
            min-width: 130px;
            font-size: 14px;
        }

        .value {
            color: #475569;
            font-size: 14px;
        }

        .details-box {
            background: #f8fafc;
            border-left: 3px solid #a78bfa;
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
            <h1>💼 Nouvelle demande de devis</h1>
            <p style="color: #0f172a; margin: 4px 0 0; font-size: 14px;">Marvel Tech's — Formulaire de devis</p>
        </div>
        <div class="body">
            <div class="row"><span class="label">👤 Nom</span><span class="value">{{ $quote->name }}</span></div>
            <div class="row"><span class="label">✉️ Email</span><span class="value"><a
                        href="mailto:{{ $quote->email }}">{{ $quote->email }}</a></span></div>
            <div class="row"><span class="label">📞 Téléphone</span><span class="value">{{ $quote->phone }}</span></div>
            @if($quote->company)
            <div class="row"><span class="label">🏢 Entreprise</span><span class="value">{{ $quote->company }}</span>
            </div>
            @endif
            <div class="row"><span class="label">🛠️ Service</span><span class="value">{{ $quote->service }}</span>
            </div>
            <div class="row"><span class="label">💰 Budget</span><span class="value">{{ $quote->budget }}</span></div>
            @if($quote->deadline)
            <div class="row"><span class="label">📅 Délai souhaité</span><span class="value">{{
                    $quote->deadline->format('d/m/Y') }}</span></div>
            @endif
            <div class="details-box"><strong>Détails du projet :</strong><br><br>{{ $quote->details }}</div>
        </div>
        <div class="footer">
            Reçu le {{ $quote->created_at->format('d/m/Y à H:i') }} · <a href="{{ route('admin.quotes.index') }}">Voir
                dans l'admin</a>
        </div>
    </div>
</body>

</html>