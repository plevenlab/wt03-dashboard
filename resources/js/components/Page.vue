<template>
  <div>
    <v-app>
      <Popup
        :id="dialogId"
        :open="dialog"
        :name="popupName"
        :deviceData="deviceData"
        @close="closeDialog()"
      ></Popup>

      <!-- <Filters></Filters> -->

      <v-container fluid>
        <v-card class="py-5">
          <v-btn @click="add()" dark absolute top right fab color="indigo">
            <v-icon dark>add</v-icon>
          </v-btn>
          <v-layout row>
            <v-flex lg10 offset-lg1 pa-1>
              <v-content class="mt-5">
                <v-container fluid>
                  <List :listName="'Devices'" @edit="edit"></List>
                </v-container>
              </v-content>
            </v-flex>
          </v-layout>
        </v-card>
      </v-container>

      <v-footer app></v-footer>
    </v-app>
  </div>
</template>

<script>
import List from "./List";
import Popup from "./Popup";
import Filters from "./Filter";

export default {
  data() {
    return {
      dialog: false,
      popupName: "",
      dialogId: "",
      active: "",
      deviceData: {}
    };
  },
  methods: {
    openDialog(name, data) {
      this.popupName = name;
      this.dialog = true;

      if (data) {
        this.dialogId = data.id;
        this.deviceData = data;
      } else {
        this.deviceData = {};
      }
    },
    closeDialog() {
      this.dialog = false;
    },
    edit(item) {
      this.openDialog("Edit", item);
    },
    add() {
      this.openDialog("Add");
    }
  },
  components: {
    List,
    Popup,
    Filters
  }
};
</script>
