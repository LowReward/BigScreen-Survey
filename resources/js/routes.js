import SurveyIndex from './components/SurveyIndex.vue'
import HelloAll from './components/HelloAll.vue'
import UserResponses from './components/UserResponses.vue'


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
]