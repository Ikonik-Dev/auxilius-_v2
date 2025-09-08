# 🎨 Système de Design Atomic - Auxilius

## Vue d'ensemble

Ce projet utilise une approche **Design Atomic** pour organiser et structurer les composants d'interface utilisateur. Le système est organisé en 5 niveaux hiérarchiques :

-   **Atomes** : Éléments de base (boutons, inputs, etc.)
-   **Molécules** : Combinaisons d'atomes (groupes de formulaires, etc.)
-   **Organismes** : Composants complexes (navigation, cartes, etc.)
-   **Templates** : Structures de mise en page
-   **Pages** : Instances spécifiques des templates

## 🏗️ Structure des fichiers

```
assets/styles/design-system/
├── 00-settings/
│   └── _settings.css          # Variables CSS globales
├── 01-tools/
│   └── _tools.css            # Classes utilitaires et helpers
├── 02-generic/
│   └── _generic.css          # Reset CSS et styles de base
├── 03-elements/
│   └── _elements.css         # Styles des éléments HTML
├── 04-objects/
│   └── _objects.css          # Patterns de mise en page
├── 05-components/
│   └── _components.css       # Composants complexes
├── 06-utilities/
│   └── _utilities.css        # Classes utilitaires
└── design-system.css         # Point d'entrée principal

templates/design-system/
├── atoms/
│   └── _atoms.html.twig      # Macros Twig pour les atomes
├── molecules/
│   └── _molecules.html.twig  # Macros Twig pour les molécules
├── organisms/
│   └── _organisms.html.twig  # Macros Twig pour les organismes
├── templates/
│   ├── layout.html.twig      # Template de layout principal
│   └── dashboard.html.twig   # Template pour les dashboards
└── pages/
    └── design-system-demo.html.twig  # Page de démonstration
```

## 🎨 Thème Glassmorphism

Le système utilise un thème **Glassmorphism** moderne avec :

-   **Fond dégradé** : Dégradé bleu-violet
-   **Effets de verre** : `backdrop-filter: blur()` et transparence
-   **Bordures subtiles** : Bordures semi-transparentes
-   **Ombres douces** : Ombres avec effet de profondeur
-   **Animations fluides** : Transitions et animations CSS

### Variables CSS principales

```css
:root {
    /* Couleurs */
    --color-primary: #6366f1;
    --color-secondary: #06b6d4;
    --glass-bg: rgba(255, 255, 255, 0.1);
    --glass-border: rgba(255, 255, 255, 0.2);

    /* Typographie */
    --font-family-primary: "Inter", sans-serif;
    --font-size-base: 1rem;
    --line-height-relaxed: 1.75;

    /* Espacement */
    --spacing-4: 1rem;
    --spacing-6: 1.5rem;

    /* Bordures et rayons */
    --border-radius-lg: 0.5rem;
    --shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}
```

## 📱 Utilisation des composants

### Atomes

```twig
{# Bouton #}
{{ atoms.button('Cliquez-moi', 'primary') }}

{# Champ de saisie #}
{{ atoms.input('email', 'email', 'votre@email.com') }}

{# Badge #}
{{ atoms.badge('Nouveau', 'primary') }}
```

### Molécules

```twig
{# Groupe de formulaire #}
{{ molecules.form_group('username', 'Nom d\'utilisateur', 'text', 'Votre nom') }}

{# Carte d'information #}
{{ molecules.info_card('Titre', 'Contenu de la carte') }}

{# Champ de recherche #}
{{ molecules.search_input('search', 'Rechercher...') }}
```

### Organismes

```twig
{# Navigation principale #}
{{ organisms.navbar('Auxilius', navigation_links, user) }}

{# Header de page #}
{{ organisms.page_header('Titre', 'Sous-titre', actions) }}

{# Carte de statistiques #}
{{ organisms.stat_card('Utilisateurs', '1,234', icon_path) }}
```

## 🏗️ Templates

### Layout principal

```twig
{% extends 'design-system/templates/layout.html.twig' %}

{% block content %}
  <!-- Votre contenu ici -->
{% endblock %}
```

### Template Dashboard

```twig
{% extends 'design-system/templates/dashboard.html.twig' %}

{% block title %}Mon Dashboard{% endblock %}

{% block dashboard_content %}
  <!-- Contenu du dashboard -->
{% endblock %}
```

## 🎯 Classes utilitaires

Le système inclut des classes utilitaires pour un développement rapide :

```html
<!-- Espacement -->
<p class="mt-4 mb-6">Texte avec marges</p>

<!-- Flexbox -->
<div class="flex justify-between items-center">
    <span>Élément 1</span>
    <span>Élément 2</span>
</div>

<!-- Couleurs -->
<h1 class="text-primary">Titre principal</h1>
<p class="text-gray-600">Texte secondaire</p>

<!-- Dimensions -->
<div class="w-full h-64">Conteneur plein</div>
```

## 📱 Responsive Design

Le système est entièrement responsive avec des breakpoints :

-   `sm`: 640px
-   `md`: 768px
-   `lg`: 1024px
-   `xl`: 1280px
-   `2xl`: 1536px

```css
.grid-responsive {
    display: grid;
    grid-template-columns: 1fr;
}

@media (min-width: 768px) {
    .grid-responsive {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .grid-responsive {
        grid-template-columns: repeat(3, 1fr);
    }
}
```

## 🌙 Mode sombre

Le système supporte automatiquement le mode sombre :

```css
@media (prefers-color-scheme: dark) {
    :root {
        --glass-bg: rgba(0, 0, 0, 0.2);
        --glass-border: rgba(255, 255, 255, 0.1);
    }
}
```

## 🚀 Démarrage rapide

1. **Importer le système** dans votre template :

    ```twig
    {% import 'design-system/atoms/_atoms.html.twig' as atoms %}
    {% import 'design-system/molecules/_molecules.html.twig' as molecules %}
    {% import 'design-system/organisms/_organisms.html.twig' as organisms %}
    ```

2. **Utiliser les composants** :

    ```twig
    {{ organisms.navbar('Mon App', navigation_links) }}
    {{ atoms.button('Action', 'primary') }}
    ```

3. **Appliquer les styles** :
    ```html
    <div class="glass-card p-6">
        <h2 class="text-white">Contenu</h2>
    </div>
    ```

## 📋 Checklist d'utilisation

-   [ ] Importer les macros Twig nécessaires
-   [ ] Étendre le bon template de base
-   [ ] Utiliser les classes utilitaires pour l'espacement
-   [ ] Tester la responsivité sur mobile
-   [ ] Vérifier l'accessibilité (contraste, focus)

## 🔧 Personnalisation

Pour personnaliser le thème :

1. **Modifier les variables** dans `_settings.css`
2. **Ajouter des composants** dans les fichiers appropriés
3. **Créer de nouvelles macros** Twig pour des composants spécifiques
4. **Étendre les classes utilitaires** selon les besoins

## 📚 Ressources

-   [Atomic Design Methodology](http://atomicdesign.bradfrost.com/)
-   [CSS Custom Properties](https://developer.mozilla.org/en-US/docs/Web/CSS/--*)
-   [Tailwind CSS](https://tailwindcss.com/) (inspiration pour les utilitaires)
-   [Glassmorphism Design](https://uxdesign.cc/glassmorphism-in-user-interfaces/)

---

_Ce système de design est spécifiquement adapté au projet Auxilius et suit les guidelines établies dans la documentation du projet._
