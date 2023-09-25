import { createWebHistory, createRouter } from "vue-router";
import Home from "./views/Home.vue";
import About from "./views/About.vue";
import Error404 from "./views/Error404.vue";
import Funny from "./views/Funny.vue";
import SignIn from "./views/SignIn.vue";
import Rules from "./views/Rules.vue";
import DiceRoller from "./views/DiceRoller.vue";
import SignUp from "./views/SignUp.vue";

const routes = [
    { path: "/", name: "Home", component: Home, },
    { path: "/about", name: "About", component: About, },
    { path: "/funny", name: "Funny", component: Funny, },
    { path: "/sign-in", name: "SignIn", component: SignIn, },
    { path: "/sign-up", name: "SignUp", component: SignUp, },
    { path: "/rules", name: "Rules", component: Rules, },
    { path: "/dice-roller", name: "DiceRoller", component: DiceRoller, },
    { path: '/:pathMatch(.*)*', name: 'Error404', component: Error404, },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
