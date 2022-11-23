import {createRouter, createWebHistory} from "vue-router";

import Post from '../views/Post.vue';
import About from '../views/About.vue';
import PostShow from '../views/PostShow.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "Posts",
            component: Post,
        },
        {
            path: "/posts/:category/:forum",
            name: "PostsView",
            component: PostShow,
        },
        {
            path: "/about",
            name: "About",
            component: About,
        },
    ],
});

export default router;
