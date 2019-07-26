<template>
  <div id="app" class="container">
    <section class="hero has-text-centered is-centered">
      <div class="hero-body">
        <div class="container">
          <router-view/>
        </div>
      </div>
    </section>

  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>
