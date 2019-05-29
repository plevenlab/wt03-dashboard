<template>
  <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
    <v-card>
      <v-toolbar dark color="primary">
        <v-btn icon dark @click="closeDialog()">
          <v-icon>close</v-icon>
        </v-btn>
        <v-toolbar-title>{{name}} device</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
          <v-btn dark flat @click="save()">Save</v-btn>
        </v-toolbar-items>
      </v-toolbar>

      <v-form>
        <v-container>
          <v-layout row wrap>
            <v-flex xs12 md4>
              <v-text-field v-model="deviceData.name" label="Name"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="deviceData.address" label="Address"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="deviceData.device" label="Device"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="deviceData.chip_id" label="Chip Id"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="deviceData.manufacturer" label="Manufacturer"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="deviceData.wifi_mac" label="wifi_mac"></v-text-field>
            </v-flex>
          </v-layout>
        </v-container>
      </v-form>
    </v-card>
  </v-dialog>
</template>

<script>
const axios = require("axios");

export default {
  props: ["open", "name", "id", "deviceData"],
  data() {
    return {
      dialog: false,
      notifications: false,
      sound: false,
      widgets: false
    };
  },
  computed: {
    status() {
      return this.name == "Add" ? 1 : this.status_id;
    }
  },
  watch: {
    open: function (val) {
      this.dialog = val;
      console.log('deviceData: ', this.deviceData);
    }
  },
  methods: {
    closeDialog() {
      this.dialog = false;
      this.$emit("close");
    },
    save() {
      let self = this;
      if (this.name === "Add") {
        axios
          .post("/devices", this.deviceData)
          .then(res => {
            console.log(res);
          })
          .catch(err => {
            console.log(err);
          });
      } else if (this.name === 'Edit') {
        axios
          .put("/devices/" + this.id, this.deviceData)
          .then(res => {
            console.log(res);
          })
          .catch(err => {
            console.log(err);
          });
      }
    }
  }
};
</script>
