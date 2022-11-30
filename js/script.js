const { createApp } = Vue;

createApp({
  data() {
    return {
      newTodoText: "",
      todoList: [],
      apiUrl: "./server.php",
    };
  },
  methods: {
    getTodo() {
      axios.get(this.apiUrl).then((res) => {
        this.todoList = res.data;
      });
    },
    addTodo() {
      const data = {
        newTodoText: this.newTodoText,
      };
      axios
        .post(this.apiUrl, data, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          console.log(res.data);

          this.getTodo();
          this.newTodoText = "";
        });
    },
    eraseTask(index) {
      this.todoList.splice(index, 1);
    },
    changeStatus(index) {
      this.todoList[index].done = !this.todoList[index].done;
    },
  },
  mounted() {
    this.getTodo();
  },
}).mount("#app");
