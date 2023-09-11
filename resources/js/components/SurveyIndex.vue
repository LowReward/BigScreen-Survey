<template>
    <div class="container mt-5">
      <div class="jumbotron">
        <!-- couleur à modifier par la suite pour avoir un background complet avec superposition des questions made in bootstrap -->
        <div class="bg-secondary"><h1 class="display-4 ">Bienvenue sur Bigscreen</h1>
        <p class="lead ">Voici le formulaire à remplir :</p></div>
        
        <!-- Utilise une boucle v-for pour afficher chaque question dans un bloc séparé -->
        <div v-for="(question, index) in questions" :key="index" class="mb-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{ question.title }}</h4>
              <p class="card-text text-muted">{{ question.body }}</p>
              
              <!-- Affiche les champs en fonction du type de question (A, B, C) -->
              <div v-if="question.type === 'A'">
                <!-- Question de type A (choix multiple) -->
                <div v-for="(option, optionIndex) in question.options" :key="optionIndex" class="form-check">
                  <input type="checkbox" :name="`question_${question.id}[]`" :value="option" class="form-check-input">
                  <label class="form-check-label">{{ option }}</label>
                </div>
              </div>
  
              <div v-else-if="question.type === 'B'">
                <!-- Question de type B (champ de saisie) -->
                <input type="text" :name="`question_${question.id}`" class="form-control" :maxlength="255" required>
              </div>
  
              <div v-else-if="question.type === 'C'">
                <!-- Question de type C (choix numérique) -->
                <input type="number" :name="`question_${question.id}`" class="form-control" :min="1" :max="5" required>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-primary" @click="submitForm">Valider</button>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  
  const questions = ref([]);
  
  onMounted(async () => {
    try {
      const response = await axios.get('/api/questions');
      questions.value = response.data;
    } catch (error) {
      console.error(error);
    }
  });
  </script>
  