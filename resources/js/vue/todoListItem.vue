<template>
    <b-row>
        <b-col sm="1">
            <b-form-checkbox v-model="item.done" @change="updateItem"/>
        </b-col>
        <b-col sm="4">
            <span :class="[item.done ? 'text-secondary' : 'text-primary']">{{
                item.title
            }}</span>
        </b-col>
        <b-col sm="3">{{ item.description }}</b-col>
        <b-col sm="3">{{ item.due_date }} 
        </b-col>
        <b-col sm="1">
            <button @click="removeItem">Delete</button>
        </b-col>
    </b-row>
</template>

<script>
export default {
    props: ["item"],
    data: function() {
        return {
            items: []
        };
    },
    methods: {
        updateItem() {
            axios
                .put("api/item/" + this.item.id, {
                    items: this.item
                })
                .then(response => {
                    if (response.status == 200) {
                        this.$emit("itemchanged");
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        removeItem() {
            axios
                .delete("api/item/" + this.item.id)
                .then(response => {
                    if (response.status == 200) {
                        this.$emit("itemchanged");
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
    }
};
</script>

<style scoped>
.text-secondary {
    text-decoration: line-through;
}
</style>
