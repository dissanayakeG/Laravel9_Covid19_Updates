<template>
    <div></div>
</template>

<script>
export default {
    data() {
        return {
            isLoggedIn: false
        };
    },
    mounted() {
        localStorage.removeItem("token");
        this.$router.push({ name: "Login" });
        location.reload();
    }
};
</script>
