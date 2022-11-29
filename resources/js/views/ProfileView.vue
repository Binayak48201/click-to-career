<template>
  <main id="tt-pageContent" class="tt-offset-small">
    <div class="tt-wrapper-section">
      <div class="container">
        <div class="tt-user-header">
          <div class="tt-col-avatar">
            <div class="tt-icon" v-if="avatar">
              <img :src="avatar" alt="" class="avatar">
            </div>
          </div>
          <div class="tt-col-title">
            <div class="tt-title">
              <a href="#">{{ user.name }}</a>
            </div>
          </div>
          <div class="tt-col-btn" id="js-settings-btn">
            <div class="tt-list-btn" v-if="canUpdate">
              <div class="form-group">
                <input @change="onChange" name="avatar" type="file" class="form-control-file"
                       id="exampleFormControlFile1"
                       accept="image/*">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--        @include('profile.activities.index')-->
  </main>
</template>

<script>
export default {
  name: "ProfileView",
  data() {
    return {
      user: {},
      replies: [],
      activities: {},
      avatar: '',
      signedIn : window.App.signedIn,
      authUser : window.App.user
    }
  },
  computed:{
    canUpdate(){
      return this.authUser && this.authUser.id == this.user.id
    }
  },
  methods: {
    onChange(e) {
      if (!e.target.files.length) return;
      let file = e.target.files[0]
//      this.sendfile(file)   => optional :)
      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = e => {
        let src = e.target.result
        this.persist(src, file)
      }
    },
    persist(src, file) {
      this.avatar = src
      this.sendfile(file)
    },
    sendfile(file) {
      let formData = new FormData();

      formData.append("avatar", file);

      window.axios.post(`/api/profile/${this.$route.params.user}/update`, formData)
          .then(() =>
              this.$swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Avatar Upload',
                showConfirmButton: false,
                timer: 1000
              })
          );
    }
  },
  created() {
    window.axios.get('/api/profile/' + this.$route.params.user)
        .then((response) => {
          const {activities, replies, user} = response.data
          this.user = user
          this.replies = replies
          this.activities = activities
          this.avatar = user.avatar
        })
  }
}
</script>

<style scoped>

</style>
