<template>
    <div>
      <!-- Barre de navigation fixe à gauche -->
      <nav class="sidebar">
        <div class="d-flex align-items-center justify-content-center sidebar-logo">
          <img src="../../../assets/logo.png" alt="Logo Bigscreen" class="logo">
        </div>
        <ul class="nav flex-column align-items-center">
          <li class="nav-item">
            <router-link :to="{ name: 'home-view' }" class="nav-link">
              <i class="bi bi-house"></i> <span class="d-none d-sm-inline">Accueil</span>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{ name: 'questions-view' }" class="nav-link">
              <i class="bi bi-house"></i> <span class="d-none d-sm-inline">Questions</span>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{ name: 'answers-view' }" class="nav-link">
              <i class="bi bi-house"></i> <span class="d-none d-sm-inline">Réponses</span>
            </router-link>
          </li>
        </ul>
      </nav>
  
      <!-- Zone de contenu à droite qui peut défiler -->
      <div class="content">
        <router-view></router-view>
      </div>
    </div>
  </template>
  
  <style scoped>
  .sidebar {
    width: 250px;
    position: fixed;
    height: 100%;
    background-color: #343a40;
    color: white;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .sidebar-logo img {
    max-width: 80px; 
    margin-bottom: 20px;
  }
  
  .nav {
    list-style: none;
    padding: 0;
    text-align: center;
  }
  
  .nav-item {
    margin-bottom: 10px;
  }
  
  .nav-link {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 5px;
  }
  
  .nav-link:hover {
    background-color: #495057;
  }
  
  .content {
    margin-left: 250px; 
    padding: 20px;
  }
  
  @media (max-width: 768px) {
    .sidebar {
      width: 100%;
      position: relative;
      height: auto;
      padding: 10px;
    }
  
    .content {
      margin-left: 0;
    }
  }
  </style>
  