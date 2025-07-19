import {createRouter, createWebHistory} from 'vue-router'
import IndexComponent from "../components/IndexComponent.vue";
import CatalogComponent from "../components/CatalogComponent.vue";

const routes = [
    {path: '/', name: 'index', component: CatalogComponent},
    {path: '/catalog', name: 'catalog', component: CatalogComponent},
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
