<template>
  <span class="text-gray-300 fw-bold">{{ user.name }}</span>
  <span class="text-gray-600">@{{ user.username }}</span>
</template>

<script>
export default {
  name: "AppTweetUsername",
  props: {
    user: {
      required: true,
      type: Object,
    },
  },
};
</script>

<style scoped></style>
