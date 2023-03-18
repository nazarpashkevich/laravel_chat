<template>
  <div class="w-full px-5 flex flex-col justify-between" v-if="$route.params.userId">
    <div class="flex flex-col mt-12">
      <div v-for="message in messages">
        <div class="flex justify-end mb-4" v-if="message.user.id === 2">
          <div class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
            {{ message.text }}
          </div>
          <img :src="message.user.image" class="object-cover h-8 w-8 rounded-full mt-2"
               alt=""/>
        </div>
        <div class="flex justify-start" v-else>
          <img :src="message.user.image"
               class="object-cover h-8 w-8 rounded-full mt-2"
               alt=""/>
          <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
            {{ message.text }}
          </div>
        </div>
      </div>
    </div>
    <div class="py-5">
      <input
          class="w-full bg-gray-300 py-5 px-3 rounded-xl"
          type="text"
          placeholder="type your message here..."
          v-on:keyup.enter="sendMessage"
      />
    </div>
  </div>
  <div v-else class="w-full flex">
    <h2 class="m-auto text-xl text-cyan-500">Select user</h2>
  </div>
</template>

<script>
export default {
  name: "ChatMainComponent",
  data() {
    return { // @todo sync with router map
      'messages': [
        {
          user: {
            id: 1,
            image: 'https://source.unsplash.com/vpOeXr5wmR4/600x600'
          },
          text: 'hello',
          date: '03:33 12.12.2012',
          read: true,
          attach: [],
        },
        {
          user: {
            id: 2,
            image: 'https://source.unsplash.com/vpOeXr5wmR4/600x600'
          },
          text: 'hello',
          date: '04:33 12.12.2012',
          read: true,
          attach: [],
        },
        {
          user: {
            id: 1,
            image: 'https://source.unsplash.com/vpOeXr5wmR4/600x600'
          },
          text: 'how are you?',
          date: '05:33 12.12.2012',
          read: false,
          attach: [],
        },
        {
          user: {
            id: 2,
            image: 'https://source.unsplash.com/vpOeXr5wmR4/600x600'
          },
          text: 'i`m fine, thank`s',
          date: '06:33 12.12.2012',
          read: true,
          attach: [],
        },
      ]
    }
  },
  mounted() {
    this.$http
        .get('https://jsonplaceholder.typicode.com/users')
        .then(response => (this.users = response.data.slice(0, 5)))
  },
  methods: {
    sendMessage(e) {
      this.messages.push({user: {id: 2, image: 'https://source.unsplash.com/vpOeXr5wmR4/600x600'}, text: e.target.value, date: '04:33 12.12.2012', read: false, attach: []});
      e.target.value = '';
    }
  }
}
</script>

<style scoped>

</style>