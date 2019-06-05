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
              <v-text-field v-model="innerData.name" label="Name"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="innerData.address" label="Address"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="innerData.device" label="Device"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="innerData.chip_id" label="Chip Id"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="innerData.manufacturer" label="Manufacturer"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="innerData.wifi_mac" label="wifi_mac"></v-text-field>
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
  props: ["open", "name", "item", "deviceData"],
  data() {
    return {
      dialog: false,
      notifications: false,
      sound: false,
      widgets: false,
      innerData: {}
    };
  },
  watch: {
    open: function(val) {
      this.dialog = val;
    },
    deviceData: function(val) {
      if (this.name == "Edit") {
        Object.assign(this.innerData, val);
      }
    }
  },
  methods: {
    closeDialog() {
      this.dialog = false;
      this.innerData = {};
      this.$emit("close");
    },
    save() {
      let self = this;
      if (this.name === "Add") {
        axios
          .post("/devices", this.innerData)
          .then(res => {
            console.log(res);
          })
          .catch(err => {
            console.log(err);
          });
      } else if (this.name === "Edit") {
        axios
          .put("/devices/" + this.innerData.id, this.innerData)
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
