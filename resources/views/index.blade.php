<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigscreen Survey</title>
    @vite('resources/css/app.css') <!-- Inclusion du fichier CSS généré par Vite -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Styles CSS personnalisés */
        body {
            background-color: #f8f9fa; /* Couleur de fond de la page */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .logo {
            /* Styles pour le logo */
            max-width: 200px; /* Ajuste la largeur du logo */
            margin-bottom: 20px; /* Espace sous le logo */
        }
        /* Styles pour le pied de page */
        .footer {
            background-color: #343a40; /* Couleur de fond du footer */
            color: #fff; /* Couleur du texte du footer */
        }
    </style>
</head>
<body> <!-- Supprimez la classe h-100 de html -->
    <main id="app" class="flex-grow-1"> <!-- Utilisez la classe flex-grow-1 pour que le contenu principal (main) occupe l'espace restant -->
        <div class="container d-flex flex-column align-items-center justify-content-center">
            <!-- Logo -->
            <img src="/images/logo.png" alt="Logo Bigscreen" class="logo mt-4">
            
            <!-- Insertion des routes Vue.js -->
            <router-view></router-view>
        </div>
    </main>
    <footer class="footer py-3"> <!-- Ajoutez des classes pour styliser le footer -->
        <div class="container text-center">
            <span class="text-light">Explorez Demain, Aujourd'hui : La VR à son Meilleur.</span>
        </div>
    </footer>
    @vite('resources/js/app.js') <!-- Inclusion du fichier JavaScript généré par Vite -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
