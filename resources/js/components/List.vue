<template>
  <div>
    <h2 class="py-3">{{listName}}</h2>

    <v-data-table :headers="headers" :items="devices" class="elevation-1" hide-actions>
      <template v-slot:items="props">
        <td>{{ props.item.id }}</td>
        <td class="text-xs-left">{{ props.item.name }}</td>
        <td class="text-xs-left">{{ props.item.address }}</td>
        <td class="text-xs-left">{{ props.item.device }}</td>
        <td class="text-xs-left">{{ props.item.chip_id }}</td>
        <td class="text-xs-left">{{ props.item.wifi_mac }}</td>
        <td class="text-xs-left">{{ props.item.state.name }}</td>
        <td class="text-xs-left">{{ props.item.created_at }}</td>
        <td class="text-xs-left">{{ props.item.updated_at }}</td>

        <td class="text-xs-left">
          <v-btn fab dark small color="pink">
            <v-icon dark>remove</v-icon>
          </v-btn>

          <v-btn v-if="listName == 'Devices'" fab dark small color="teal" @click="edit(props.item)">
            <v-icon dark>edit</v-icon>
          </v-btn>

          <v-btn v-else fab dark small color="indigo" @click="add(props.item.id)">
            <v-icon dark>add</v-icon>
          </v-btn>
        </td>
      </template>
    </v-data-table>
  </div>
</template>

<script>
const axios = require("axios");

export default {
  props: ["listName"],
  data() {
    return {
      headers: [
        {
          text: "id",
          align: "left",
          sortable: true,
          value: "id"
        },

        {
          text: "name",
          align: "left",
          sortable: true,
          value: "name"
        },

        {
          text: "address",
          align: "left",
          sortable: true,
          value: "address"
        },

        {
          text: "device",
          align: "left",
          sortable: true,
          value: "device"
        },

        {
          text: "chip_id",
          align: "left",
          sortable: true,
          value: "chip_id"
        },

        {
          text: "wifi_mac",
          align: "left",
          sortable: true,
          value: "wifi_mac"
        },

        {
          text: "status",
          align: "left",
          sortable: true,
          value: "status"
        },

        {
          text: "created_at",
          align: "left",
          sortable: true,
          value: "created_at"
        },

        {
          text: "updated_at",
          align: "left",
          sortable: true,
          value: "updated_at"
        },

        {
          text: "actions",
          align: "left",
          sortable: false,
          value: "action"
        }
      ]
      // devices: []
    };
  },
  computed: {
    devices() {
      return this.$store.state.devices.data;
    }
  },
  methods: {
    getDevices() {
      this.$store.dispatch("devices/getDevices");
    },
    edit(item) {
      this.$emit("edit", item);
    },
    add(id) {
      this.$emit("add", id);
    }
  },
  mounted() {
    this.getDevices();
  }
};
</script>
