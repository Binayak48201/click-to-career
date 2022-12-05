import {createRouter, createWebHistory} from "vue-router";

import Post from '../views/Post.vue';
import PostShow from '../views/PostShow.vue';
import ProfileView from '../views/ProfileView.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/posts",
            name: "Posts",
            component: Post,
        },
        {
            path: "/posts/:category",
            name: "CategoryPosts",
            component: Post,
        },
        {
            path: "/posts/:category/:forum",
            name: "PostsView",
            component: PostShow,
        },
        {
            path: "/profile/:user",
            name: "ProfileView",
            component: ProfileView,
        },
    ],
});

export default router;
