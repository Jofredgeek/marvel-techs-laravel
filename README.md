# Marvel Tech's — Solutions IT Modernes

Marvel Tech's est un site web d'entreprise "neo-dark developer" construit avec **Laravel 12**, **Tailwind CSS v4** et **Alpine.js**. Le site est conçu pour une entreprise de services IT (Maintenance, Réseaux, Cloud, Cybersécurité).

![Marvel Tech's Preview](https://via.placeholder.com/1200x630/0f172a/22d3ee?text=Marvel+Tech's+Neo-Dark+IT+Solutions)

## ✨ Fonctionnalités

- **Design Neo-Dark** : Esthétique moderne avec effets de "glassmorphism", lueurs néon et animations fluides.
- **Gestion de Contenu (Admin)** : Panel d'administration complet pour gérer :
  - **Services** : Catalogue des services IT avec icônes et détails techniques.
  - **Portfolio** : Vitrine des réalisations avec filtrage dynamique (Alpine.js).
  - **Blog** : Blog technique avec catégories et tags.
  - **Contacts & Devis** : Gestion des messages et demandes de devis clients.
- **Formulaire de Devis Intelligent** : Formulaire multi-étapes avec protection anti-spam (Honeypot).
- **Entièrement Responsive** : Optimisé pour mobile, tablette et desktop.
- **Performance** : Utilisation de Vite pour la compilation ultra-rapide des assets.
- **Authentification complète** : inscription e-mail, connexion Google et code OTP par SMS ou WhatsApp.
- **Espaces séparés** : tableau de bord client et administration protégée par rôle.
- **Back-office de pilotage** : statistiques, journal d’activité, suivi du trafic,
  connexions, utilisateurs, messages, devis et contenus.

## 🛠️ Stack Technique

- **Backend** : Laravel 12 (PHP 8.2+)
- **Frontend** : Blade Templates, Tailwind CSS v4, Alpine.js
- **Database** : SQLite / MySQL / PostgreSQL (Configurable via .env)
- **Auth** : Laravel Breeze, Socialite, Twilio Verify

## 🚀 Installation Locale

### 1. Prérequis
- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite (par défaut) ou un autre driver DB.

### 2. Cloner le projet
```bash
git clone <repository-url>
cd marveltechs
```

### 3. Dépendances PHP & JS
```bash
composer install
npm install
```

### 4. Configuration Environnement
```bash
cp .env.example .env
php artisan key:generate
```
*Note: Si vous utilisez SQLite, assurez-vous que `database/database.sqlite` existe.*

### 5. Migration & Seed (Données de démo)
```bash
php artisan migrate --seed
```
Définissez `ADMIN_EMAIL` et `ADMIN_PASSWORD` dans `.env` avant cette étape. Si
`ADMIN_PASSWORD` est vide, le seeder génère un mot de passe robuste et l'affiche
une seule fois dans le terminal.

### 6. Compilation des Assets
```bash
npm run build
```

### 7. Lancer le serveur
```bash
php artisan serve
```
Accédez au site sur [http://127.0.0.1:8000](http://127.0.0.1:8000)

## 🔐 Connexion Google et OTP téléphone

Le mode local fonctionne immédiatement avec `PHONE_VERIFICATION_DRIVER=log` :
le code apparaît sur la page de vérification et dans `storage/logs/laravel.log`.
Ce mode ne doit pas être utilisé en production.

Pour Google, créez un client OAuth Web dans Google Cloud et ajoutez exactement
`https://votre-domaine/auth/google/callback` aux URI de redirection autorisés :

```dotenv
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI="${APP_URL}/auth/google/callback"
```

Pour les OTP réels, créez un service Twilio Verify compatible SMS/WhatsApp :

```dotenv
PHONE_VERIFICATION_DRIVER=twilio
TWILIO_ACCOUNT_SID=
TWILIO_AUTH_TOKEN=
TWILIO_VERIFY_SERVICE_SID=
```

Après toute modification de `.env`, exécutez `php artisan config:clear`.

## 📁 Structure du Projet

- `app/Models` : Modèles avec casting JSON pour les tags/features.
- `app/Http/Controllers` : Logique métier public et admin.
- `resources/views/components` : Composants Blade (SectionTitle, Badge, Button, Layout).
- `resources/css/app.css` : Design system personnalisé (Utilities neo-dark).
- `database/migrations` : Schémas pour Services, Projets, Posts, Contacts et Devis.

## 🛡️ Sécurité
- Protection CSRF sur tous les formulaires.
- Honeypot sur le formulaire de devis.
- Limitation des tentatives de connexion et d’envoi OTP.
- Codes OTP à durée limitée, jamais stockés en clair.
- Routes administratives protégées par les middlewares `auth` et `admin`.
- Adresses IP du journal d’activité pseudonymisées par hachage.
- Un administrateur ne peut pas supprimer son propre rôle ni le dernier accès admin.

---
Produit par **Marvel Tech's** — *L'excellence technologique au service de votre business.*
