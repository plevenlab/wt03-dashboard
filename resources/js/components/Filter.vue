<template>
  <div>
    <v-select v-model="value" :items="items" chips label="Chips" multiple solo></v-select>
  </div>
</template>
<script>
export default {
    data() {
        return {
            items:["item1", "item2"]
        }
    },
    mounted() {

    }
};

</script>

