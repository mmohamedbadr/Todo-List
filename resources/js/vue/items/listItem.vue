<template>
  <div class="todo-item">
    <div class="checker">
      <span>
        <input
          type="checkbox"
          id="checkbox"
          @change="updateItem()"
          v-model="item.is_completed"
      />
      <label for="checkbox">{{ item.is_completed }}</label>

      </span>
    </div>
    <span :class="[item.is_completed ? 'completed' : 'incompleted', 'itemText']">
      {{ item.name }}</span
    >
    <font-awesome-icon icon="trash-can" class="right" @click="deleteItem()">
    </font-awesome-icon>
  </div>
</template>

<script>
export default {
  //   data: () => {},
  props: ["item"],
  methods: {
    deleteItem() {
      axios
        .delete("api/items/" + this.item.id)
        .then((response) => {
          if (response.status == "200") {
            this.$emit("itemChanged");
          }
        })
        .catch((error) => {});
    },
    updateItem(val) {
      axios
        .put("api/items/" + this.item.id, {
          is_completed: this.item.is_completed,
        })
        .then((response) => {
          if (response.status == "200") {
            // this.$emit("itemChanged");
          }
        })
        .catch((error) => {});
    },
  },
  created() {
    console.log(this.item.is_completed);
  },
};
</script>

<style scoped>
.todo-item {
  padding: 15px;
  margin: 5px 0;
  border-radius: 0;
  background: #f7f7f7;
}

.todo-list.only-active .todo-item.complete {
  display: none;
}

.todo-list.only-active .todo-item:not(.complete) {
  display: block;
}

.todo-list.only-complete .todo-item:not(.complete) {
  display: none;
}

.todo-list.only-complete .todo-item.complete {
  display: block;
}

.todo-list .todo-item.complete span {
  text-decoration: line-through;
}

.remove-todo-item {
  color: #ccc;
  visibility: hidden;
}

.remove-todo-item:hover {
  color: #5f5f5f;
}

.todo-item:hover .remove-todo-item {
  visibility: visible;
}

div.checker {
  width: 18px;
  height: 18px;
}

div.checker input,
div.checker span {
  width: 18px;
  height: 18px;
}

div.checker span {
  display: -moz-inline-box;
  display: inline-block;
  zoom: 1;
  text-align: center;
  background-position: 0 -260px;
}

div.checker,
div.checker input,
div.checker span {
  width: 19px;
  height: 19px;
}

div.checker,
div.radio,
div.uploader {
  position: relative;
}

div.button,
div.button *,
div.checker,
div.checker *,
div.radio,
div.radio *,
div.selector,
div.selector *,
div.uploader,
div.uploader * {
  margin: 0;
  padding: 0;
}

div.button,
div.checker,
div.radio,
div.selector,
div.uploader {
  display: -moz-inline-box;
  display: inline-block;
  zoom: 1;
  vertical-align: middle;
}
.itemText {
  font-size: 13pt;
  margin-inline: 2rem;
  font-weight: 700;
  color: darkolivegreen;
}
.completed {
  text-decoration: line-through;
  color: #ccc;
}
.incompleted {
  text-decoration: none;
  color:blue;
}
</style>
