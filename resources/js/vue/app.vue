<template>
  <div class="todolistContainer">
    <div class="heading">
      <h2>Todo-List</h2>
      <add-item-form  v-on:reloadItems="getListItems()"/>
    </div>
    <list-view :items = "items" v-on:reloadItems="getListItems()"/>
  </div>
</template>
<script>
import addItemForm from "./items/addItemForm.vue";
import listView from "./items/listView.vue";

export default {
  components: {
    addItemForm,
    // listItemView,
    listView,
  },
  data: function () {
    return { items: [] };
  },
  methods: {
    getListItems() {
      axios
        .get("api/items/")
        .then((response) => {
            if(response.status == "200"){
                console.log(response.data)
                this.items = response.data
            }
        })
        .catch((error) => {});
    },
  },
  created(){
      this.getListItems()
  }
};
</script>
<style scoped>
.todolistContainer {
  width: 600px;
  margin: auto;
}
h1 {
  color: #111;
  font-family: "Helvetica Neue", sans-serif;
  font-size: 275px;
  font-weight: bold;
  letter-spacing: -1px;
  line-height: 1;
  text-align: center;
}
h2 {
  color: #111;
  font-family: "Open Sans", sans-serif;
  font-size: 30px;
  font-weight: 300;
  line-height: 32px;
  margin: 0 0 72px;
  text-align: center;
}

p {
  color: #685206;
  font-family: "Helvetica Neue", sans-serif;
  font-size: 14px;
  line-height: 24px;
  margin: 0 0 24px;
  text-align: justify;
  text-justify: inter-word;
}

h3 {
  font-size: 24px;
  line-height: 40px;
}

h4 {
  font-size: 18px;
  line-height: 20px;
}

/* Won't be used here */

h5 {
  font-size: 14px;
  line-height: 20px;
}

h6 {
  font-size: 12px;
  line-height: 20px;
}
</style>
