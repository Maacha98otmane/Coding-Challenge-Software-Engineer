import AllProduct from './components/AllProduct.vue';
import AllCategory from './components/AllCategory.vue';
import CreateProduct from './components/CreateProduct.vue';
import CreateCategory from './components/CreateCategory.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllProduct
    },
    {
        name: 'createProduct',
        path: '/create',
        component: CreateProduct
    },
    {
        name: 'createCategory',
        path: '/createcategory',
        component: CreateCategory
    },
    {
        name: 'Allcategory',
        path: '/allcategory',
        component: AllCategory
    }
];