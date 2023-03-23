<script setup>
import SidebarMenu from "@/components/main/SidebarMenuComponent.vue";
</script>
<template>
  <div class="" v-if="false">
    <div class="h-screen w-64 bg-slate-100 fixed">
      <SidebarMenu />
    </div>
    <div class="ml-64">
      <RouterView />
    </div>
  </div>
  <RouterView v-else />
</template>

<script>
export default {
  name: "SidebarComponent",
  components: {},
  data() {
    return {
      user: this.user
    }
  }
}
</script>

<style scoped>

</style>