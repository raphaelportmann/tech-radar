<template>
  <div v-if="technology">
    <div class="flex flex-wrap gap-2 items-center">
      <h1 class="text-3xl">{{ technology.name }}</h1>
      <div class="flex flex-wrap gap-2">
        <Tag>{{ technology.type.name }}</Tag>
        <Tag>{{ technology.state.name }}</Tag>
      </div>
    </div>
    <h2 class="text-2xl mt-2">Description</h2>
    <p class="whitespace-pre-line">{{ technology.description }}</p>
    <h2 class="text-2xl mt-2">Description Classification</h2>
    <p class="whitespace-pre-line">{{ technology.description_classification }}</p>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import apiService from "@/services/api.service"
import Tag from "@/components/Tag.vue"

export default defineComponent({
  props: ['id'],
  components: {
    Tag
  },
  data: () => {
    return {
      technology: null,
    };
  },
  mounted () {
    apiService.technology(this.id).then(response => {
      this.technology = response.data;
    });
  }
});
</script>
