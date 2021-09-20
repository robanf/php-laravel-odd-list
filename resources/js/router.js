import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './pages/Home';
import About from './pages/About';
import Posts from './pages/Posts';

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path:'/',
            name:'home',
            component: Home
        },
        {
            path:'/contatti',
            name:'contatti',
            component: About
        },
        {
            path:'/post',
            name:'post',
            component: Posts
        },
    ]
});

export default router;