<template>
  <h1 class="text-3xl">
    <span v-if="id">Edit</span>
    <span v-else>Add</span>
    Technology
  </h1>
  <form v-on:submit="send" v-if="technology" class="relative">
    <fieldset class="mt-2">
      <label for="name">Name</label>
      <input id="name" type="text" v-model="technology.name" class="w-full text-lg p-2">
    </fieldset>
    <fieldset class="mt-2">
      <label for="type">Type</label>
      <select id="type" v-model="technology.type_id" class="w-full text-lg p-2">
        <option v-for="type in types" v-bind:value="type.id" :key="type.id">
          {{ type.name }}
        </option>
      </select>
    </fieldset>
    <fieldset class="mt-2">
      <label for="state">State</label>
      <select id="state" v-model="technology.state_id" class="w-full text-lg p-2">
        <option v-for="state in states" v-bind:value="state.id" :key="state.id">
          {{ state.name }}
        </option>
      </select>
    </fieldset>
    <fieldset class="mt-2">
      <label for="description">Description</label>
      <textarea id="description" rows="6" v-model="technology.description" class="w-full text-lg p-2"></textarea>
    </fieldset>
    <fieldset class="mt-2">
      <label for="description_classification">Description Classification</label>
      <textarea id="description_classification" rows="6" v-model="technology.description_classification" class="w-full text-lg p-2"></textarea>
    </fieldset>
    <fieldset class="mt-2">
      <label for="status">Status</label>
      <select id="status" v-model="technology.status" class="w-full text-lg p-2">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
      </select>
    </fieldset>
    <button type="submit" class="mt-4 p-2 bg-green-900 text-white">Save</button>
    <div class="absolute top-0 right-0 w-full h-full bg-gray-100 bg-opacity-75" v-if="!loaded"></div>
  </form>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import Technology from "@/types/Technology"
import apiService from "@/services/api.service"
import { AxiosResponse } from 'axios';

export default defineComponent({
  props: ['id'],
  data: () => {
    return {
      loaded: false,
      technology: {
        id: null,
        name: '',
        type_id: null,
        state_id: null,
        description: '',
        description_classification: '',
        status: 'draft',
      } as Technology,
      types: null,
      states: null,
    };
  },
  methods: {
    send (e: Event) {
      e.preventDefault();
      if (this.technology) {
        apiService.saveTechnology(this.technology).then(() => {
          this.$router.push("/admin");
        }).catch(error => {
          if (error.response.status === 422) {
            let errors: string[] = [];
            Object.keys(error.response.data).forEach(key => {
              errors.push(error.response.data[key].join("\n"));
            });
            alert(errors.join("\n"));
          }
        });
      }
    }
  },
  mounted () {
    let requests: Promise<AxiosResponse>[] = [];
    
    if (this.id) {
      const technologiesRequest = apiService.technology(this.id);
      requests.push(technologiesRequest);
      technologiesRequest.then(response => {
        this.technology = response.data;
      });
    }

    const typesRequest = apiService.types();
    requests.push(typesRequest);
    typesRequest.then(response => {
      this.types = response.data;
    });

    const statesRequest = apiService.states();
    requests.push(statesRequest);
    statesRequest.then(response => {
      this.states = response.data;
    });

    Promise.all(requests).then(() => {
      this.loaded = true;
    });
  }
});
</script>
