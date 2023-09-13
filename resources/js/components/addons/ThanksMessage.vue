<template>
    <div>
      <p>Merci d'avoir répondu au questionnaire.</p>
      <p>Voici votre lien unique pour consulter vos réponses ( un email vous a été envoyé ):</p>
      <p>http://localhost:8000/{{ uuid }}</p>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      uuid: String // Props reçu de parent SurveyIndex
    }
  };
  </script>
  