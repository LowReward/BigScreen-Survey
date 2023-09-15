<template>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="../../../assets/logo.png" alt="Logo Bigscreen" class="logo" style="max-width: 100px;">
                        </div>
                        <h3 class="card-title">Connexion</h3>
                        <form @submit.prevent="login">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" placeholder="Email" v-model="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" id="password" placeholder="Mot de passe" v-model="password"
                                    class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
                <p v-if="loginError" class="mt-3 text-danger">{{ loginError }}</p>
            </div>
        </div>
    </div>
</template>

  
  
<script>
import axios from 'axios';
import store from '../../store';

export default {
    name: "LoginPage",
    data() {
        return {
            email: '',
            password: '',
            loginError: ''
        }
    },
    methods: {
        login() {
            axios.post('api/login', { // Effectue une requête POST pour se connecter
                email: this.email, // Récupère l'email saisi dans le champ correspondant
                password: this.password // Récupère le mot de passe saisi dans le champ correspondant
            })
                .then(response => {

                    
                    //Récupération du token dans la réponse et ensuite store dans le state user token ( Vuex )
                    store.state.user.token = response.data.token;
                    console.log(store.state.user.token);
                    localStorage.setItem('auth_token',store.state.user.token); // Place le token dans le localstorage afin d'utiliser le token sur nos transitions 

                    //localStorage.setItem('token', response.data.token); // Stocke le token dans le stockage local
                    this.$router.push('/administration/dashboard'); // Redirige vers la page des paires dans l'administration
                })
                .catch(error => {
                    console.log(error);
                    this.loginError = 'Login incorrect. Veuillez réessayer.'; // Affiche un message d'erreur en cas d'échec de la connexion
                });

        }
    }
}
</script>