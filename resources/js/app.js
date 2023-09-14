import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler.js';
import {createRouter,createWebHistory} from 'vue-router';
import Routes from './routes.js'
import store from './store';


const app = createApp({})
const router = createRouter({

    routes: Routes,
    history: createWebHistory(),
})

router.beforeEach((to,from,next) =>{
    if(to.meta.requiresAuth && !store.state.user.token){
        next({name:'LoginPage'});
    } else{
        next();
    }
})

app.use(router);

app.mount('#app');