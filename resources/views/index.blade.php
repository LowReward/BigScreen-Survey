<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigscreen Survey</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Styles CSS personnalisés */
        body {
            background-color: #f8f9fa; /* Couleur de fond de la page */
        }
        .logo {
            /* Styles pour le logo */
            max-width: 200px; /* Ajuste la largeur du logo */
            margin-bottom: 20px; /* Espace sous le logo */
        }
        .footer {
            /* Styles pour le footer */
            background-color: #343a40; /* Couleur de fond du footer */
            color: white; /* Couleur du texte du footer */
            padding: 10px; /* Espace intérieur du footer */
            text-align: center; /* Centrer le texte du footer */
        }
    </style>
</head>
<body>

    <main id="app">
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <!-- Logo -->
        <img src="/images/logo.png" alt="Logo Bigscreen" class="logo mt-4">
            
            <!-- Insertion des routes Vue.js -->
            <router-view></router-view>
        </div>
    </main>
    <footer class="footer">
        Explorez Demain, Aujourd'hui : La VR à son Meilleur.
    </footer>
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>
