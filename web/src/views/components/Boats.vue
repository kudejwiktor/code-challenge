<template>
    <tbody>
    <tr v-bind:key="boat.id" v-for="boat in boats" @click="details(boat.id)">
        <td>{{boat.name}}</td>
        <td>{{boat.location}}</td>
        <td>{{boat.type}}</td>
        <td>{{boat.mmk}}</td>
        <td>{{boat.age}}</td>
        <td>{{boat.cabins}}</td>
        <td>{{boat.bathrooms}}</td>
        <td>{{boat.length}}</td>
        <td>{{boat.nr_guests}}</td>
        <td>{{boat.data_quality }}</td>
        <td>{{boat.rating}}</td>
        <td>{{boat.review_count}}</td>
        <td>{{boat.year}}</td>
    </tr>
    </tbody>
</template>

<script>

  export default {
    name: 'Boats',
    props: ['boats'],
    methods: {
      details(id) {
        this.$router.push({path: '/boat/' + id})
      }
    }
  }
</script>

<style scoped>
</style>
