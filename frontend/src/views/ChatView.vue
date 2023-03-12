<template>
  <div class="container mx-auto shadow-lg rounded-lg">
    <!-- Chatting -->
    <div class="flex flex-row justify-between bg-white min-h-screen">
      <!-- chat list -->
      <ChatUsersComponent />
      <!-- end chat list -->
      <!-- message -->
      <ChatMainComponent />
      <!-- end message -->
    </div>
  </div>
</template>


<script>
import ChatUsersComponent from "../components/chat/ChatUsersComponent.vue";
import ChatMainComponent from "../components/chat/ChatMainComponent.vue";
export default {
  components: {ChatMainComponent, ChatUsersComponent}
}
</script>