<template>
  <div class="mt-4 mb-4 d-flex">
    <div class="jumbotron">
      <div>
        <h1 class="display-4">Merci d'avoir répondu au questionnaire.</h1>
        <p class="lead">toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à
          votre investissement, nous vous préparons une application toujours plus
          facile à utiliser, seul ou en famille.
          Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
          cette adresse:</p>
      </div>
      <div>
        <!-- Affiche un lien unique généré dynamiquement pour consulter les réponses -->
        <a :href="viewResponsesUrl" target="_blank">{{ viewResponsesUrl }}</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    uuid: String, // Propriété pour l'UUID
  },
  computed: {
    viewResponsesUrl() {
      // Génère dynamiquement l'URL de consultation des réponses en utilisant l'UUID
      return `http://localhost:8000/view-responses/${this.uuid}`;
    },
  },
};
</script>
