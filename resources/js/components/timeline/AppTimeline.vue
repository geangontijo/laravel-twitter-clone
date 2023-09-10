<template>
  <div class="border-b-8 border-gray-800 p-4 w-full">
    <app-tweet-compose />
  </div>

  <app-tweet v-for="tweet in tweets" :key="tweet.id" :tweet="tweet" />

  <div
    v-if="tweets.length"
    v-observe-visibility="{
      callback: timelineBottomHandler,
    }"
  ></div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "AppTimeline",

  data() {
    return {
      page: 1,
      lastPage: 1,
    };
  },

  computed: {
    ...mapGetters({
      tweets: "timeline/tweets",
    }),
    url() {
      return `/api/timeline?page=${this.page}`;
    },
  },

  methods: {
    ...mapActions({
      getTweets: "timeline/getTweets",
    }),

    loadTweets() {
      this.getTweets(this.url).then((response) => {
        this.lastPage = response.data.meta.last_page;
      });
    },

    timelineBottomHandler(isVisible) {
      if (!isVisible || this.page === this.lastPage) return;

      this.page++;

      this.getTweets(this.url);
    },
  },
  mounted() {
    this.loadTweets();
  },
};
</script>

<style scoped></style>
