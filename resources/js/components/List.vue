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
        <td class="text-xs-left">{{ props.item.created_at }}</td>
        <td class="text-xs-left">{{ props.item.updated_at }}</td>

        <td class="text-xs-left">
          <v-btn fab dark small color="pink">
            <v-icon dark>remove</v-icon>
          </v-btn>

          <v-btn v-if="listName == 'Provisioned'" fab dark small color="teal" @click="edit(props.item.id)">
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
          sortable: false,
          value: "id"
        },

        {
          text: "name",
          align: "left",
          sortable: false,
          value: "name"
        },

        {
          text: "address",
          align: "left",
          sortable: false,
          value: "address"
        },

        {
          text: "device",
          align: "left",
          sortable: false,
          value: "device"
        },

        {
          text: "chip_id",
          align: "left",
          sortable: false,
          value: "chip_id"
        },

        {
          text: "wifi_mac",
          align: "left",
          sortable: false,
          value: "wifi_mac"
        },

        {
          text: "created_at",
          align: "left",
          sortable: false,
          value: "created_at"
        },

        {
          text: "updated_at",
          align: "left",
          sortable: false,
          value: "updated_at"
        },

        {
          text: "actions",
          align: "left",
          sortable: false,
          value: "action"
        }
      ],
      devices: [
        {
          id: "1",
          name: "test",
          address: "addres",
          device: "device",
          chip_id: "chip_id",
          wifi_mac: "wifi_mac",
          created_at: "created_at",
          updated_at: "updated_at"
        }
      ]
    };
  },
  methods: {
    getDevices() {
      let self = this;

      axios
        .get("/devices")
        .then(function(response) {
          // handle success
          console.log(response);
          self.devices = response.data;
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    edit(id) {
      this.$emit("edit", id);
    },
    add(id) {
      console.log(1);
      
      this.$emit("add", id);
    }
  },
  mounted() {
    this.getDevices();
  }
};
</script>
