<template>
    <h1>Contacts</h1>
    <h4>New Contact</h4>
    <form action="#" @submit.prevent="edit ? updateContact(contact.id) : createContact()">
        <div class="input-group">
            <input v-model="contact.name" v-el:taskinput type="text" name="body" class="form-control" autofocus>
            <span class="input-group-btn">
                <button v-show="!edit" type="submit" class="btn btn-primary">New Task</button>
                <button v-show="edit" type="submit" class="btn btn-primary">Edit Task</button>
            </span>
        </div>
    </form>
    <h4>All Tasks</h4>
    <ul class="list-group">
        <li class="list-group-item" v-for="contact in list">
            {{ contact.name }} - {{contact.phone}} -{{contact.email}}
            <button @click="showTask(contact.id)" class="btn btn-primary btn-xs">Edit</button>
            <button @click="deleteTask(contact.id)" class="btn btn-danger btn-xs">Delete</button>
        </li>
    </ul>
</template>

<script>
    export default {
        data: function() {
            return {
                edit: false,
                list: [],
                contact: {
                    id: '',
                    first_name: '',
                    last_name: '',
                    phone: '',
                    email: '',
                    sex: '',
                    age: '',
                    address: ''
                }
            };
        },

        ready: function() {
            this.fetchContactList();
        },

        methods: {
            fetchContactList: function() {
                this.$http.get('api/contacts').then(function (response) {
                    this.list = response.data
                });
            },

            createContact: function () {
                this.$http.post('api/contacts/store', this.contact)
                this.contact.first_name = ''
                this.contact.last_name = ''
                this.contact.email = ''
                this.contact.phone = ''
                this.contact.age = ''
                this.contact.sex = ''
                this.contact.address = ''
                this.edit = false
                this.fetchContactList()
            },

            updateContact: function(id) {
                this.$http.patch('api/contacts/' + id, this.contact)
                this.contact.first_name = ''
                this.contact.last_name = ''
                this.contact.email = ''
                this.contact.phone = ''
                this.contact.age = ''
                this.contact.sex = ''
                this.contact.address = ''
                this.edit = false
                this.fetchContactsList()
            },

            showContact: function(id) {
                this.$http.get('api/contacts/' + id).then(function(response) {

                    this.contact = response.data
                })
                this.$els.contactinput.focus()
                this.edit = true
            },

            deleteContact: function (id) {
                this.$http.delete('api/contact/' + id)
                this.fetchContactsList()
            },
        }
    }
</script>