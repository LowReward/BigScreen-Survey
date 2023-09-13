<template>
    <div>
      <p>Merci d'avoir répondu au questionnaire.</p>
      <p>Voici votre lien unique pour consulter vos réponses ( un email vous a été envoyé ):</p>
      <!-- href à revoir pour y ajouer-->
      <a href="http://localhost:8000/view-responses/" target="_blank">http://localhost:8000/view-responses/{{ uuid }}</a>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      uuid: String // Props reçu de parent SurveyIndex
    }
  };
  </script>
  