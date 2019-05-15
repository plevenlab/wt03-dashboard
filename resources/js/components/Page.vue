<template>
  <div>
    <v-app>
      <v-toolbar app class="pa-2">
        <v-spacer></v-spacer>
        <v-btn fab dark color="indigo" @click="openDialog('Add')">
          <v-icon dark>add</v-icon>
        </v-btn>
      </v-toolbar>

      <Popup :open="dialog" :name="popupName" @close="closeDialog()"></Popup>

      <v-content class="mt-5">
        <v-container fluid>
          <List></List>
        </v-container>
      </v-content>

      <v-footer app></v-footer>
    </v-app>
  </div>
</template>

<script>
import List from "./List";
import Popup from "./Popup";

export default {
  data() {
    return {
        dialog:false,
        popupName:""
    };
  },
  methods: {
      openDialog(name) {
          this.popupName = name;
          this.dialog = true;
      },
      closeDialog() {
          this.dialog = false;
      }
  },
  components: {
    List,
    Popup
  }
};
</script>
