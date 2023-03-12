<script setup>
import SidebarMenu from "@/components/main/SidebarMenuComponent.vue";
</script>
<template>
  <div class="">
    <div class="h-screen w-64 bg-slate-100 fixed">
      <SidebarMenu />
    </div>
    <div class="ml-64">
      <RouterView />
    </div>
  </div>
</template>

<script>
export default {
  name: "SidebarComponent",
  components: {}

}
</script>

<style scoped>

</style>