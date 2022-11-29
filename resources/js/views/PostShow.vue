<template>
  <main id="tt-pageContent">
    <div class="container">
      <div class="tt-single-topic-list">
        <div class="tt-item">
          <div class="tt-single-topic">
            <div class="tt-item-header">
              <div class="tt-item-info info-top">
                <div class="tt-avatar-icon">
                  <i class="tt-icon">
                    <svg>
                      <use xlink:href="#icon-ava-d"></use>
                    </svg>
                  </i>
                </div>
                <div class="tt-avatar-title">
                  <!--                  <a href="#">{{ forum.user.name }}</a>-->
                </div>
                <a href="#" class="tt-info-time">
                  <i class="tt-icon">
                    <svg>
                      <use xlink:href="#icon-time"></use>
                    </svg>
                  </i>
                  {{ forum.created_at }}
                </a>
              </div>
              <h3 class="tt-item-title">
                <a href="#">
                  {{ forum.title }}
                </a>
              </h3>
              <div class="tt-item-tag">
                <ul class="tt-list-badge">
                  <li>
                    <a href="#">
                      <!--                      <span class="tt-color03 tt-badge">{{ forum.category.name }}</span>-->
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="tt-item-description">
              <p>
                {{ forum.body }}
              </p>
            </div>
            <div class="tt-item-info info-bottom">
              <a href="#" class="tt-icon-btn">
                <i class="tt-icon">
                  <svg>
                    <use xlink:href="#icon-like"></use>
                  </svg>
                </i>
                <span class="tt-text">671</span>
              </a>
              <a href="#" class="tt-icon-btn">
                <i class="tt-icon">
                  <svg>
                    <use xlink:href="#icon-dislike"></use>
                  </svg>
                </i>
                <span class="tt-text">39</span>
              </a>
              <a href="#" class="tt-icon-btn">
                <i class="tt-icon">
                  <svg>
                    <use xlink:href="#icon-favorite"></use>
                  </svg>
                </i>
                <span class="tt-text">12</span>
              </a>
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
        <div class="tt-item">
          <div class="tt-info-box">
            <h6 class="tt-title">Thread Status</h6>
            <div class="tt-row-icon">
              <div class="tt-item">
                <a href="#" class="tt-icon-btn tt-position-bottom">
                  <i class="tt-icon">
                    <svg>
                      <use xlink:href="#icon-reply"></use>
                    </svg>
                  </i>
                  <span class="tt-text">283</span>
                </a>
              </div>
              <div class="tt-item">
                <a href="#" class="tt-icon-btn tt-position-bottom">
                  <i class="tt-icon">
                    <svg>
                      <use xlink:href="#icon-view"></use>
                    </svg>
                  </i>
                  <span class="tt-text">10.5k</span>
                </a>
              </div>
              <div class="tt-item">
                <a href="#" class="tt-icon-btn tt-position-bottom">
                  <i class="tt-icon">
                    <svg>
                      <use xlink:href="#icon-user"></use>
                    </svg>
                  </i>
                  <span class="tt-text">168</span>
                </a>
              </div>
              <div class="tt-item">
                <a href="#" class="tt-icon-btn tt-position-bottom">
                  <i class="tt-icon">
                    <svg>
                      <use xlink:href="#icon-like"></use>
                    </svg>
                  </i>
                  <span class="tt-text">2.4k</span>
                </a>
              </div>
              <div class="tt-item">
                <a href="#" class="tt-icon-btn tt-position-bottom">
                  <i class="tt-icon">
                    <svg>
                      <use xlink:href="#icon-favorite"></use>
                    </svg>
                  </i>
                  <span class="tt-text">951</span>
                </a>
              </div>
              <div class="tt-item">
                <a href="#" class="tt-icon-btn tt-position-bottom">
                  <i class="tt-icon">
                    <svg>
                      <use xlink:href="#icon-share"></use>
                    </svg>
                  </i>
                  <span class="tt-text">32</span>
                </a>
              </div>
            </div>
            <hr>
            <h6 class="tt-title">Frequent Posters</h6>
            <div class="tt-row-icon">
              <div class="tt-item">
                <a href="#" class=" tt-icon-avatar">
                  <svg>
                    <use xlink:href="#icon-ava-d"></use>
                  </svg>
                </a>
              </div>
              <div class="tt-item">
                <a href="#" class=" tt-icon-avatar">
                  <svg>
                    <use xlink:href="#icon-ava-t"></use>
                  </svg>
                </a>
              </div>
              <div class="tt-item">
                <a href="#" class=" tt-icon-avatar">
                  <svg>
                    <use xlink:href="#icon-ava-k"></use>
                  </svg>
                </a>
              </div>
              <div class="tt-item">
                <a href="#" class=" tt-icon-avatar">
                  <svg>
                    <use xlink:href="#icon-ava-n"></use>
                  </svg>
                </a>
              </div>
              <div class="tt-item">
                <a href="#" class=" tt-icon-avatar">
                  <svg>
                    <use xlink:href="#icon-ava-a"></use>
                  </svg>
                </a>
              </div>
              <div class="tt-item">
                <a href="#" class=" tt-icon-avatar">
                  <svg>
                    <use xlink:href="#icon-ava-c"></use>
                  </svg>
                </a>
              </div>
              <div class="tt-item">
                <a href="#" class=" tt-icon-avatar">
                  <svg>
                    <use xlink:href="#icon-ava-h"></use>
                  </svg>
                </a>
              </div>
            </div>
            <hr>
            <div class="row-object-inline form-default">
              <h6 class="tt-title">Sort replies by:</h6>
              <ul class="tt-list-badge tt-size-lg">
                <li><a href="#"><span class="tt-badge">Recent</span></a></li>
                <li><a href="#"><span class="tt-color02 tt-badge">Most Liked</span></a></li>
                <li><a href="#"><span class="tt-badge">Longest</span></a></li>
                <li><a href="#"><span class="tt-badge">Shortest</span></a></li>
                <li><a href="#"><span class="tt-badge">Accepted Answers</span></a></li>
              </ul>
              <select class="tt-select form-control">
                <option value="Recent">Recent</option>
                <option value="Most Liked">Most Liked</option>
                <option value="Longest">Longest</option>
                <option value="Shortest">Shortest</option>
                <option value="Accepted Answer">Accepted Answer</option>
              </select>
            </div>
          </div>
        </div>

        <replies v-for="(reply,index) in replies" :key="index"
                 :data="reply"
                 @updated="replyWasUPdated"
                 @deleted="remove"
        ></replies>

      </div>

      <NewReply @created="createdReply"/>

      <div class="tt-topic-list mb-5">
        <div class="tt-item tt-item-popup">
          <div class="tt-col-avatar">
            <svg class="tt-icon">
              <use xlink:href="#icon-ava-f"></use>
            </svg>
          </div>
          <div class="tt-col-message">
            Looks like you are new here. Register for free, learn and contribute.
          </div>
          <div class="tt-col-btn">
            <button type="button" class="btn btn-primary">Log in</button>
            <button type="button" class="btn btn-secondary">Sign up</button>
            <button type="button" class="btn-icon">
              <svg class="tt-icon">
                <use xlink:href="#icon-cancel"></use>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
<script>
import Replies from "../components/Replies.vue";
import NewReply from "../components/NewReply.vue";

export default {
  name: "PostShow",
  components: {
    Replies,
    NewReply
  },
  data: () => ({
    url: '',
    forum: {},
    replies: [],
  }),
  methods: {
    createdReply(data) {
      this.replies.shift(data)
    },
    replyWasUPdated() {
      this.fetchData();
    },
    remove(index) {
      this.fetchData();
    },
    fetchData() {
      window.axios.get(this.url)
          .then((response) => {
            const {forum, replies} = response.data
            this.forum = forum
            this.replies = replies.data
          }).catch((error) => {
        alert(error)
      });
    }
  },
  created() {
    const {category, forum} = this.$route.params
    this.url = `/api/posts/${category}/${forum}`
    this.fetchData()
  },
}
</script>
