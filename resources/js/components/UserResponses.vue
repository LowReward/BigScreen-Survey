<template>
    <div>
      <!-- Affiche les réponses ici -->
      <div v-for="(response, index) in userResponses" :key="index">
        <!-- Affiche les détails de chaque réponse | Pour l'instant en simple test -->
        <p>{{ response.question_id }}</p>
        <p>{{ response.response_text }}</p>
        <p>{{ response.response_numeric }}</p>
        <!-- ... autres détails à rajouter ... -->
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
  