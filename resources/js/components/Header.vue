<template>
  <nav class="panel-menu" id="mobile-menu">
    <div class="mm-navbtn-names">
      <div class="mm-closebtn">
        Close
        <div class="tt-icon">
          <svg>
            <use xlink:href="#icon-cancel"></use>
          </svg>
        </div>
      </div>
      <div class="mm-backbtn">Back</div>
    </div>
  </nav>
  <header id="tt-header">
    <div class="container">
      <div class="row tt-row no-gutters">
        <div class="col-auto">
          <a class="toggle-mobile-menu" href="#">
            <svg class="tt-icon">
              <use xlink:href="#icon-menu_icon"></use>
            </svg>
          </a>
          <div class="tt-logo">
            <a href="index.html">
              <img src="#" alt=""></a>
          </div>
          <div class="tt-desktop-menu">
            <nav>
              <ul>
                <li>
                  <router-link :to="{ name : 'Posts'}"><span>Home </span></router-link>
                  <!--                  <a href="/"><span>Home </span></a>-->
                </li>
                <li>
                  <router-link to="/posts?popular=1"><span>Trending</span></router-link>
                </li>
                <template v-if="isSignedIn">
                  <li>
                    <router-link :to="`/posts?by=${ user.name }`"><span>My Posts</span></router-link>
                  </li>
                  <li>
                    <router-link to="/posts/create"><span>New</span></router-link>
                  </li>
                </template>
                <li>
                  <a href=""><span>Category</span></a>
                  <ul>
                    <li v-for="(channel,index) in  channels" :key="index">
                      <router-link :to="channel.path">
                        {{ channel.name }}
                      </router-link>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
          <div class="tt-search">
            <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
              <svg class="tt-icon">
                <use xlink:href="#icon-search"></use>
              </svg>
            </button>
            <div class="search-form">
              <input v-model.lazy="search" name="search" type="text" class="tt-search__input" placeholder="Search">
            </div>
            <div class="search-results" v-if="isSearched">
              <div class="tt-search-scroll ps-container ps-theme-default ps-active-y"
                   data-ps-id="c5688612-dcc8-6ef6-5cb6-5a8e82b30160">
                <ul>
                  <li v-for="(post,index) in searchResult" :key="index">
                    <router-link :to="`/posts/${post.category.slug}/${post.slug}`">
                      <h6 class="tt-title">{{ post.title }}</h6>
                      <div class="tt-description">
                        {{ post.body }}
                      </div>
                    </router-link>
                  </li>
                </ul>
                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                  <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps-scrollbar-y-rail" style="top: 0px; height: 261px; right: 3px;">
                  <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 130px;"></div>
                </div>
              </div>
              <!--              <button type="button" class="tt-view-all" data-toggle="modal" data-target="#modalAdvancedSearch">Advanced-->
              <!--                Search-->
              <!--              </button>-->
            </div>
          </div>
        </div>
        <div class="col-auto ml-auto">
          <div class="tt-account-btn" v-if="!isSignedIn">
            <a href="/login" class="btn btn-primary">Log in</a>
            <a href="/register" class="btn btn-secondary">Sign up</a>
          </div>
          <template v-if="isSignedIn">
            <div class="tt-desktop-menu">
              <nav>
                <ul>
                  <li>
                    <a href="#">
                      <span v-text="user.name"></span>
                    </a>
                    <ul>
                      <li>
                        <router-link :to="`/profile/${ user.name }`">
                          My Profile
                        </router-link>
                      </li>
                      <li>
                        <a href="" @click.prevent="logout()">Logout</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </template>
        </div>
      </div>
    </div>
  </header>


</template>
<script>
export default {
  name: "Header",
  data() {
    return {
      user: '',
      isSignedIn: false,
      channels: [],
      search: '',
      isSearched: false,
      searchResult: []
    }
  },
  watch: {
    search(newValue, oldValue) {
      window.axios.get('/api/posts', {params: {search: this.search}})
          .then((response) => {
            this.searchResult = response.data.data
            this.isSearched = true
          })
    }
  },
  methods: {
    fetchChannel() {
      window.axios.get('api/channels')
          .then((response) => {
            this.channels = response.data
          })
          .catch((error) => {
            alert()
          })
    },
    logout() {
      window.axios.post('/logout')
          .then((response) => {
            window.location.reload()
          })
          .catch((error) => {
            alert("Something went wrong!!!")
          })
    }
  },
  mounted() {
    this.user = window.App.user
    this.isSignedIn = window.App.signedIn
    this.fetchChannel()
  }
}
</script>
<style scoped>
.tt-search .search-results {
  position: absolute;
  background-color: #fff;
  border-left: 1px solid #e2e7ea;
  border-right: 1px solid #e2e7ea;
  border-bottom: 1px solid #e2e7ea;
  top: auto;
  left: 0;
  margin-top: -2px;
  width: 100%;
  padding: 1px;
  border-radius: 3px;
  z-index: 100000;
  opacity: 11;
  display: block !important;
}

</style>
