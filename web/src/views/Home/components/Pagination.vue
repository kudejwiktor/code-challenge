<template>
    <nav class="pagination" role="navigation" aria-label="pagination">
        <a v-on:click="previous" class="pagination-previous">Previous</a>
        <a v-on:click="next" class="pagination-next">Next</a>
    </nav>
</template>

<script>
  export default {
    name: "Pagination",

    props: ['query', 'total'],

    data() {
      return {
        take: 20,
      }
    },

    methods: {
      canPrevious() {
        return this.query.skip > 0
      },

      canNext() {
        return this.query.skip + this.take < this.total;
      },

      previous: function () {
        if (this.canPrevious()) {
          this.$set(this.query, 'skip', this.query.skip - this.take);
          this.$emit('clicked')
        }
      },

      next() {
        if (this.canNext()) {
          this.$set(this.query, 'skip', this.query.skip + this.take);
          this.$emit('clicked')
        }
      }
    }
  }
</script>

<style scoped>

</style>