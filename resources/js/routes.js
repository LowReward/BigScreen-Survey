import SurveyIndex from './components/SurveyIndex.vue'
import HelloAll from './components/HelloAll.vue'


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
    }
]