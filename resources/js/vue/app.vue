<template>
    <div class="container w-50">
        <add-todo-list v-on:itemadded="getTodoList()"></add-todo-list>

        <vue-bootstrap-typeahead
            :data="items"
            size="lg"
            :serializer="s => s.title"
            placeholder="Search title..."
            class="mt-4"
        />

        <todo-lists
            :items="items"
            class="mt-5"
            v-on:reloaditems="getTodoList()"
        />
    </div>
</template>

<script>
import VueBootstrapTypeahead from "vue-bootstrap-typeahead";
import addTodoList from "./addTodoList";
import todoLists from "./todoLists";

export default {
    components: {
        addTodoList,
        todoLists,
        VueBootstrapTypeahead
    },
    data: function() {
        return {
            items: []
        };
    },
    methods: {
        getTodoList() {
            axios
                .get("api/items")
                .then(response => {
                    this.items = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.getTodoList();
    }
};
</script>
