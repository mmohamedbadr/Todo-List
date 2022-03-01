<template>
  <div class="itemFrom container" id="addItemForm">
    <div class="col-8">
      <input
        placeholder="Title"
        type="text"
        name="name"
        v-model="item.name"
        class="form-control"
        id="itemName"
      />
    </div>
    <div class="col-3">
      <font-awesome-icon
        icon="plus-square"
        @click="addItem"
        :class="[item.name ? 'active' : 'inactive', 'plusIcon']"
      ></font-awesome-icon>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      item: {
        name: "",
      },
    };
  },
  methods: {
    addItem() {
      if (this.item.name == "") {
        return;
      } else {
        axios
          .post("api/items/store", {
            name: this.item.name,
          })
          .then((response) => {
            if (response.status == "201") {
              this.item.name = "";
              this.$emit("reloadItems");
            }
          })
          .catch((error) => {});
      }
    },
  },
};
</script>

<style>
.itemFrom {
  display: flex;
  justify-content: center;
}
.plusIcon {
  font-size: 36px;
  margin-inline: 1rem;
}
.active {
  color: green;
  cursor: pointer;
}
.inactive {
  color: gray;
}
</style>
