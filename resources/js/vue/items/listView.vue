<template>
  <div class="todo-list">
    <div v-for="(item, index) in items" :key="index">
      <list-item :item="item" class="item" v-on:itemChanged="getalert()" />
    </div>
  </div>
</template>

<script>
import listItem from "./listItem.vue";
export default {
  components: { listItem },
  props: ["items"],
  methods:{
      getalert(){
          this.$emit("reloadItems")
      }
  }
};
</script>

<style>
</style>
