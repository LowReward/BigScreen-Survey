<template>
<div class="container-fluid">
    <div class="row">
        <!-- Barre de navigation fixe à gauche -->
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark sidebar">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white ">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Accueil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Questionnaire</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Réponse</span>
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>

        <!-- Zone de contenu à droite qui peut défiler -->
        <div class="col py-3" id="app">
            <router-view></router-view>
        </div>
    </div>
</div>
</template>

<script>
</script>


<style>
.sidebar {
    min-height: 100vh; /* Hauteur minimale de 100% de la hauteur de la fenêtre */
    display: flex;
    flex-direction: column;
}

.sidebar .flex-grow-1 {
    flex-grow: 1; /* Le contenu de la sidebar s'étirera pour occuper l'espace restant */
}
</style>