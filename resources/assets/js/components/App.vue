<template>
    <div id="app">
        <form action="" method="post">

            <div class="input-group">
                
                <input name="todo" type="text" class="form-control" id="todo"  placeholder="to do.."><span><button id="addButton" @click="create()">+</button></span>

                 
            </div>

            
        </form>
        <br><hr>
        <todo-list
            v-for="todo in todos"
            v-bind="todo"
            :key="todo.id"
            @delete="del"
        ></todo-list>
    </div>
</template>

<script>
    function Todo({id, todo, user_id, created_at}){
        this.id = id;
        this.todo = todo;
        this.user_id = user_id;
        this.created_at = created_at;
    }
    import TodoList from './TodoList.vue';
    export default{
        data: function(){
            return {
                todos: [],
                working: false
            }
        },

        methods: {
            create(){
                this.mute = true;
                window.axios.get('/api/todos/create').then(({data}) => {
                    this.todos.push(new Todo(data));
                    this.mute = false;
                });
            },

            read(){
                this.mute = true;
                window.axios.get('api/todos').then(({data}) => {
                    data.forEach(todos => {
                    this.todos.push(new Todo(todos));
                });
                this.mute = false;
            });
            },

            del(id){
                this.mute = true;
                window.axios.delete(`/api/todos/${id}`).then(() => {
                    let index = this.todos.findIndex(todo => todo.id === id);
                    this.todos.splice(index, 1);
                    this.mute = false;
                });
            }
        },

        watch: {
            mute(val) {
                document.getElementById('mute').className = val ? "on" : "";
            }
        },

        components: {
            TodoList
        },

        created(){
            this.read()
        }
    }
</script>

<style>
    #addButton {
        background-color: #fdfdfd !important;
        border: none;
        font-size: 30px !important;
        color: blue;
    }
</style>

