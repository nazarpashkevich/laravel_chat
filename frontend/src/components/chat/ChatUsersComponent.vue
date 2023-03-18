<template>
  <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto">
    <!-- search compt -->
    <div class="border-b-2 py-4 px-2">
      <input
          type="text"
          placeholder="search chatting"
          class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full"
          v-model="search"
      />
    </div>
    <!-- end search compt -->
    <!-- user list -->
    <div class="flex flex-row py-4 px-2 items-center border-b-2"
         v-for="user in userList" v-on:click="$router.push('/chat/' + user.id)"
         v-bind:class = "($route.matched.some(({ name }) => name === 'chat_user' && $route.params.userId == user.id)) ?
           ' border-b-2 border-l-4 border-blue-400' : ''">
      <div class="w-1/4">
        <img
            src="https://source.unsplash.com/_7LbC5J-jw4/600x600"
            class="object-cover h-12 w-12 rounded-full"
            alt=""
        />
      </div>
      <div class="w-full">
        <div class="text-lg font-semibold">{{ user.name }}</div>
        <span class="text-gray-500">Pick me at 9:00 Am</span>
      </div>
    </div>

    <!-- end user list -->
  </div>
</template>

<script>
export default {
  name: "ChatUsersComponent",
  data() {
    return { // @todo sync with router map
      'users': [],
      'search': ''
    }
  },
  mounted () {
   this.$http
       .get('https://jsonplaceholder.typicode.com/users')
       .then(response => (this.users = response.data.slice(0, 5)))
  },
  methods: {
  },
  computed: {
    userList()  {
      return this.users.filter(user => {
        return user.name.toLowerCase().includes(this.search.toLowerCase())
      })
    }
  }
}
</script>

<style scoped>

</style>