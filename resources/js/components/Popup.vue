<template>
  <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
    <v-card>
      <v-toolbar dark color="primary">
        <v-btn icon dark @click="closeDialog()">
          <v-icon>close</v-icon>
        </v-btn>
        <v-toolbar-title>{{name}} divice <span v-if="id">{{id}}</span></v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
          <v-btn dark flat @click="dialog = false">Save</v-btn>
        </v-toolbar-items>
      </v-toolbar>

      <v-form>
        <v-container>
          <v-layout>

            <v-flex xs12 md4>
              <v-text-field
                v-model="deviceName"
                label="Name"
              ></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field
                v-model="address"
                label="Address"
              ></v-text-field>
            </v-flex>

            <v-flex xs12 md4>
              <v-text-field 
              v-model="device" 
              label="Device" 
            ></v-text-field>

            </v-flex>

          </v-layout>
        </v-container>
      </v-form>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  props: ["open", "name", "id"],
  data() {
    return {
      dialog: false,
      notifications: false,
      sound: false,
      widgets: false,
      deviceName:"",
      address:"",
      device:""
    };
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
    }
  }
};
</script>
