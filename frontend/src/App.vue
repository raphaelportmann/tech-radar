<template>
  <header class="flex justify-center bg-green-900 text-white p-4 shadow-md">
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 w-full max-w-7xl">
      <h1 class="text-xl md:text-3xl">Technology Radar</h1>
      <nav>
        <ul class="flex gap-4">
          <li v-if="!isAuthenticated()"><router-link to="/login">Login</router-link></li>
          <li v-if="isAuthenticated()"><router-link to="/technologies">Technologies</router-link></li>
          <li v-if="getRole() ==='admin'"><router-link to="/admin">Admin</router-link></li>
          <li v-if="isAuthenticated()"><button v-on:click="logout()">Logout</button></li>
        </ul>
      </nav>
    </div>
  </header>
  <div class="flex justify-center p-4">
    <div class="w-full max-w-7xl">
      <router-view></router-view>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import authService from './services/auth.service';

export default defineComponent({
  
  data: () => {
    return {

    };
  },
  methods: {
    isAuthenticated: authService.isAuthenticated,
    getRole: authService.getRole,
    logout: authService.logout,
    authUpdated () {
      this.$forceUpdate();
    },
  },
  mounted: function() {
    window.addEventListener('auth-updated', this.authUpdated);
  },
  unmounted: function() {
    window.removeEventListener('auth-updated', this.authUpdated);
  }

});
</script>