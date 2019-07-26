<template>
    <tbody>
    <tr>
        <th>
            Name
            <input type="text" v-on:input="emitChanges" class="input is-small">
        </th>
        <th>
            Location
            <input type="text" v-on:input="emitChanges" v-model="location" class="input is-small">
        </th>
        <th>
            Type
            <input type="text" v-on:input="emitChanges" v-model="type" class="input is-small">
        </th>
        <th>
            Mk
            <input type="checkbox" v-on:change="emitChanges" v-model="mmk">
        </th>
        <th>
            Age
            <input type="text" v-on:input="emitChanges" v-model="min_age" placeholder="min" class="input is-small">
            <input type="text" v-on:input="emitChanges" v-model="max_age" placeholder="max" class="input is-small">
        </th>
        <th>
            Cabins
            <input type="text" v-on:input="emitChanges" v-model="min_cabins" placeholder="min" class="input is-small">
            <input type="text" v-on:input="emitChanges" v-model="max_cabins" placeholder="max" class="input is-small">
        </th>
        <th>
            Bathroom
            <input type="text" v-on:input="emitChanges" v-model="min_bathroom" placeholder="min" class="input is-small">
            <input type="text" v-on:input="emitChanges" v-model="max_bathroom" placeholder="max" class="input is-small">
        </th>
        <th>
            Length
            <input type="text" v-on:input="emitChanges" v-model="min_length" placeholder="min" class="input is-small">
            <input type="text" v-on:input="emitChanges" v-model="max_length" placeholder="max" class="input is-small">
        </th>
        <th>
            Nr of guest
            <input type="text" v-on:input="emitChanges" v-model="min_nr_guest" placeholder="min" class="input is-small">
            <input type="text" v-on:input="emitChanges" v-model="max_nr_guest" placeholder="max" class="input is-small">
        </th>
        <th>
            Data quality
            <input type="text" v-on:input="emitChanges" v-model="min_data_quality" placeholder="min" class="input is-small">
            <input type="text" v-on:input="emitChanges" v-model="max_data_quality" placeholder="max" class="input is-small">
        </th>
        <th>
            Rating
            <input type="text" v-on:input="emitChanges" v-model="min_rating" placeholder="min" class="input is-small">
            <input type="text" v-on:input="emitChanges" v-model="max_rating" placeholder="max" class="input is-small">
        </th>
        <th>
            Review count
            <input type="text" v-on:input="emitChanges" v-model="min_review_count" placeholder="min" class="input is-small">
            <input type="text" v-on:input="emitChanges" v-model="max_review_count"  placeholder="max" class="input is-small">
        </th>
        <th>
            Year
            <input type="text" v-on:input="emitChanges" v-model="min_year" placeholder="min" class="input is-small">
            <input type="text" v-on:input="emitChanges" v-model="max_year" placeholder="max" class="input is-small">
        </th>
    </tr>
    </tbody>
</template>

<script>
  export default {
    name: "Thead",
    data() {
      return {
        'name': null,
        'location': null,
        'type': null,
        'mmk': null,
        'min_age': null,
        'max_age': null,
        'min_cabins': null,
        'max_cabins': null,
        'min_bathroom': null,
        'max_bathroom': null,
        'min_length': null,
        'max_length': null,
        'min_nr_guest': null,
        'max_nr_guest': null,
        'min_data_quality': null,
        'max_data_quality': null,
        'min_rating': null,
        'max_rating': null,
        'min_review_count': null,
        'max_review_count': null,
        'min_year': null,
        'max_year': null,
      }
    },
    methods: {
      emitChanges: function () {
        this.$emit('changed', this.getNullLessParams(this.$data));
      },

      getNullLessParams(params) {
        return Object.keys(params).reduce((newObj, key) => {
          const value = params[key];
          if (value !== null) {
            newObj[key] = value;
          }
          return newObj;
        }, {});
      }
    }
  }
</script>

<style scoped>

</style>