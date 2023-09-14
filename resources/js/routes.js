import SurveyIndex from './components/SurveyIndex.vue'
import HelloAll from './components/HelloAll.vue'
import UserResponses from './components/UserResponses.vue'
import LoginPage from './components/admin/LoginPage.vue'
import DashboardPage from './components/admin/DashboardPage.vue'


export default[
    {
        path:'/',
        name:'SurveyIndex',
        component : SurveyIndex,
    },
    {
        path:'/hello',
        name:'HelloAll',
        component : HelloAll,
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
        meta: {requiresAuth: true}
    }

    
]