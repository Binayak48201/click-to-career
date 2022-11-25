<template>
  <button type="submit" class="tt-icon-btn custom-button" @click="toggle">
    <svg xmlns="http://www.w3.org/2000/svg" :fill="newStatus ? 'red' : 'none'" viewBox="0 0 24 24" stroke-width="1.5"
         stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round"
            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
    </svg>
    <span class="tt-text">{{ newCount }}</span>
  </button>
</template>
<script>
export default {
  name: "Favorite",
  props: ['count', 'status', 'id'],
  data() {
    return {
      newCount: this.count,
      newStatus: this.status
    }
  },
  computed: {
    endpoint() {
      return '/api/replies/' + this.id + '/favorites'
    }
  },
  methods: {
    toggle() {
      this.newStatus ? this.unlike() : this.like()
    },
    like() {
      window.axios.post(this.endpoint)
      this.newStatus = true
      this.newCount++
      this.flash('Reply Favorited.!!')
    },
    unlike() {
      window.axios.delete(this.endpoint)
      this.newStatus = false
      this.newCount--
      this.flash('Reply UnFavorited.!!')
    },
    flash(data) {
      this.$swal.fire({
        position: 'top-end',
        icon: 'success',
        title: data,
        showConfirmButton: false,
        timer: 1000
      })
    }
  }
}

</script>
<style scoped>
svg.w-6.h-6 {
  width: 2rem;
}
</style>
<!--action="{{ route('reply.unfavorite',$reply->id) }}"-->
