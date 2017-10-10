import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [{
        path: '/',
        name: 'index',
        component: Index
    }]
});

router.beforeEach((to, from, next) => {
    next();
});

export default router;