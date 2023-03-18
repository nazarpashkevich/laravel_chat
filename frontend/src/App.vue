<script setup lang="ts">
import SidebarComponent from "@/components/main/SidebarComponent.vue";
</script>

<template>
  <SidebarComponent v-if="user?.token"/>
  <RouterView v-else/>
</template>

<style scoped>

</style>