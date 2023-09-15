<template>

    <div class="container">
      <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-6">
          <div class="card mt-5">
            <div class="card-body text-center">
              <h1 class="card-title">404</h1>
              <p class="card-text">Aucune page trouvé, désolé.</p>
              <router-link to="/" class="btn btn-primary">Acceuil</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  
    
  
   
    
  <script>
  export default {
    name: 'PageNotFound',
  }
  </script>
  
  <style scoped>
  .card {
    width: 100%;
  }
  </style>
    