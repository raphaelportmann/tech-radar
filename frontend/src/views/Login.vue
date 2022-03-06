<template>
  <div>
    <h1 class="text-3xl">LOGIN</h1>
    <form @submit.prevent="login" class="w-full max-w-lg">
      <fieldset class="mt-2">
        <label for="email">Email</label>
        <input id="email" type="email" v-model="email" class="w-full text-lg p-2">
      </fieldset>
      <fieldset class="mt-2">
        <label for="password">Password</label>
        <input id="password" type="password" v-model="password" class="w-full text-lg p-2">
      </fieldset>
      <button type="submit" class="mt-4 p-2 bg-green-900 text-white">Login</button>
    </form>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import authService from "@/services/auth.service";

export default defineComponent({
  data: () => {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    login() {
      authService.login(this.email, this.password).then(() => {
          this.$router.push("/");
      }).catch((err) => {
        alert(err.response.data.message);
      });
    },
  },
});
</script>
