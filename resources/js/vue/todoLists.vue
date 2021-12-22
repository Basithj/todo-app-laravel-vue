<template>
    <div>
        <b-list-group>
            <b-list-group-item v-for="(item, index) in items" :key="index">
                <todo-list-item
                    :item="item"
                    v-on:itemchanged="$emit('reloaditems')"
                />
            </b-list-group-item>
        </b-list-group>
    </div>
</template>

<script>
import todoListItem from "./todoListItem";

export default {
    props: ["items"],
    components: {
        todoListItem
    }
};
</script>
