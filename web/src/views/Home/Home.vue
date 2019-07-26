<template>
    <div class="table-container">
        <table class="table is-bordered is-fullwidth">
            <Thead @changed="filter"/>
            <Boats v-bind:boats="boats"/>
            <Pagination @clicked="paginate" v-on :query="query" :total="total"/>
        </table>
    </div>
</template>

<script>
  import Boats from '../components/Boats'
  import Thead from './components/Thead'
  import Pagination from "./components/Pagination"

  export default {
    name: 'Home',
    components: {Pagination, Thead, Boats},
    data() {
      return {
        total: 0,
        query: {
          skip: 0
        },
        boats: []
      }
    },
    methods: {
      filter(params = {}) {
        this.query = params;
        this.resetPagination();
        const query = this.buildUrl(this.query);
        this.fetch(query);
      },

      fetch(query = "") {
        fetch('http://localhost:3000/boats' + query)
          .then((resp) => resp.json())
          .then((data) => {
            this.boats = data.items
            this.count = data.count
            this.total = data.total
          });
      },

      resetPagination() {
        this.query.skip = 0;
      },

      buildUrl(params) {
        let esc = encodeURIComponent;
        let query = Object.keys(params)
          .map(function (k) {
              if (params[k]) {
                return esc(k) + '=' + esc(params[k])
              }
            }
          )
          .join('&');

        return '?' + query;
      },

      paginate() {
        const query = this.buildUrl(this.query);
        this.fetch(query);
      },
    },

    created() {
      this.fetch()
    }
  }
</script>

<style scoped>

</style>
