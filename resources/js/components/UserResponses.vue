<template>
  <div class="mt-4 mb-4 d-flex ">
    <div class="jumbotron">
        <div >
          <h1 class="display-4">Merci d'avoir précedemment participer à notre sondage</h1>
          <!-- Texte à revoir selon le brief -->
          <p class="lead">Voici un rappel de vos réponses :</p>
        </div>
        <div v-for="(response, index) in userResponses" :key="index" class="mb-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{ response.question_title }}</h4>
              <div>
                <p class="card-text text-muted">{{ response.response_text }}</p>
                <p class="card-text text-muted">{{ response.response_numeric }}</p>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        userResponses: [], // Un tableau pour stocker les réponses de l'utilisateur
        uuid: this.$route.params.uuid,  // Récupère l'uuid en url
      };
    },
    created() {
      // Appelle la méthode pour récupérer les réponses ici
      this.fetchUserResponses();
    },
    methods: {
      async fetchUserResponses() {
        try {
          // Effectue une requête Axios GET pour récupérer les réponses du serveur
          const response = await axios.get(`/api/view-responses/${this.uuid}`); // Remplace uuid par la valeur de l'UUID de l'utilisateur
  
          // Met à jour le tableau userResponses avec les réponses obtenues
          this.userResponses = response.data;
        } catch (error) {
          console.error(error);
        }
      },
    },
  };
  </script>
  