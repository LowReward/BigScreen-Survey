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
          <tr v-for="(question, index) in questions" :key="index">
            <td>{{ index + 1 }}</td>
            <td>{{ question.body }}</td>
            <td>{{ question.type }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        questions: [], // Tableau pour stocker les questions récupérées
      };
    },
    mounted() {
      // Effectue une requête Axios GET pour récupérer les questions depuis votre API
      axios.get('/api/questions-list')
        .then(response => {
          this.questions = response.data; // Met à jour le tableau avec les questions récupérées
        })
        .catch(error => {
          console.error(error);
        });
    },
  };
  </script>
  