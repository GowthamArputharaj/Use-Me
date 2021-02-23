<template>
  <ais-instant-search :search-client="searchClient" index-name="posts" class="mx-8">
    <ais-search-box class="border-none w-full my-2 py-4" placeholder="Search within Database.." />
    <ais-hits>
      <div slot="item" slot-scope="{ item }" class="h-full mb-0">
        <!-- <div class="p-4 bg-blue-50 border border-blue-300">
          <h2>{{ item.name }}</h2>
          <h3>{{ item.email }}</h3>  
        </div> -->
        
        <div class="mb-2 bg-green-10 border border-green-20 shadow shadow-md px-2 py-2 mb-0 h-full">
          <div class="pt-1 grid grid-rows-3 grid-flow-col gap-4">
              <a :href="('posts/'+item.id)" class="text-md font-bold	 w-6/12 row-span-6">
                {{ item.title }}
              </a>
              <div class=" w-6/12 row-span-6 mt-1">
                <span v-if="item.published" class="px-2 py-2 bg-green-50 border border-green-200 mr-0 min-w-18 max-w-18">Published</span>
                <span v-if="!item.published" class="px-2 py-2 bg-red-50 border border-red-200 mr-4 min-w-18 max-w-18">Draft</span>
              </div>
          </div>
          <div class="text-left pt-2 ">
              <span class="text-sm">
                  {{ postContent(item.content, 80) }}
              </span>
          </div>
        </div>
        <br>
      </div>
    </ais-hits>
  </ais-instant-search>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';
import 'instantsearch.css/themes/algolia-min.css';

export default {
  data() {
    return {
      //searchClient: algoliasearch(
      //  'B1G2GM9NG0',
      //  'aadef574be1f9252bb48d4ea09b5cfe5'
      //),
      searchClient: algoliasearch(
        'JL7OV3N089',
        'f9f6d9cf73799e9831f13cc8926006b4'
      ),
    };
  },
  methods: {
    postContent: function(content, length) {
      if(content == undefined || content == null)
        content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur laborum quisquam laboriosam animi rerum in earum nihil iusto cupiditate cum nesciunt fuga dolores doloribus voluptates nemo, dignissimos sapiente facilis voluptatibus?';

      return content.substr(0, length);
    }
  }
};
</script>

<style>
body {
  font-family: sans-serif;
  padding: 1em;
}
.ais-Hits-item {
  padding: 0 !important;
}
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
  .ais-Hits-item {
    width: calc(100% - 1rem) !important;
  }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
  .ais-Hits-item {
    width: calc(50% - 1rem) !important;
  }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
  .ais-Hits-item {
    width: calc(33% - 1rem) !important;
  }
}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
    .ais-Hits-item {
    width: calc(25% - 1rem) !important;
  }
}

</style>
