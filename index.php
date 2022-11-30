<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@3.2.41/dist/vue.global.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP To-Do List</title>
</head>

<body>
    <div id="app">
        <div class="wrapper">
            <h1 class="text-center py-5">To-Do List</h1>
            <div class="container">
                <ul>
                    <li v-for="(todo, index) in todoList" :key="index">
                        <div class="to-do" :class="todo.done ? 'done' : ''" @click="changeStatus(index)">
                            {{ todo.text }}
                        </div>

                        <button id="erase-btn" @click="eraseTask(index)"><i class="fa-solid fa-trash"></i></button>
                    </li>
                </ul>
            </div>

            <div class="add-task">
                <input type="text" v-model="newTodoText" name="newTodoText" @keyup.enter="addTodo"></input>
                <button id="add-btn" @click="addTodo">Aggiungi</button>
            </div>
        </div>
    </div>

    <script src="./js/script.js"></script>
</body>

</html>