<!DOCTYPE html>
<html lang="en" class="h-100">
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
    <footer class="footer mt-auto py-3 bg-dark text-center">
      <div class="container">
        <span class="text-light">Explorez Demain, Aujourd'hui : La VR à son Meilleur.</span>
      </div>
    </footer>
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
</body>
</html>
