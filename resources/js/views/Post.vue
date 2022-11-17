<template>
  <main id="tt-pageContent" class="tt-offset-small">
    <div class="container">
      <div class="tt-topic-list">
        <div class="tt-list-header">
          <div class="tt-col-topic">Topic</div>
          <div class="tt-col-category">Category</div>
          <div class="tt-col-value hide-mobile">Likes</div>
          <div class="tt-col-value hide-mobile">Replies</div>
          <div class="tt-col-value hide-mobile">Views</div>
          <div class="tt-col-value">Actions</div>
        </div>
        <template v-if="loading">
         <div class="loader"></div>
        </template>
        <template v-else>
          <div v-if="posts.length > 0 " v-for="(post,index) in posts" class="tt-item">
            <div class="tt-col-avatar">
              <img v-if="post.user.avatar" :src="post.user.avatar" alt="" class="avatar">
              <img v-else src="/default.jpg" alt="" class="avatar">
            </div>
            <div class="tt-col-description">
              <h6 class="tt-title">
                <a :href="post.path">
                  {{ post.title }}
                  <div class="row align-items-center no-gutters">
                    <div class="col-11">
                      <ul class="tt-list-badge">
                        <li>
                          <a :href="`/profile/${ post.user.name }`">
                            <span class="tt-badge">{{ post.user.name }}</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-1 ml-auto show-mobile">
                      <div class="tt-value">1h</div>
                    </div>
                  </div>
                </a>
              </h6>
              <div class="row align-items-center no-gutters">
                <div class="col-1 ml-auto show-mobile">
                  <div class="tt-value">1h</div>
                </div>
              </div>
            </div>
            <div class="tt-col-category"><span
                class="tt-color01 tt-badge">{{ post.category.name }}</span></div>
            <div class="tt-col-value hide-mobile">985</div>
            <div class="tt-col-value tt-color-select hide-mobile">{{ post.replies_count }}</div>
            <div class="tt-col-value hide-mobile">15.1k</div>

            <div style="display: flex">
              <a :href="post.path" class="pr-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="h-17">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
              </a>
              <!--            @can('update', $forum)-->
              <!--            <a href="{{ route('forum.edit',$forum->slug) }}" class="pr-3">-->
              <!--              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
              <!--                   stroke-width="1.5" stroke="currentColor" class="h-17">-->
              <!--                <path stroke-linecap="round" stroke-linejoin="round"-->
              <!--                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>-->
              <!--              </svg>-->
              <!--            </a>-->
              <!--            <form action="{{ $forum->path() }}" method="post">-->
              <!--              @csrf-->
              <!--              @method('DELETE')-->
              <!--              <button type="submit" class="custom-button">-->
              <!--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
              <!--                     stroke-width="1.5" stroke="currentColor" class="h-17">-->
              <!--                  <path stroke-linecap="round" stroke-linejoin="round"-->
              <!--                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>-->
              <!--                </svg>-->
              <!--              </button>-->
              <!--            </form>-->
              <!--            @endcan-->
            </div>
          </div>
          <div v-else class="tt-topic-alert tt-alert-default" role="alert">
            <a href="#" target="_blank">No post available.</a>
            <a href="/login" target="_blank">Try Login and create one.</a>
          </div>
        </template>
      </div>
    </div>
  </main>
</template>
<script>
export default {
  data() {
    return {
      posts: [],
      loading: false
    }
  },
  mounted() {
    this.loading = true
    window.axios.get('api/posts')
        .then((response) => {
          this.posts = response.data.data
          this.loading = false
        })
  }
}
</script>
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
