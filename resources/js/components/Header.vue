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
                <li><a href="/posts/?popular=1"><span>Trending</span></a></li>
                <template v-if="isSignedIn">
                  <li>
                    <a :href="`/posts?by=${ user.name }`"><span>My Posts</span></a>
                  </li>
                  <li>
                    <a href="/posts/create"><span>New</span></a>
                  </li>
                </template>
                <li>
                  <a href=""><span>Category</span></a>
                  <ul>
                    <li v-for="(channel,index) in  channels" :key="index">
                      <a :href="channel.path">
                        {{ channel.name }}
                      </a>
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
            <form class="search-wrapper" method="GET" action="/posts">
              <div class="search-form">
                <input name="search" type="text" class="tt-search__input" placeholder="Search">
              </div>
            </form>
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
                    <a href="">
                      <span v-text="user.name"></span>
                    </a>
                    <ul>
                      <li>
                        <a :href="`/profile/${ user.name }}`"><span>My Profile</span></a>
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
      channels: []
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
