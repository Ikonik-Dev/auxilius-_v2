# 📋 AUXILIUS - Système de Suivi de Formation

## 🎯 Vue d'ensemble du projet

**Auxilius** est une plateforme de gestion et de suivi de formation développée pour notre structure de formation. L'objectif principal est de créer un écosystème numérique complet permettant de gérer l'ensemble du parcours des stagiaires, depuis leur inscription jusqu'à leur certification.

---

## 🏗️ Architecture actuelle

### Stack technique
- **Backend** : Symfony 6.x (PHP 8.4)
- **Frontend** : Twig, Bootstrap 5, Glassmorphism Design System
- **Base de données** : MySQL
- **Assets** : Webpack Encore, Sass/SCSS
- **Authentification** : Symfony Security

### Structure des rôles
- **ROLE_DEVELOPPEUR** : Accès complet à l'administration
- **ROLE_DIRECTEUR** : Tableau de bord direction, rapports globaux
- **ROLE_RESPONSABLE** : Gestion pédagogique, planning formations
- **ROLE_FORMATEUR** : Gestion des formations et suivi des stagiaires
- **ROLE_STAGIAIRE** : Accès au profil et suivi personnel

---

## ✅ Fonctionnalités actuellement implémentées

### 🔐 Système d'authentification
- [x] Inscription et connexion sécurisées
- [x] Gestion des rôles et permissions
- [x] Profils utilisateurs personnalisés
- [x] Changement de mot de passe
- [x] Session persistante (Remember me)

### 🎓 Gestion des formations
- [x] **Catalogue de formations** avec 2 catégories :
  - **Pré-qualifiant** : EAA (Élaboration projet professionnel), SA (Savoirs de base)
  - **Qualifiant** : Comptabilité, Gestionnaire de paie, DWWM
- [x] Pages détaillées pour chaque formation
- [x] Objectifs pédagogiques
- [x] Informations pratiques (durée, effectif, certification)

### 👤 Gestion des utilisateurs
- [x] Interface d'administration des utilisateurs
- [x] Création/modification/suppression d'utilisateurs
- [x] Attribution des rôles
- [x] Profils personnalisés avec pseudo

### 🎨 Interface utilisateur
- [x] Design Glassmorphism moderne et responsive
- [x] Mode sombre/clair automatique
- [x] Navigation intuitive avec permissions
- [x] Système de breadcrumb
- [x] Animations et micro-interactions

### 📞 Communication
- [x] Page de contact avec formulaire
- [x] Interface de services
- [x] Page d'accueil avec présentation

---

## 🚀 Roadmap - Fonctionnalités à développer

### 📊 Phase 1 : Dashboard et statistiques (Priorité HAUTE)

#### Dashboard Directeur
- [ ] **Statistiques globales**
  - Nombre total de stagiaires actifs/diplômés
  - Taux de réussite par formation
  - Évolution des inscriptions (graphiques)
  - Indicateurs de performance clés (KPI)

#### Dashboard Responsable Pédagogique
- [ ] **Suivi pédagogique**
  - Planning des formations en cours
  - Liste des formateurs et leurs charges
  - Suivi des progressions par groupe
  - Alertes sur les retards/absences

#### Dashboard Formateur
- [ ] **Gestion des groupes**
  - Liste des stagiaires assignés
  - Cahier de notes numérique
  - Suivi des progressions individuelles
  - Planning des cours

#### Dashboard Stagiaire
- [ ] **Suivi personnel**
  - Progression dans la formation
  - Notes et évaluations
  - Planning personnel
  - Documents de formation

### 📈 Phase 2 : Système de progression (Priorité HAUTE)

- [ ] **Modules de formation**
  - Découpage des formations en modules/chapitres
  - Système de validation par module
  - Prérequis entre modules

- [ ] **Évaluations**
  - Création d'évaluations par module
  - Notation automatique/manuelle
  - Historique des notes
  - Calcul de moyennes

- [ ] **Suivi de progression**
  - Barre de progression visuelle
  - Pourcentage d'avancement
  - Estimation temps restant
  - Jalons et objectifs

### 📚 Phase 3 : Contenu pédagogique (Priorité MOYENNE)

- [ ] **Bibliothèque de ressources**
  - Upload et gestion de documents
  - Vidéos de formation
  - Exercices interactifs
  - Liens externes

- [ ] **Planification**
  - Calendrier des formations
  - Réservation de salles
  - Gestion des horaires
  - Notifications automatiques

### 🎯 Phase 4 : Fonctionnalités avancées (Priorité BASSE)

- [ ] **Rapports et analytics**
  - Génération de rapports PDF
  - Exports Excel des données
  - Analyses prédictives
  - Comparaisons inter-formations

- [ ] **Communication avancée**
  - Messagerie interne
  - Notifications push
  - Forums de discussion
  - Système d'annonces

- [ ] **Intégrations**
  - API pour systèmes externes
  - Synchronisation avec logiciels RH
  - Intégration calendriers externes
  - Badges et certifications numériques

---

## 🗂️ Structure de données prévue

### Entités principales à créer

```php
// Formation (déjà partiellement implémentée)
- id, name, description, category, duration, max_students
- modules (OneToMany)
- sessions (OneToMany)

// Module
- id, name, description, order, formation_id
- lessons (OneToMany)
- evaluations (OneToMany)

// Session (groupe de formation)
- id, formation_id, formateur_id, start_date, end_date
- students (ManyToMany User)
- planning (OneToMany)

// Progression
- user_id, module_id, completion_date, score
- status (not_started, in_progress, completed)

// Evaluation
- id, module_id, type, questions, max_score
- results (OneToMany)

// Planning
- id, session_id, date, start_time, end_time
- room, type (cours, tp, evaluation)
```

---

## 🎨 Guidelines de développement

### Design System
- **Thème** : Glassmorphism 2025 (déjà implémenté)
- **Couleurs** : Palette moderne avec mode sombre
- **Typography** : Inter font family
- **Composants** : Bootstrap 5 + composants custom

### Architecture code
- **Contrôleurs** : Un contrôleur par domaine métier
- **Services** : Logique métier externalisée
- **Repositories** : Requêtes optimisées
- **Forms** : Symfony Forms pour validation
- **Tests** : PHPUnit pour la fiabilité

### Sécurité
- **CSRF** : Protection sur tous les formulaires
- **Validation** : Côté serveur + client
- **Permissions** : Voter Symfony pour l'autorisation
- **Audit** : Logs des actions sensibles

---

## 📋 Plan de développement suggéré

### Sprint 1 (2-3 semaines)
1. **Entités de base** : Formation, Module, Session
2. **Dashboard basique** : Structure et navigation
3. **Gestion des modules** : CRUD complet

### Sprint 2 (2-3 semaines)
1. **Système de progression** : Entité et logique
2. **Dashboard formateur** : Suivi des groupes
3. **Dashboard stagiaire** : Progression personnelle

### Sprint 3 (2-3 semaines)
1. **Évaluations** : Création et passage
2. **Statistiques** : Calculs et affichage
3. **Planning** : Calendrier de base

### Sprint 4 (2-3 semaines)
1. **Rapports** : Génération PDF/Excel
2. **Optimisations** : Performance et UX
3. **Tests** : Couverture complète

---

## 🔧 Configuration et déploiement

### Environnement de développement
- **Local** : Laragon (Windows) avec PHP 8.4, MySQL 8.0
- **Assets** : Yarn + Webpack Encore
- **Debug** : Symfony Profiler activé

### Déploiement (à prévoir)
- **Production** : Serveur Linux avec Apache/Nginx
- **Base de données** : MySQL optimisée
- **Assets** : CDN pour les fichiers statiques
- **Monitoring** : Logs centralisés

---

## 📞 Points de contact

### Équipe technique
- **Développeur principal** : Stephane ASSABY-PARIS
- **Architecture** : Symfony + Design System Glassmorphism
- **Support** : Documentation technique dans `/documentation/`

### Parties prenantes
- **Direction** : Tableaux de bord et KPI
- **Pédagogie** : Outils de suivi et planning
- **Formateurs** : Interface de gestion des groupes
- **Stagiaires** : Plateforme d'apprentissage

---

## 📅 Historique des versions

### v0.1.0 (Juillet 2025) - Version actuelle
- ✅ Base Symfony + authentification
- ✅ Système de rôles
- ✅ Catalogue de formations
- ✅ Design Glassmorphism
- ✅ Administration utilisateurs

### v0.2.0 (Prévu Août 2025)
- 🔄 Dashboards par rôle
- 🔄 Système de progression
- 🔄 Gestion des modules

### v1.0.0 (Prévu Octobre 2025)
- 🔄 Système complet de suivi
- 🔄 Évaluations et notes
- 🔄 Rapports et statistiques

---

*Document mis à jour le : 3 juillet 2025*  
*Prochaine révision prévue : septembre 2025* (à définir selon l'avancement du projet et les feedbacks des utilisateurs et de Romane)
```
