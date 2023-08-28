<template>
    {{ user }}
</template>

<script>
    export default {
        data() {
            return {
                user: null
            }
        },
        methods: {
            async getUser() {
                const response = await axios.get('/api/user')
                this.user = response.data
            }
        },
        mounted() {
            this.getUser()
        }
    }
</script>
