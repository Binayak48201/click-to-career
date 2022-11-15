import { createRouter, createWebHistory } from "vue-router";

import Post from '../views/Post.vue';
import About from '../views/About.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/posts",
      name: "Posts",
      component: Post,
    },
    {
      path: "/about",
      name: "About",
      component: About,
    },
  ],
});

export default router;
