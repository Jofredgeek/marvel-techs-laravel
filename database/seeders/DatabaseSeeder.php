<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Post;
use App\Models\Project;
use App\Models\Quote;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Admin user ──────────────────────────────────────────────────────
        $adminEmail = env('ADMIN_EMAIL', 'admin@marveltechs.cm');

        $admin = User::where('email', $adminEmail)->first();

        if (! $admin) {
            $configuredPassword = env('ADMIN_PASSWORD');
            $adminPassword = $configuredPassword ?: Str::password(24);

            User::forceCreate([
                'email' => $adminEmail,
                'name' => 'Admin Marvel Tech\'s',
                'password' => Hash::make($adminPassword),
                'is_admin' => true,
            ]);

            if (! $configuredPassword) {
                $this->command?->warn("Mot de passe admin généré : {$adminPassword}");
            }
        } elseif (! $admin->is_admin) {
            $admin->forceFill(['is_admin' => true])->save();
        }

        // ─── Services ────────────────────────────────────────────────────────
        $services = [
            [
                'title' => 'Maintenance & Support IT',
                'slug' => 'maintenance-support-it',
                'icon' => '🔧',
                'sort_order' => 1,
                'excerpt' => 'Gardez votre infrastructure IT en parfait état. Interventions préventives et curatives, support utilisateurs, gestion des incidents.',
                'content' => "Chez Marvel Tech's, nous assurons la maintenance complète de votre parc informatique pour que vous puissiez vous concentrer sur votre cœur de métier.\n\nNos techniciens certifiés interviennent rapidement pour tout incident : panne matérielle, mise à jour système, optimisation des performances, ou simple assistance utilisateur.\n\nNous proposons des contrats de maintenance préventive avec des vérifications régulières pour anticiper les pannes avant qu'elles surviennent.",
                'features' => ['Support utilisateurs (helpdesk)', 'Maintenance préventive mensuelle', 'Gestion des incidents 24/7', 'Mises à jour système et sécurité', 'Inventaire du parc informatique', 'Rapports d\'activité mensuels', 'SLA garanti selon le plan'],
                'technologies' => ['Windows', 'Linux', 'macOS', 'Zabbix', 'Ansible', 'TeamViewer'],
            ],
            [
                'title' => 'Réseaux & Administration Systèmes',
                'slug' => 'reseaux-administration-systemes',
                'icon' => '🌐',
                'sort_order' => 2,
                'excerpt' => 'Conception, déploiement et administration de réseaux locaux, Wi-Fi, VPN et infrastructure serveur. Performance et fiabilité garanties.',
                'content' => "Votre réseau est l'épine dorsale de votre activité. Un réseau mal configuré coûte cher en termes de productivité et de sécurité.\n\nNous concevons et déployons des architectures réseau adaptées à votre contexte : LAN, WLAN, VLAN, VPN, DMZ. Chaque solution est documentée et optimisée pour vos besoins.\n\nNous administrons également vos serveurs Linux et Windows, gérons Active Directory, DNS, DHCP et tous les services réseau critiques.",
                'features' => ['Conception architecture réseau', 'Installation switches, routeurs', 'Configuration VLAN/OSPF/BGP', 'Mise en place VPN sécurisé', 'Administration Active Directory', 'Monitoring réseau (Zabbix/Nagios)', 'Documentation technique complète'],
                'technologies' => ['Cisco IOS', 'MikroTik', 'Pfsense', 'OPNsense', 'Wireshark', 'Nagios', 'OSPF', 'BGP'],
            ],
            [
                'title' => 'Développement Web & Mobile',
                'slug' => 'developpement-web-mobile',
                'icon' => '💻',
                'sort_order' => 3,
                'excerpt' => 'Sites vitrine, applications web sur mesure, API REST, applications mobiles. Des solutions digitales modernes, performantes et évolutives.',
                'content' => "Dans un monde de plus en plus digital, votre présence en ligne est cruciale. Nous développons des solutions web et mobiles modernes, performantes et adaptées à vos objectifs business.\n\nDe la conception UX/UI au déploiement en production, nous gérons l'ensemble du cycle de vie de votre application. Nos développeurs maîtrisent les dernières technologies et les meilleures pratiques du secteur.\n\nChaque projet est livré avec documentation technique, tests unitaires et formation utilisateur.",
                'features' => ['Sites vitrine & e-commerce', 'Applications web sur mesure', 'API REST & GraphQL', 'Applications mobiles (Android/iOS)', 'Progressive Web Apps (PWA)', 'Intégration systèmes tiers', 'SEO & optimisation performance'],
                'technologies' => ['Laravel', 'React', 'Vue.js', 'Node.js', 'React Native', 'Flutter', 'PostgreSQL', 'Redis'],
            ],
            [
                'title' => 'Cloud & DevOps',
                'slug' => 'cloud-devops',
                'icon' => '☁️',
                'sort_order' => 4,
                'excerpt' => 'Migration cloud, architecture AWS/Azure, CI/CD, conteneurisation Docker/Kubernetes. Scalabilité et haute disponibilité pour vos applications.',
                'content' => "Le cloud n'est plus une option, c'est une nécessité pour rester compétitif. Nous vous accompagnons dans votre transformation cloud, de la stratégie à l'exécution.\n\nNos ingénieurs certifiés AWS et Azure conçoivent des architectures cloud sécurisées, scalables et optimisées en coût. Nous mettons en place des pipelines CI/CD pour automatiser vos déploiements et accélérer votre time-to-market.\n\nAve Docker et Kubernetes, vos applications sont conteneurisées pour une portabilité et une résilience maximales.",
                'features' => ['Migration cloud (AWS/Azure)', 'Architecture multi-cloud', 'Conteneurisation Docker', 'Orchestration Kubernetes', 'CI/CD (GitHub Actions/Jenkins)', 'Infrastructure as Code (Terraform)', 'Monitoring & alerting (Grafana)'],
                'technologies' => ['AWS', 'Azure', 'Docker', 'Kubernetes', 'Terraform', 'Ansible', 'Jenkins', 'GitHub Actions'],
            ],
            [
                'title' => 'Cybersécurité & Audit',
                'slug' => 'cybersecurite-audit',
                'icon' => '🔐',
                'sort_order' => 5,
                'excerpt' => 'Audit de sécurité, tests de pénétration, hardening système, SIEM, formation sensibilisation. Protégez votre entreprise contre les cybermenaces.',
                'content' => "La cybersécurité n'est plus réservée aux grandes entreprises. Les PME sont aujourd'hui les premières cibles des cyberattaques. Marvel Tech's vous protège proactivement.\n\nNous réalisons des audits de sécurité complets : analyse de vulnérabilités, tests de pénétration, revue de configuration, vérification des politiques de sécurité. Chaque audit est suivi d'un rapport détaillé avec plan de remédiation priorisé.\n\nNous formons également vos équipes aux bonnes pratiques de cybersécurité pour réduire le risque humain.",
                'features' => ['Audit de sécurité complet', 'Tests de pénétration (pentest)', 'Hardening système & réseau', 'Mise en place SIEM (Splunk/ELK)', 'Politique de sécurité (PSSI)', 'Formation sensibilisation', 'Veille et gestion des CVE'],
                'technologies' => ['Nessus', 'Metasploit', 'Burp Suite', 'Wireshark', 'Fail2ban', 'Splunk', 'OpenVPN', 'Let\'s Encrypt'],
            ],
            [
                'title' => 'Installation & Déploiement',
                'slug' => 'installation-deploiement',
                'icon' => '🖥️',
                'sort_order' => 6,
                'excerpt' => 'Déploiement de postes de travail, serveurs, systèmes d\'exploitation, logiciels métier. Configuration clé-en-main pour une prise en main immédiate.',
                'content' => "Que vous ouvriez de nouveaux bureaux, renforcez votre équipe ou renouveliez votre parc matériel, Marvel Tech's prend en charge l'ensemble du déploiement.\n\nNous installons et configurons postes de travail, serveurs, systèmes d'exploitation, suites bureautiques et logiciels métier. Tout est prêt à l'emploi, documenté et formé avant notre départ.\n\nNous proposons également des images système standardisées (Golden Image) pour faciliter les déploiements massifs.",
                'features' => ['Déploiement de postes en masse', 'Installation serveurs physiques/virtuels', 'Migration de données', 'Configuration logiciels métier', 'Mise en place MDM', 'Formation utilisateurs finale', 'Documentation détaillée remise'],
                'technologies' => ['Windows Server', 'Ubuntu Server', 'Active Directory', 'WDS/MDT', 'VMware', 'Hyper-V', 'WSUS'],
            ],
            [
                'title' => 'Sauvegarde & Continuité d\'activité',
                'slug' => 'sauvegarde-continuite-activite',
                'icon' => '💾',
                'sort_order' => 7,
                'excerpt' => 'Stratégie de sauvegarde 3-2-1, PRA/PCA, réplication de données, tests de restauration. Zéro perte de données, continuité garantie.',
                'content' => "La perte de données peut paralyser une entreprise. Marvel Tech's met en place des solutions de sauvegarde robustes pour protéger votre capital informationnel.\n\nNous appliquons la règle d'or 3-2-1 : 3 copies de vos données, sur 2 supports différents, dont 1 hors site. Vos données critiques sont répliquées en temps réel et testées régulièrement.\n\nNous élaborons également votre Plan de Reprise d'Activité (PRA) et Plan de Continuité d'Activité (PCA) pour garantir la résilience de votre organisation face aux sinistres.",
                'features' => ['Stratégie de sauvegarde 3-2-1', 'Sauvegarde cloud chiffrée', 'Réplication temps réel', 'Plan de Reprise d\'Activité (PRA)', 'Plan de Continuité (PCA)', 'Tests de restauration réguliers', 'RPO/RTO définis et garantis'],
                'technologies' => ['Veeam', 'rsync', 'Bacula', 'AWS S3', 'Backblaze B2', 'Acronis', 'ZFS'],
            ],
        ];

        foreach ($services as $s) {
            Service::updateOrCreate(['slug' => $s['slug']], $s);
        }

        // ─── Projects ────────────────────────────────────────────────────────
        $projects = [
            [
                'title' => 'Refonte réseau Groupe Alatam',
                'slug' => 'refonte-reseau-groupe-alatam',
                'client' => 'Groupe Alatam', 'year' => 2024,
                'tags' => ['Réseau', 'Security'],
                'excerpt' => 'Refonte complète de l\'infrastructure réseau pour 3 sites avec VLAN, VPN inter-sites et firewall Pfsense.',
                'content' => "Le Groupe Alatam disposait d'un réseau vétuste, sans segmentation et exposé aux risques. Marvel Tech's a réalisé un audit complet et proposé une architecture moderne.\n\nNous avons déployé des switches Cisco manageable avec VLAN par département, un VPN inter-sites pour relier les 3 bureaux, et un firewall Pfsense avec règles strictes. Le résultat : performances améliorées de 60%, sécurité renforcée et zéro incident en 12 mois.",
                'cover_image' => '🌐', 'featured' => true,
            ],
            [
                'title' => 'Application de gestion StartupHub',
                'slug' => 'application-gestion-startuphub',
                'client' => 'StartupHub Yaoundé', 'year' => 2024,
                'tags' => ['Web', 'Cloud'],
                'excerpt' => 'Application web Laravel + Vue.js pour la gestion des membres, événements et ressources d\'un hub d\'innovation.',
                'content' => "StartupHub avait besoin d'une plateforme centralisée pour gérer 200+ startups membres, organiser des événements et partager des ressources.\n\nNous avons développé une application web complète avec Laravel (API) et Vue.js (front). Authentification multi-rôles, notifications email/SMS, tableau de bord analytique, et intégration paiement mobile money. Hébergée sur AWS avec CI/CD automatisé.",
                'cover_image' => '🚀', 'featured' => true,
            ],
            [
                'title' => 'Audit cybersécurité Cabinet MedPlus',
                'slug' => 'audit-cybersecurite-medplus',
                'client' => 'Cabinet MedPlus', 'year' => 2023,
                'tags' => ['Security'],
                'excerpt' => 'Audit complet de sécurité informatique avec tests de pénétration, identification de 3 failles critiques et plan de remédiation.',
                'content' => "MedPlus stocke des données de santé sensibles et souhaitait vérifier sa conformité et sa résistance aux cyberattaques.\n\nNotre équipe a réalisé un pentest complet (externe et interne), découvert 3 vulnérabilités critiques (dont une injection SQL majeure), et livré un rapport de 40 pages avec plan de remédiation priorisé. Formation de l'équipe IT incluse. Résultat : certification CNAM obtenue.",
                'cover_image' => '🔐', 'featured' => true,
            ],
            [
                'title' => 'Migration cloud Brosseries CAMTEX',
                'slug' => 'migration-cloud-camtex',
                'client' => 'CAMTEX Sarl', 'year' => 2023,
                'tags' => ['Cloud'],
                'excerpt' => 'Migration de l\'infrastructure on-premise vers AWS avec mise en place de l\'IaC Terraform et pipelines CI/CD.',
                'content' => "CAMTEX dépensait trop en infrastructure physique et souhaitait réduire ses coûts tout en gagnant en flexibilité.\n\nNous avons migré l'ensemble de l'infrastructure vers AWS (EC2, RDS, S3, CloudFront), mis en place l'infrastructure as code avec Terraform, et configuré des pipelines CI/CD avec GitHub Actions. Résultat : 35% de réduction des coûts infrastructure et déploiements quotidiens automatisés.",
                'cover_image' => '☁️', 'featured' => true,
            ],
            [
                'title' => 'Plateforme e-commerce Marché Actif',
                'slug' => 'plateforme-ecommerce-marche-actif',
                'client' => 'Marché Actif SA', 'year' => 2023,
                'tags' => ['Web', 'Mobile'],
                'excerpt' => 'Plateforme e-commerce complète avec application mobile, paiement mobile money intégré et tableau de bord vendeurs.',
                'content' => "Marché Actif voulait digitaliser son activité de marché de gros alimentaire. Nous avons développé une plateforme complète.\n\nSite e-commerce Laravel/Livewire + application mobile React Native pour iOS et Android. Intégration des paiements Orange Money et MTN MoMo. Tableau de bord vendeur pour gérer les stocks et commandes. Plus de 500 vendeurs inscrits dès le premier mois.",
                'cover_image' => '🛒', 'featured' => true,
            ],
            [
                'title' => 'Infrastructure sauvegarde Lycée Excellence',
                'slug' => 'infrastructure-sauvegarde-lycee',
                'client' => 'Lycée Excellence', 'year' => 2022,
                'tags' => ['Réseau', 'Security'],
                'excerpt' => 'Mise en place d\'une solution de sauvegarde 3-2-1 avec réplication cloud et PRA testé pour un établissement scolaire.',
                'content' => "Le Lycée Excellence avait perdu ses données scolaires suite à une panne disque. Aucune sauvegarde n'existait.\n\nNous avons déployé une solution Veeam avec sauvegardes locales sur NAS et réplication automatique chiffrée vers Backblaze B2. PRA rédigé et testé : temps de restauration complet < 2h. Formation de l'équipe IT incluse. Plus aucun incident depuis le déploiement.",
                'cover_image' => '💾', 'featured' => false,
            ],
        ];

        foreach ($projects as $p) {
            Project::updateOrCreate(['slug' => $p['slug']], $p);
        }

        // ─── Blog posts ──────────────────────────────────────────────────────
        $posts = [
            [
                'title' => '10 erreurs réseau qui ralentissent votre entreprise (et comment les corriger)',
                'slug' => '10-erreurs-reseau-entreprise',
                'category' => 'Réseaux',
                'tags' => ['réseau', 'performance', 'bonnes pratiques'],
                'cover_image' => '🌐',
                'excerpt' => 'Des câbles mal sertis aux configurations VLAN incorrectes : découvrez les erreurs réseau les plus fréquentes et leurs solutions.',
                'content' => "Un réseau lent ou instable peut coûter des milliers de francs CFA en productivité perdue chaque mois. Voici les 10 erreurs que nous rencontrons le plus souvent chez nos clients.\n\n## 1. Absence de segmentation VLAN\n\nSans VLAN, tout votre trafic circule sur le même réseau. Un poste infecté peut compromettre tous vos autres équipements. Segmentez au minimum : utilisateurs, serveurs, IoT, invités.\n\n## 2. Switch non manageable en entrée de réseau\n\nLes switches non manageables ne permettent aucun contrôle du trafic. Investissez dans des switches manageable Cisco ou MikroTik dès votre premier réseau de 5 postes.\n\n## 3. Mot de passe admin par défaut sur les équipements\n\nC'est la première chose que teste un attaquant. Changez TOUS les mots de passe par défaut immédiatement après installation.\n\n## 4. Pas de documentation réseau\n\nSi votre seul technicien réseau part, savez-vous redémarrer votre infrastructure ? Une documentation à jour est indispensable.\n\n## 5. Wi-Fi sans isolation invité\n\nVos visiteurs ne doivent jamais avoir accès à votre réseau interne. Créez systématiquement un SSID invité isolé.\n\nContactez Marvel Tech's pour un audit réseau gratuit de 15 minutes !",
                'published_at' => now()->subDays(5),
                'active' => true,
            ],
            [
                'title' => 'Cybersécurité en Afrique : état des lieux et bonnes pratiques pour les PME',
                'slug' => 'cybersecurite-afrique-pme',
                'category' => 'Cybersécurité',
                'tags' => ['sécurité', 'PME', 'Afrique', 'ransomware'],
                'cover_image' => '🔐',
                'excerpt' => 'Le continent africain est de plus en plus ciblé par les cyberattaques. Comment protéger votre PME sans exploser votre budget ?',
                'content' => "Les cyberattaques en Afrique ont augmenté de 230% en 3 ans selon les derniers rapports de l'INTERPOL. Les PME sont la cible principale car elles disposent de données précieuses mais d'une sécurité souvent insuffisante.\n\n## Pourquoi les PME africaines sont vulnérables\n\n1. Budget IT limité — la sécurité est souvent vue comme une dépense, pas un investissement\n2. Manque de compétences en interne\n3. Infrastructure vieillissante\n4. Sensibilisation insuffisante des employés\n\n## Les attaques les plus fréquentes\n\n**Ransomware** : vos données sont chiffrées, les attaquants réclament une rançon. En 2024, une PME camerounaise a perdu 15 millions FCFA ainsi.\n\n**Phishing** : 92% des cyberattaques commencent par un email frauduleux. Formez vos employés !\n\n**Compromission de compte** : mots de passe faibles ou réutilisés. Adoptez un gestionnaire de mots de passe.\n\n## 5 mesures immédiates pour 0 budget\n\n1. Activer l'authentification à deux facteurs sur tous les comptes critiques\n2. Mettre à jour tous les systèmes et logiciels\n3. Sauvegarder vos données selon la règle 3-2-1\n4. Former vos employés à reconnaître le phishing\n5. Changer tous les mots de passe par défaut\n\nMavel Tech's propose un audit de sécurité initial GRATUIT de 15 minutes. Prenez rendez-vous !",
                'published_at' => now()->subDays(12),
                'active' => true,
            ],
            [
                'title' => 'Laravel vs WordPress : quel choix pour votre projet web en 2025 ?',
                'slug' => 'laravel-vs-wordpress-2025',
                'category' => 'Développement Web',
                'tags' => ['Laravel', 'WordPress', 'développement web', 'choix technologique'],
                'cover_image' => '💻',
                'excerpt' => 'WordPress ou Laravel ? Ce choix impacte la scalabilité, la sécurité et les coûts de maintenance de votre projet. Notre analyse complète.',
                'content' => "Cette question revient souvent lors de nos rendez-vous clients : \"On nous a proposé WordPress, mais on hésite avec Laravel. Qu'est-ce que vous recommandez ?\"\n\nLa réponse honnête : **ça dépend**. Voici notre grille d'analyse.\n\n## Quand choisir WordPress\n\n✅ Site vitrine simple (moins de 10 pages)\n✅ Blog avec beaucoup de contenu éditorial\n✅ Budget très limité et délai court\n✅ L'équipe client veut gérer le contenu seule sans coder\n✅ Besoins couverts par des plugins existants\n\n❌ Application avec logique métier complexe\n❌ API consommée par une app mobile\n❌ Données sensibles (santé, finance)\n❌ Scalabilité à long terme\n\n## Quand choisir Laravel\n\n✅ Application web avec logique métier sur mesure\n✅ API REST pour une application mobile\n✅ E-commerce avec processus spécifiques\n✅ Tableau de bord avec rôles et permissions\n✅ Performance et scalabilité critiques\n\n## Notre recommandation\n\nPour un site vitrine : WordPress avec Elementor, géré par l'équipe marketing. Rapide et économique.\n\nPour une vraie application métier : Laravel, sans hésitation. La robustesse et la maintenabilité sur le long terme l'emportent.\n\nChez Marvel Tech's, nous maîtrisons les deux. On vous conseille honnêtement selon votre contexte, pas selon ce qu'on préfère coder.",
                'published_at' => now()->subDays(20),
                'active' => true,
            ],
            [
                'title' => 'Guide complet : migrer vers le cloud en 5 étapes sans tout casser',
                'slug' => 'migration-cloud-5-etapes',
                'category' => 'Cloud',
                'tags' => ['cloud', 'AWS', 'migration', 'DevOps'],
                'cover_image' => '☁️',
                'excerpt' => 'La migration cloud fait peur, mais bien planifiée, elle transforme votre infrastructure. Voici notre méthode en 5 étapes éprouvées.',
                'content' => "\"On veut aller sur le cloud, mais on ne sait pas par où commencer.\" C'est LA phrase qu'on entend le plus souvent.\n\nLa bonne nouvelle : une migration cloud réussie n'est pas magique, c'est une question de méthode.\n\n## Étape 1 : Audit de l'existant\n\nAvant de migrer quoi que ce soit, cartographiez l'existant. Inventaire complet : serveurs, applications, dépendances, flux de données. Identifier ce qui peut migrer tel quel (lift and shift) et ce qui doit être refactorisé.\n\n## Étape 2 : Choisir le bon cloud\n\nAWS reste le leader avec la couverture la plus large. Azure s'impose si vous êtes Microsoft-centrique. Google Cloud excelle pour les workloads machine learning. Pour les entreprises africaines, AWS avec région EU-WEST est souvent le meilleur compromis latence/prix.\n\n## Étape 3 : Architecture cible\n\nNe copiez pas bêtement votre architecture on-premise sur le cloud. Profitez des services managés : RDS plutôt qu'une VM MySQL, S3 pour le stockage fichiers, CloudFront pour le CDN.\n\n## Étape 4 : Migration progressive\n\nCommencez par les applications non critiques. Validez, apprenez, ajustez. Puis migrez progressivement les systèmes critiques avec des stratégies blue/green ou canary release.\n\n## Étape 5 : Optimisation continue\n\nLe cloud est vivant. Révisez votre architecture chaque trimestre, ajustez les types d'instances, activez les réservations pour 40-70% d'économies.\n\nMarvel Tech's accompagne votre migration de A à Z. Contactez-nous pour une évaluation gratuite.",
                'published_at' => now()->subDays(30),
                'active' => true,
            ],
            [
                'title' => 'Zabbix vs Nagios : quel outil de monitoring choisir pour votre réseau ?',
                'slug' => 'zabbix-vs-nagios-monitoring',
                'category' => 'Réseaux',
                'tags' => ['monitoring', 'Zabbix', 'Nagios', 'infrastructure'],
                'cover_image' => '📡',
                'excerpt' => 'Surveiller son infrastructure est indispensable. Comparatif détaillé entre Zabbix et Nagios pour vous aider à choisir.',
                'content' => "Un incident réseau non détecté, c'est du chiffre d'affaires perdu. Le monitoring n'est pas une option.\n\nVoici notre comparatif entre les deux outils open source les plus populaires.\n\n## Zabbix\n\n**Points forts :**\n- Interface moderne et intuitive\n- Auto-découverte des équipements réseau\n- Rapports et graphiques intégrés très complets\n- Support SNMP, IPMI, JMX natif\n- Templates pré-configurés pour des centaines d'équipements\n\n**Points faibles :**\n- Consommation mémoire plus élevée\n- Courbe d'apprentissage initiale\n\n## Nagios\n\n**Points forts :**\n- Léger et très stable\n- Écosystème de plugins immense (plus de 5000)\n- Idéal pour les petites infrastructures\n- Documentation abondante\n\n**Points faibles :**\n- Interface vieillissante\n- Configuration en fichiers texte complexe\n- Pas de rapports natifs élaborés\n\n## Notre recommandation\n\nPour une infrastructure réseau professionnelle de plus de 20 équipements : **Zabbix**. La richesse des features et la facilité d'administration l'emportent largement.\n\nPour une petite infrastructure simple : **Nagios Core** suffit amplement.\n\nMarvel Tech's déploie et configure les deux selon votre contexte.",
                'published_at' => now()->subDays(45),
                'active' => true,
            ],
        ];

        foreach ($posts as $p) {
            Post::updateOrCreate(['slug' => $p['slug']], $p);
        }

        // ─── Sample contacts ──────────────────────────────────────────────────
        Contact::firstOrCreate(['email' => 'paul.essomba@alatam.cm'], [
            'name' => 'Paul Essomba', 'phone' => '+237 677 123 456',
            'service' => 'Réseaux & Administration Systèmes', 'budget' => '500 000 – 2 000 000 FCFA',
            'message' => 'Nous souhaitons revoir notre infrastructure réseau pour nos 3 sites de Yaoundé. Pouvez-vous nous proposer un audit ?',
            'read' => true,
        ]);

        Contact::firstOrCreate(['email' => 'sophie.mvondo@startuphub.cm'], [
            'name' => 'Sophie Mvondo', 'phone' => '+237 699 234 567',
            'service' => 'Développement Web & Mobile', 'budget' => '500 000 – 2 000 000 FCFA',
            'message' => 'Bonjour, je cherche une équipe pour développer une application de gestion pour notre hub. Disponibles pour un rendez-vous ?',
            'read' => false,
        ]);

        // ─── Sample quotes ────────────────────────────────────────────────────
        Quote::firstOrCreate(['email' => 'jb.nkuimi@medplus.cm'], [
            'name' => 'Jean-Baptiste Nkuimi', 'phone' => '+237 655 345 678',
            'company' => 'Cabinet MedPlus', 'service' => 'Cybersécurité & Audit',
            'budget' => '500 000 – 2 000 000 FCFA',
            'details' => 'Nous stockons des données patients sensibles et souhaitons valider notre sécurité informatique. Nous avons besoin d\'un audit complet avec rapport et plan de remédiation.',
            'status' => 'accepted', 'read' => true,
        ]);
    }
}
