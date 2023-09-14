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
              <td>{{ reponse.question.id }}</td>
              <td>{{ reponse.question.body }}</td>
              <td>
                <!-- Vérifie le type de réponse et affichez la valeur appropriée -->
                <span v-if="reponse.question.type === 'B'">{{ reponse.response_text }}</span>
                <span v-else-if="reponse.question.type === 'C'">{{ reponse.response_numeric }}</span>
                <span v-else-if="reponse.question.type === 'A'">{{ reponse.response_option_ids }}</span>
              </td>
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
      // Effectue une requête Axios GET pour récupérer les réponses groupées par UUID depuis l'API
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
  