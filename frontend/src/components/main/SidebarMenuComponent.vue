<template>
  <div class="m-2 flex flex-col h-full">
  <div>
    <div class="logo flex flex-row h-8 m-2">
      <img class="logo-image" src="https://img.icons8.com/color/48/null/t-cute.png"/>
      <span class="ml-2 font-medium text-lg">Test Laravel App</span>
    </div>
  </div>
    <hr class="h-px my-2 bg-gray-200 border-0">
  <div class="menu-item mt-6">
    <router-link :to="'/' + item.code" :class='{ "bg-slate-200": subIsActive("/" + item.code) }'
                 class="menu-item hover:bg-slate-300 rounded h-12 flex cursor-pointer" v-for="item in menuItems">
      <div class="menu-icon h-4 w-4 my-auto mx-4">
        <img :src=item.icon />
      </div>
      <div class="menu-text my-auto text-md text-slate-600"><a :href="'/' + item.code">{{ item.name }}</a></div>
    </router-link>
  </div>
  <div class="menu-footer mt-auto mb-8 flex">
    <div class="menu-item hover:bg-slate-300 rounded h-12 w-full flex">
      <div class="menu-icon h-4 w-4 my-auto mx-4">
        <img src="https://img.icons8.com/ios/50/null/exit--v1.png" />
      </div>
      <div class="menu-text my-auto text-md text-slate-600"><a href="/logout">Logout</a></div>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  name: "SidebarMenuComponent",
  data() {
    console.log(this.$route);
    return { // @todo sync with router map
      'menuItems': [
        {'name': 'Chat', 'code': 'chat', 'icon': 'https://img.icons8.com/ios-glyphs/30/null/filled-chat.png'},
        {'name': 'Account', 'code': 'account', 'icon': 'https://img.icons8.com/ios-filled/50/null/user.png'}
      ]
    }
  },
  methods: {
    subIsActive: function (input)  {
      const paths = Array.isArray(input) ? input : [input];
      return paths.some((path) => this.$route.path.indexOf(path) === 0);
    }
  }
}
</script>

<style scoped>

</style>