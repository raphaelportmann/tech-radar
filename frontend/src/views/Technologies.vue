<template>
  <div>
    <ul v-if="types && states && technologies" class="flex flex-wrap">
      <template v-for="(type, index) in types" :key="type.id">
        <li v-if="technologies.filter(t => t.type_id === type.id).length > 0" class="w-full md:w-1/2 pb-4" :class="index % 2 === 0 ? 'md:pr-2' : 'md:pl-2'">
          <h2 class="text-2xl">{{ type.name }}</h2>
          <ul class="bg-green-300 p-2">
            <template v-for="state in states" :key="state.id">
              <li v-if="technologies.filter(t => t.type_id === type.id && t.state_id == state.id).length > 0" class="first:-mt-2 last:-mb-2">
                <h3 class="text-xl bg-green-600 px-2 -mx-2">{{ state.name }}</h3>
                <ul class="mb-1">
                  <li v-for="technology in technologies.filter(t => t.type_id === type.id && t.state_id === state.id)" :key="technology.id">
                    <router-link :to="'/technologies/' + technology.id">{{ technology.name }}</router-link>
                  </li>
                </ul>
              </li>
            </template>
          </ul>
        </li>
      </template>
    </ul>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import apiService from "@/services/api.service"

export default defineComponent({
  data: () => {
    return {
      technologies: null,
      types: null,
      states: null,
    };
  },
  mounted () {
    apiService.technologies().then(response => {
      this.technologies = response.data;
    });
    apiService.types().then(response => {
      this.types = response.data;
    });
    apiService.states().then(response => {
      this.states = response.data;
    });
  }
});
</script>
