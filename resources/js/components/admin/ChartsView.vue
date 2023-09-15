<template>
    <div>
      <h1>Statistiques du Sondage</h1>
  
      <div class="row">
        <!-- Graphique pour la question 6 -->
        <div class="col-md-6">
          <div class="chart-container">
            <canvas id="question6Chart"></canvas>
          </div>
        </div>
  
        <!-- Graphique pour la question 7 -->
        <div class="col-md-6">
          <div class="chart-container">
            <canvas id="question7Chart"></canvas>
          </div>
        </div>
      </div>
  
      <div class="row">
        <!-- Graphique pour la question 10 -->
        <div class="col-md-6">
          <div class="chart-container">
            <canvas id="question10Chart"></canvas>
          </div>
        </div>
  
        <!-- Graphique pour la qualité (questions 11 à 15) -->
        <div class="col-md-6">
          <div class="chart-container">
            <canvas id="qualityChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  
  <script>
  import Chart from 'chart.js/auto'; // Importe la bibliothèque Chart.js
  import axiosClient from '../../plugins/axios.js'; // Importe l'objet axiosClient pour effectuer des requêtes API
  
  export default {
      data() {
          return {
              // Données des graphiques pour chaque question et qualité
              question6Data: {},
              question7Data: {},
              question10Data: {},
              qualityData: {},
          };
      },
      mounted() {
          // Charge les données depuis l'API lorsque le composant est monté
          this.loadChartData();
      },
      methods: {
          async loadChartData() {
              try {
                  // Effectue une requête à l'API pour récupérer les données des graphiques
                  const response = await axiosClient.get('api/responses-charts');
                  const data = response.data;
  
                  // Stocke les données dans les variables de données locales
                  this.question6Data = data.question6;
                  this.question7Data = data.question7;
                  this.question10Data = data.question10;
                  this.qualityData = data.quality;
  
                  // Appelle les fonctions pour créer les graphiques
                  this.createQuestion6Chart();
                  this.createQuestion7Chart();
                  this.createQuestion10Chart();
                  this.createQualityChart();
              } catch (error) {
                  console.error('Une erreur s\'est produite lors du chargement des données :', error);
              }
          },
          createQuestion6Chart() {
              // Crée un graphique Chart.js pour la question 6 (Marque de casque VR)
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
              // Crée un graphique Chart.js pour la question 7 (Magasin d’application pour contenus VR)
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
              // Crée un graphique Chart.js pour la question 10 (Utilisation principale de Bigscreen)
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
              // Crée un graphique Chart.js pour la qualité (Qualité de l'image, Confort, Connection, Qualité 3D, Qualité Audio)
              const ctx = document.getElementById('qualityChart').getContext('2d');
              new Chart(ctx, {
                  type: 'radar',
                  data: {
                      labels: ["Qualité de l'image", 'Confort', 'Connection', 'Qualité 3D', 'Qualité Audio'],
                      datasets: [{
                          label: 'Moyenne des réponses',
                          data: [3.67, 3, 2.67, 2.33, 2], // Les données de la qualité
                          backgroundColor: 'rgba(255, 99, 132, 0.2)',
                          borderColor: 'rgba(255, 99, 132, 1)',
                          pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                      }],
                  },
                  options: {
                      scale: {
                          ticks: {
                              beginAtZero: true,
                              max: 5,
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
  