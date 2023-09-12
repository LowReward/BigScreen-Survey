

<template>
    <div class="container mt-5">
      <div class="jumbotron">
        <!-- Affiche notre composant ThanksMessage avoir à faire de redirection grace à un toggle -->
        <thanks-message v-if="showThanksMessage"></thanks-message>
        <div v-else>
          <div class="bg-secondary">
            <h1 class="display-4">Bienvenue sur Bigscreen</h1>
            <!-- Texte à revoir selon le brief -->
            <p class="lead">Voici le formulaire à remplir :</p>
          </div>
          <div v-for="(question, index) in questions" :key="index" class="mb-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{ question.title }}</h4>
                <p class="card-text text-muted">{{ question.body }}</p>
    
                <div v-if="question.type === 'A'">
                  <!-- Question de type A (choix multiple) -->
                  <div v-for="(option, optionIndex) in question.options" :key="optionIndex" class="form-check">
                    <input type="checkbox" :name="`question_${question.id}[]`" :value="option" class="form-check-input" v-model="selectedOptions[question.id]">
                    <label class="form-check-label">{{ option }}</label>
                  </div>
                </div>
    
                <div v-else-if="question.type === 'B'">
                  <!-- Question de type B (champ de saisie) -->
                  <input type="text" :name="`question_${question.id}`" class="form-control" :maxlength="255" required v-model="textInput[question.id]">
                </div>
    
                <div v-else-if="question.type === 'C'">
                  <!-- Question de type C (choix numérique) -->
                  <input type="number" :name="`question_${question.id}`" class="form-control" :min="1" :max="5" required v-model="numericInput[question.id]">
                </div>
              </div>
            </div>
          </div>
          
          <button class="btn btn-primary" @click="submitForm">Valider</button>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>


  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import ThanksMessage from  './addons/ThanksMessage.vue'
  

  // Première tentative pour l'index vue
  const questions = ref([]);
  const textInput = {};
  const selectedOptions = {};
  const numericInput = {};
  const showThanksMessage = ref(false); // Booléen servant à faire switcher notre composant
  
  onMounted(async () => {
    try {
      const response = await axios.get('/api/questions');
      questions.value = response.data;
    } catch (error) {
      console.error(error);
    }
  });
  
  const submitForm = async () => {
    try {
      const responses = [];
  
      for (const question of questions.value) {
        if (question.type === 'A') {
          // Traitement pour les questions de type A (choix multiples)
          // Recuperation des réponses sélectionnées depuis selectedOptions
          responses.push({
            questionId: question.id,
            type: 'A',
            options: selectedOptions[question.id],
          });
        } else if (question.type === 'B') {
          // Traitement pour les questions de type B (champ de saisie)
          // Recuperation des réponse depuis textInput
          responses.push({
            questionId: question.id,
            type: 'B',
            responseText: textInput[question.id],
          });
        } else if (question.type === 'C') {
          // Traitement pour les questions de type C (choix numérique)
          // Recuperation des réponse depuis numericInput
          responses.push({
            questionId: question.id,
            type: 'C',
            responseNumeric: numericInput[question.id],
          });
        }
      }
  
      // Envoie des réponses au serveur
      await axios.post('/api/save-responses', { responses });
      // Passe la valeur de notre booléen à true afin d'afficher le message de remerciement contenue dans notre ThanksMessage.vue
      showThanksMessage.value = true;
    } catch (error) {
      console.error(error);
    }
  };
  </script>
  