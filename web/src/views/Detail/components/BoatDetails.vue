<template>
    <div class="small-table">
        <div class="hero-title">{{boat.name}}</div>
        <table class="table">
            <tr>
                <th>Name</th>
                <td>{{boat.name}}</td>
            </tr>
            <tr>
                <th>Location</th>
                <td>{{boat.location}}</td>
            </tr>
            <tr>
                <th>Type</th>
                <td>{{boat.type}}</td>
            </tr>
            <tr>
                <th>Mmk</th>
                <td>{{boat.mmk}}</td>
            </tr>
            <tr>
                <th>Age</th>
                <td>{{boat.age}}</td>
            </tr>
            <tr>
                <th>Cabins</th>
                <td>{{boat.cabins}}</td>
            </tr>
            <tr>
                <th>Bathrooms</th>
                <td>{{boat.bathrooms}}</td>
            </tr>
            <tr>
                <th>Length</th>
                <td>{{boat.length}}</td>
            </tr>
            <tr>
                <th>Nr of guests</th>
                <td>{{boat.nr_guests}}</td>
            </tr>
            <tr>
                <th>Data</th>
                <td>{{boat.data_quality }}</td>
            </tr>
            <tr>
                <th>Rating</th>
                <td>{{boat.rating}}</td>
            </tr>
            <tr>
                <th>Review</th>
                <td>{{boat.review_count}}</td>
            </tr>
            <tr>
                <th>Year</th>
                <td>{{boat.year}}</td>
            </tr>
        </table>
    </div>
</template>

<script>
  export default {
    name: "BoatDetails",
    props: ['boat'],
    data() {
      return {
        boat: {},
      }
    }
  }
</script>

<style scoped>
    .small-table {
        width: 35%;
        margin: 0 auto;
    }
</style>