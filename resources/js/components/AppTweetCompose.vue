<template>
  <form class="flex" @submit.prevent="submit">
    <div class="mr-3">
      <img :src="$user.avatar" alt="" class="w-12 rounded-12" />
    </div>

    <div class="flex-grow">
      <textarea
        class="bg-gray-600 w-full outline-none text-gray-300 text-lg resize-none mb-2"
        autofocus
        placeholder="What's happening?"
        v-model="form.body"
        name=""
        id=""
      ></textarea>
      <div class="flex justify-between">actions // reply</div>

      <button type="submit" class="bg-blue-500 rounded-full text-gray-300 text-center px-4 font-bold leading-none">
        Tweet
      </button>
    </div>
  </form>
</template>

<script>
export default {
  name: "AppTweetCompose",

  data() {
    return {
      form: {
        body: "",
      },
    };
  },

  methods: {
    submit() {
      axios.post("/api/tweets", this.form);
    },
  },
};
</script>

<style scoped></style>
