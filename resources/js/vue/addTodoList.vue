<template>
    <div>
        <b-form>
            <b-form-group id="title" label="Todo Title" label-for="input-2">
                <b-form-input
                    id="input-2"
                    placeholder="Add Title"
                    v-model="items.title"
                    required
                ></b-form-input>
            </b-form-group>
            <label for="duedate">Description</label>
            <b-form-textarea
                id="description"
                placeholder="Add Description"
                rows="3"
                max-rows="6"
                v-model="items.description"
            ></b-form-textarea>
            <label for="duedate">Add due date</label>
            <b-form-datepicker
                id="duedate"
                class="mb-2"
                v-model="items.due_date"
            ></b-form-datepicker>

            <b-button type="button" variant="primary" @click="addItem()"
                >Add</b-button
            >
        </b-form>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            items: {
                title: "",
                description: "",
                due_date: ""
            }
        };
    },
    methods: {
        addItem() {
            if (this.items.title == "") {
                return;
            }

            axios
                .post("api/item/store", {
                    items: this.items
                })
                .then(response => {
                    if (response.status == 201) {
                        this.items.title = "";
                        this.items.description = "";
                        this.items.due_date = "";
                        this.$emit("itemadded", this.items);
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>
