import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import authService from '@/services/auth.service'
import Login from '@/views/Login.vue'
import Technologies from '@/views/Technologies.vue'
import Technology from '@/views/Technology.vue'
import Admin from '@/views/Admin.vue'
import EditTechnology from '@/views/EditTechnology.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    redirect: () => {
      if (!authService.isAuthenticated()) {
        return { path: '/login' };
      } else {
        if (authService.getRole() === 'admin') {
          return { path: '/admin' };
        } else {
          return { path: '/technologies' };
        }
      }
    },
  },
  {
    path: '/login',
    component: Login,
  },
  {
    path: '/technologies',
    component: Technologies,
  },
  {
    path: '/technologies/:id',
    component: Technology,
    props: router => ({ id: parseInt(router.params.id instanceof Array ? router.params.id[0] : router.params.id) }),
  },
  {
    path: '/admin',
    component: Admin,
  },
  {
    path: '/admin/add',
    component: EditTechnology,
    props: () => ({ id: null }),
  },
  {
    path: '/admin/edit/:id',
    component: EditTechnology,
    props: router => ({ id: parseInt(router.params.id instanceof Array ? router.params.id[0] : router.params.id) }),
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
