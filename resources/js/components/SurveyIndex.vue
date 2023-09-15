

<template>
    <div class="mt-4">
      <div class="jumbotron">
        <!-- Affiche notre composant ThanksMessage avoir à faire de redirection grace à un toggle -->
        <thanks-message v-if="showThanksMessage" :uuid="responseUuid"></thanks-message>
        <div v-else>
          <div >
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
                <!-- Question de type A (choix unique) -->
                <div v-for="(option, optionIndex) in question.options" :key="optionIndex" class="form-check">
                  <input type="radio" :name="`question_${question.id}`" :value="option" class="form-check-input" v-model="textInput[question.id]">
                  <label class="form-check-label">{{ option }}</label>
                </div>
              </div>

                <div v-else-if="question.type === 'B'">
                  <!-- Question de type B (champ de saisie) -->
                  <input type="text" :name="`question_${question.id}`" class="form-control" :maxlength="255" required v-model="textInput[question.id]">
                </div>
    
                <div v-else-if="question.type === 'C'">
                <!-- Question de type C (choix numérique) -->
                <label>(Entre 1 et 5)</label>
                <input type="number" :name="`question_${question.id}`" class="form-control" :min="1" :max="5" required v-model="numericInput[question.id]" @input="validateNumericInput(question.id)">
              </div>

              </div>
            </div>
          </div>
          <div v-if="errorMessage" class="alert alert-danger mt-3">
          {{ errorMessage }}
        </div>
          <button class="btn btn-primary mb-4" @click="submitForm">Valider</button>
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
  const numericInput = {};
  const showThanksMessage = ref(false); // Booléen servant à faire switcher notre composant
  const responseUuid = ref('');
  const errorMessage = ref(''); 
  
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

         if (question.type === 'A' || question.type === 'B') {
          // Traitement pour les questions de type A ou B (champ de saisie)
          // Recuperation des réponse depuis textInput
          responses.push({
            questionId: question.id,
            type: question.type,
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
      const response = await axios.post('/api/save-responses', { responses });
      // Passe la valeur de notre booléen à true afin d'afficher le message de remerciement contenue dans notre ThanksMessage.vue
      showThanksMessage.value = true;
      responseUuid.value = response.data.unique_url;
    } catch (error) {
      console.error(error);
      // Si le serveur renvoie une réponse 400, définissez le message d'erreur
      if (error.response && error.response.status === 400) {
        errorMessage.value = 'Veuillez uniquement saisir des valeurs entre 1 à 5 .';
      } else {
        errorMessage.value = 'Une erreur s\'est produite lors de l\'envoi du formulaire, veuillez remplir tous les champs.';
      }
    }
  };
  </script>
  