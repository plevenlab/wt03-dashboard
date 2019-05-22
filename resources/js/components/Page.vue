<template>
  <div>
    <v-app>

      <Popup :id="dialogId" :open="dialog" :name="popupName" @close="closeDialog()"></Popup>

      <v-container fluid>
        <v-card class="py-5">
          <v-layout row>
            <v-flex lg10 offset-lg1 pa-1>
              <v-tabs v-model="active" color="cyan" dark slider-color="yellow">
                <v-tab v-for="(tab, index) in tabNames" :key="index">{{tab}}</v-tab>
                <v-tab-item>
                  <v-content class="mt-5">
                    <v-container fluid>
                      <List :listName="'Provisioned'" @edit="edit"></List>
                    </v-container>
                  </v-content>
                </v-tab-item>

                <v-tab-item>
                  <v-content class="mt-5">
                    <v-container fluid>
                      <List :listName="'Discovered'" @add="add"></List>
                    </v-container>
                  </v-content>
                </v-tab-item>
              </v-tabs>
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

export default {
  data() {
    return {
      dialog: false,
      popupName: "",
      dialogId: "",
      tabNames: ["Provisioned", "Discovered"],
      active:"",
    };
  },
  methods: {
    openDialog(name, id) {
      this.popupName = name;
      this.dialog = true;
      this.dialogId = id;
    },
    closeDialog() {
      this.dialog = false;
    },
    edit(id) {
      this.openDialog("Edit", id);
    },
    add(id) {
      this.openDialog("Add", id);
    }
  },
  components: {
    List,
    Popup
  }
};
</script>
