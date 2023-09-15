<template>
    <div>
      <h1>Statistiques du Sondage</h1>
      <!-- Insérez ici vos graphiques Chart.js ici -->
  
      <!-- Graphique pour la question 6 -->
      <div class="chart-container">
        <canvas id="question6Chart"></canvas>
      </div>
  
      <!-- Graphique pour la question 7 -->
      <div class="chart-container">
        <canvas id="question7Chart"></canvas>
      </div>
  
      <!-- Graphique pour la question 10 -->
      <div class="chart-container">
        <canvas id="question10Chart"></canvas>
      </div>
  
      <!-- Graphique pour la qualité (questions 11 à 15) -->
      <div class="chart-container">
        <canvas id="qualityChart"></canvas>
      </div>
    </div>
  </template>
  
  <script>
  import Chart from 'chart.js/auto';
  
  export default {
    data() {
      return {
        question6Data: {},
        question7Data: {},
        question10Data: {},
        qualityData: {},
      };
    },
    mounted() {
      // Charger les données depuis l'API
      this.loadChartData();
    },
    methods: {
      async loadChartData() {
        try {
          // Faites une requête à l'API pour récupérer les données
          const response = await fetch('/api/responses-charts');
          const data = await response.json();
  
          // Stockez les données dans les variables de données locales
          this.question6Data = data.question6;
          this.question7Data = data.question7;
          this.question10Data = data.question10;
          this.qualityData = data.quality;
  
          // Appelez les fonctions pour créer les graphiques
          this.createQuestion6Chart();
          this.createQuestion7Chart();
          this.createQuestion10Chart();
          this.createQualityChart();
        } catch (error) {
          console.error('Une erreur s\'est produite lors du chargement des données :', error);
        }
      },
      createQuestion6Chart() {
        const ctx = document.getElementById('question6Chart').getContext('2d');
        new Chart(ctx, {
          type: 'pie',
          data: {
            labels: Object.keys(this.question6Data),
            datasets: [{
              data: Object.values(this.question6Data),
              backgroundColor: ['#FF5733', '#FFBD33', '#33FF57', '#3340FF', '#FF33E9'],
            }],
          },
          options: {
            title: {
              display: true,
              text: 'Marque de casque VR',
            },
          },
        });
      },
      createQuestion7Chart() {
        const ctx = document.getElementById('question7Chart').getContext('2d');
        new Chart(ctx, {
          type: 'pie',
          data: {
            labels: Object.keys(this.question7Data),
            datasets: [{
              data: Object.values(this.question7Data),
              backgroundColor: ['#FF5733', '#FFBD33', '#33FF57', '#3340FF', '#FF33E9'],
            }],
          },
          options: {
            title: {
              display: true,
              text: 'Magasin d’application pour contenus VR',
            },
          },
        });
      },
      createQuestion10Chart() {
        const ctx = document.getElementById('question10Chart').getContext('2d');
        new Chart(ctx, {
          type: 'pie',
          data: {
            labels: Object.keys(this.question10Data),
            datasets: [{
              data: Object.values(this.question10Data),
              backgroundColor: ['#FF5733', '#FFBD33', '#33FF57', '#3340FF', '#FF33E9'],
            }],
          },
          options: {
            title: {
              display: true,
              text: 'Utilisation principale de Bigscreen',
            },
          },
        });
      },
      createQualityChart() {
        const ctx = document.getElementById('qualityChart').getContext('2d');
        new Chart(ctx, {
          type: 'radar',
          data: {
            labels: ['Question 11', 'Question 12', 'Question 13', 'Question 14', 'Question 15'],
            datasets: [{
              label: 'Moyenne des réponses',
              data: Object.values(this.qualityData),
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
              borderColor: 'rgba(255, 99, 132, 1)',
              pointBackgroundColor: 'rgba(255, 99, 132, 1)',
            }],
          },
          options: {
            scale: {
              ticks: {
                beginAtZero: true,
                max: 5, // Si les réponses vont de 0 à 5
              },
            },
            title: {
              display: true,
              text: 'Qualité',
            },
          },
        });
      },
    },
  };
  </script>
  
  <style>
  /* Styles CSS pour vos graphiques */
  .chart-container {
    margin: 20px 0;
  }
  </style>
  