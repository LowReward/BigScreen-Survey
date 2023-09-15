<template>
  <div>
    <h1>Réponses</h1>
    <!-- Boucle à travers les réponses groupées par UUID -->
    <div class="mt-5" v-for="(reponses, uuid) in reponsesGroupedByUUID" :key="uuid">
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
          <!-- Boucle à travers chaque réponse dans un groupe UUID donné -->
          <tr v-for="(reponse, index) in reponses" :key="index">
            <td>{{ reponse.question.id }}</td> <!-- Affiche l'ID de la question -->
            <td>{{ reponse.question.body }}</td> <!-- Affiche le corps de la question -->
            <td>
              <!-- Vérifie le type de réponse et affiche la valeur appropriée -->
              <span v-if="reponse.question.type === 'B' || reponse.question.type === 'A'">{{ reponse.response_text }}</span>
              <span v-else-if="reponse.question.type === 'C'">{{ reponse.response_numeric }}</span>
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
