<template>
    <BoatDetails :boat="boat"/>
</template>

<script>
  import BoatDetails from "./components/BoatDetails";
  export default {
    name: 'Detail',
    components: {BoatDetails},
    data() {
      return {
        boat: {},
      }
    },

    created() {
      let id = this.$route.params.id;
      fetch('http://localhost:3000/boat/' + id)
        .then((resp) => resp.json())
        .then((data) => {
          console.log(data.mmk);
          this.boat.mmk = (data.mmk) ? 'yes' : 'no';
          this.boat = data
        });
    }
  }
</script>