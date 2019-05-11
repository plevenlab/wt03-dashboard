<template>
  <div>
    <v-data-table :headers="headers" :items="devices" class="elevation-1" hide-actions>
      <template v-slot:items="props">
        <td>{{ props.item.name }}</td>
        <td class="text-xs-right">{{ props.item.calories }}</td>
        <td class="text-xs-right">{{ props.item.fat }}</td>
        <td class="text-xs-right">{{ props.item.carbs }}</td>
        <td class="text-xs-right">{{ props.item.protein }}</td>
        <td class="text-xs-right">{{ props.item.iron }}</td>
      </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      headers: [
        {
          text: "Temperature",
          align: "left",
          sortable: false,
          value: "temperature"
        },

        {
          text: "Humidity",
          align: "left",
          sortable: false,
          value: "humidity"
        },

        {
          text: "Presure",
          align: "left",
          sortable: false,
          value: "presure"
        }
      ],
      devices: []

      // desserts: [
      //   {
      //     name: "Frozen Yogurt",
      //     calories: 159,
      //     fat: 6.0,
      //     carbs: 24,
      //     protein: 4.0,
      //     iron: "1%"
      //   },
      // ]
    };
  }
};
</script>
