<template>
    <div>
      <h1>Réponses</h1>
      <div v-for="(reponses, uuid) in reponsesGroupedByUUID" :key="uuid">
        <h2>UUID: {{ uuid }}</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Numéro de la question</th>
              <th>Corps de la question</th>
              <th>Réponse en texte</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(reponse, index) in reponses" :key="index">
              <td>{{ reponse.question_id }}</td>
              <td>{{ reponse.question.body }}</td>
              <td>{{ reponse.response_text }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
  <script>
  import axiosClient from '../../plugins/axios.js';
  
  export default {
    data() {
      return {
        reponsesGroupedByUUID: {}, // Objet pour stocker les réponses groupées par UUID
      };
    },
    mounted() {
      // Effectue une requête Axios GET pour récupérer les réponses groupées par UUID depuis votre API
      axiosClient.get('/api/reponses-grouped')
        .then(response => {
          this.reponsesGroupedByUUID = response.data; // Met à jour l'objet avec les réponses groupées par UUID
        })
        .catch(error => {
          console.error(error);
        });
    },
  };
  </script>
  