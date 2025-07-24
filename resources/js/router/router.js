import {createRouter, createWebHistory} from 'vue-router'
import CatalogComponent from "../components/CatalogComponent.vue";
import ProductComponent from "../components/ProductComponent.vue";
import CartComponent from "../components/CartComponent.vue";

const routes = [
    {path: '/', name: 'index', component: CatalogComponent},
    {path: '/catalog', name: 'catalog', component: CatalogComponent},
    {path: '/cart', name: 'cart', component: CartComponent},
    {path: '/product/:id', name: 'product', component: ProductComponent},
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
