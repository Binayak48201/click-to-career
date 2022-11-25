<template>
  <div class="tt-wrapper-inner">
    <div class="pt-editor form-default">
      <h6 class="pt-title">Post Your Reply</h6>
      <form @submit.prevent="addReply" method="post">
        <div class="form-group">
        <textarea name="body" v-model="body" class="form-control" rows="5"
                  placeholder="Lets get started"></textarea>
        </div>
        <div class="pt-row">
          <div class="col-auto">
            <button type="submit" class="btn btn-secondary btn-width-lg">Post Reply</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      body: '',
      endpoint: '/api/posts/' + this.$route.params.forum + '/reply'
    }
  },
  methods: {
    addReply() {
      window.axios.post(this.endpoint, {body: this.body})
          .then(({data}) => {
            this.body = ''
            this.$swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Your reply has been posted.',
              showConfirmButton: false,
              timer: 1000
            })
            this.$emit('created',data)
          })
          .catch((error) => {
            this.$swal.fire({
              position: 'top-end',
              icon: 'error',
              title: error.response.data.message,
              showConfirmButton: false,
              timer: 1500
            })
          })
    }
  }
}
</script>
