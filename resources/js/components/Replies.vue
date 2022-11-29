<template>
  <div class="tt-item">
    <div class="tt-single-topic">
      <div class="tt-item-header pt-noborder">
        <div class="tt-item-info info-top">
          <div class="tt-avatar-icon">
            <img v-if="data.user.avatar" :src="data.user.avatar" alt="" class="avatar">
            <img v-else src="/default.jpg" alt="" class="avatar">
          </div>
          <div class="tt-avatar-title">
            <a href="#">{{ data.user.name }}</a>
          </div>
          <a href="#" class="tt-info-time">
            <i class="tt-icon">
              <svg>
                <use xlink:href="#icon-time"></use>
              </svg>
            </i>
            {{ date }}
          </a>
        </div>
      </div>

      <div class="tt-item-description" v-if="editing">
        <div class="form-group">
          <form @submit.prevent="update">
            <textarea name="" id="" cols="120" rows="5" v-model="body">{{ body }}</textarea>
            <button class="btn btn-link ml-4 mr-3" @click="editing = false">Cancel</button>
            <button class="btn btn-color02">Update</button>
          </form>
        </div>
      </div>

      <div v-else class="tt-item-description" v-text="data.body"></div>


      <div class="tt-item-info info-bottom" v-if="!editing">
        <Favorite :count="data.favorites_count" :status="data.is_favorited" :id="data.id"/>
        <button class="btn btn-link ml-4 mr-3" @click="editing = true">Edit</button>
        <button class="btn btn-link" @click="destory">Delete</button>
        <div class="col-separator"></div>
      </div>
    </div>
  </div>
  <!--{{ $replies->links('pagination::bootstrap-4') }}-->
  <!--moment().format();-->
</template>

<script>
import moment from 'moment';
import Favorite from "./Favorite.vue";

export default {
  name: "Replies",
  props: ['data'],
  components: {
    Favorite
  },
  data() {
    return {
      date: '',
      editing: false,
      body: this.data.body
    }
  },
  methods: {
    update() {
      let newBody = this.body
      window.axios.patch('/api/replies/' + this.data.id, {
        body: newBody
      })
          .then((response) => {
            this.editing = false;
            this.$swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Updated!',
              showConfirmButton: false,
              timer: 1000
            })
            this.$emit('updated')
          })
          .catch(error => {
            this.$swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'Something went wrong!',
              showConfirmButton: false,
              timer: 1000
            });
          })
    },
    destory() {
      window.axios.delete('/api/replies/' + this.data.id)
          .then((response) => {
            this.$swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Delete Successfully!',
              showConfirmButton: false,
              timer: 1000
            })
            this.$emit('deleted',this.data.id)
          })
          .catch(error => {
            this.$swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'Something went wrong!',
              showConfirmButton: false,
              timer: 1000
            });
          })
    }
  },
  computed: {
    date() {
      return moment(this.data.created_at).format('MMMM Do YYYY')
    }
  },
}
</script>

<style scoped>

</style>
