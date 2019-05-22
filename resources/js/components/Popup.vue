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
              <v-text-field v-model="deviceName" label="Name"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="address" label="Address"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="device" label="Device"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="chip_id" label="Chip Id"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="manufacturer" label="Manufacturer"></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field v-model="wifi_mac" label="wifi_mac"></v-text-field>
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
  props: ["open", "name", "id"],
  data() {
    return {
      dialog: false,
      notifications: false,
      sound: false,
      widgets: false,
      deviceName: "",
      address: "",
      device: "",
      status_id:"",
      chip_id:"",
      wifi_mac:"",
      manufacturer:""
    };
  },
  computed: {
    status() {
      return this.name == "Add" ? 1 : this.status_id;
    }
  },
  watch: {
    open: function(val) {
      this.dialog = val;
    }
  },
  methods: {
    closeDialog() {
      this.dialog = false;
      this.$emit("close");
    },
    save() {
      let self = this;
      axios
        .post("/devices", {
          address:self.address,
          name:self.name, 
          device:self.device,
          state_id:self.status_id ? self.status_id : self.status,
          manufacturer:self.manufacturer,
          wifi_mac:self.wifi_mac,
          chip_id:self.chip_id
        })
        .then(res => {
          console.log(res);
        })
        .catch( err => {
          console.log(err);
        } );
    }
  }
};
</script>
