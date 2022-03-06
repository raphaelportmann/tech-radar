<template>
  <h1 class="text-3xl">Technologies</h1>
  <div class="flex justify-end">
    <router-link :to="'/admin/add'" class="p-2 bg-green-900 text-white">Create</router-link>
  </div>
  <div>
    <table v-if="technologies" class="w-full">
      <thead>
        <tr class="bg-gray-400">
          <th v-for="name in ['Name', 'Type', 'State', '']" :key="name" class="text-left font-bold">{{ name }}</th>
        </tr>
      </thead>
      <tbody>
        <template v-for="(technology, index) in technologies" :key="technology.id">
          <tr :class="index % 2 === 0 ? 'bg-gray-200' : 'bg-gray-300'">
            <td>
              <span class="mr-2">{{ technology.name }}</span>
              <Tag v-if="technology.status === 'published'">Published</Tag>
              <Tag v-if="technology.status === 'draft'" class="bg-blue-900">Draft</Tag>
            </td>
            <td>{{ technology.type.name }}</td>
            <td>{{ technology.state ? technology.state.name : '' }}</td>
            <td>
              <router-link :to="'/admin/edit/' + technology.id" class="mr-2">Edit</router-link>
              <button v-on:click="del(technology.id)">Delete</button>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import apiService from "@/services/api.service"
import Technology from "@/types/Technology"
import Tag from "@/components/Tag.vue"

export default defineComponent({
  components: {
    Tag,
  },
  data: () => {
    return {
      technologies: null as Technology[]|null,
    };
  },
  methods: {
    del (id: number) {
      apiService.deleteTechnology(id).then(() => {
        if (this.technologies) {
          this.technologies = this.technologies.filter(technology => technology.id !== id);
        }
      });
    },
  },
  mounted () {
    apiService.technologies(true).then(response => {
      this.technologies = response.data;
    });
  }
});
</script>
