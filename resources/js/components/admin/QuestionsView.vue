<template>
  <div>
    <h1>Questions</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Numéro</th>
          <th>Corps de la question</th>
          <th>Type de question</th>
        </tr>
      </thead>
      <tbody>
        <!-- Utilisation de v-for pour boucler à travers les questions -->
        <tr v-for="(question, index) in questions" :key="index">
          <td>{{ index + 1 }}</td> <!-- Affiche le numéro de la question (index + 1) -->
          <td>{{ question.body }}</td> <!-- Affiche le corps de la question -->
          <td>{{ question.type }}</td> <!-- Affiche le type de la question -->
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axiosClient from '../../plugins/axios.js';

export default {
data() {
  return {
    questions: [], // Tableau pour stocker les questions récupérées
  };
},
mounted() {
  // Effectue une requête Axios GET pour récupérer les questions depuis votre API
  axiosClient.get('/api/questions-list')
    .then(response => {
      this.questions = response.data; // Met à jour le tableau avec les questions récupérées depuis l'API
    })
    .catch(error => {
      console.error(error);
    });
},
};
</script>
