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
      <div class="tt-item-description" v-text="data.body"></div>
      <div class="tt-item-info info-bottom">

        <Favorite :count="data.favorites_count" :status="data.is_favorited" :id="data.id"/>

        <div class="col-separator"></div>
        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
          <i class="tt-icon">
            <svg>
              <use xlink:href="#icon-share"></use>
            </svg>
          </i>
        </a>
        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
          <i class="tt-icon">
            <svg>
              <use xlink:href="#icon-flag"></use>
            </svg>
          </i>
        </a>
        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
          <i class="tt-icon">
            <svg>
              <use xlink:href="#icon-reply"></use>
            </svg>
          </i>
        </a>
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
      date: ''
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
