<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Définit l'encodage du document HTML -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Définit la vue initiale et l'échelle pour les appareils mobiles -->
    <title>Bigscreen Login</title> <!-- Définit le titre de la page -->
    @vite('resources/css/app.css') <!-- Inclusion du fichier CSS généré par Vite -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> <!-- Inclusion de la bibliothèque CSS Bootstrap depuis un CDN -->
</head>
<body>
    <main id="app">
        <router-view></router-view> <!-- Point d'entrée pour l'application Vue.js (via Vue Router) -->
    </main>
    @vite('resources/js/app.js') <!-- Inclusion du fichier JavaScript généré par Vite -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> <!-- Inclusion de la bibliothèque JavaScript Bootstrap depuis un CDN -->
</body>
</html>
