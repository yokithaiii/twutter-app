<script>
import axios from 'axios';
export default {
    name: 'Index',
    props: [
        'messages'
    ],
    data () {
        return {
            body: '',
            messages: []
        }
    },
    methods: {
        store() {
            axios.post('/contacts', {body: this.body})
                .then( res => {
                    this.messages.unshift(res.data);
                    this.body = '';
                })
        }
    }
}
</script>

<template>
    <div class="w-1/2 mx-auto py-6">
        <div>
            <h3>
                Messages
            </h3>
            <div>
                <div v-for="message in messages">
                    <p>{{message.id}}</p>
                    <p>{{message.body}}</p>
                    <p>{{message.time}}</p>
                </div>
            </div>
        </div>
        <div>
            <div>
                <input v-model="body" type="text" name="" id="" placeholder="Text...">
            </div>

            <div>
                <a @click.prevent="store" href="#" class="btn btn-primary">Send</a>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
