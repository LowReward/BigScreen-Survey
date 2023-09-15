import SurveyIndex from './components/SurveyIndex.vue'
import UserResponses from './components/UserResponses.vue'
import LoginPage from './components/admin/LoginPage.vue'
import DashboardPage from './components/admin/DashboardPage.vue'
import AnswersView from './components/admin/AnswersView.vue'
import ChartsView from './components/admin/ChartsView.vue'
import QuestionsView from './components/admin/QuestionsView.vue'
import PageNotFound from './components/PageNotFound.vue'


export default[
  {
    // Capture toutes les routes non correspondantes à celles déjà définies
    path: '/:pathMatch(.*)*',
    name: 'PageNotFound',
    // Vue créee avec un message d'erreur 404 au cas où la page n'existe pas
    component: PageNotFound
  },
    {
        path:'/',
        name:'SurveyIndex',
        component : SurveyIndex,
    },
    {
        path: '/view-responses/:uuid', // La route avec un paramètre d'UUID
        name: 'user-responses',
        component: UserResponses,
      },
      {
        path:'/administration',
        name:'LoginPage',
        component : LoginPage,
    },
    {
        path: '/administration/dashboard',
        name: 'Dashboard',
        component: DashboardPage,
        meta: {requiresAuth: true},
        redirect: '/administration/dashboard/home',
        children:[
            {
                path: 'home',
                name: 'home-view',
                component: ChartsView,
                //meta: {requiresAuth: true},
              },
              {
                path: 'questions',
                name: 'questions-view',
                component: QuestionsView,
                //meta: {requiresAuth: true},
              },
              {
                path: 'answers',
                name: 'answers-view',
                component: AnswersView,
                //meta: {requiresAuth: true},
              }
          ]
    },

    
]