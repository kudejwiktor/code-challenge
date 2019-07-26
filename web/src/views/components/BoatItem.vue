<template>
    <div>
    <td>
        {{boat.name}}
    </td>
    <td>
        {{boat.age}}
    </td>
    </div>
</template>

<script>
  export default {
    name: 'BoatItem',
    props: ['boat'],
  }
</script>

<style scoped>

</style>