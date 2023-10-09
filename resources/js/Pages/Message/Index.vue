<script>
import axios from 'axios';
export default {
    name: 'Index',
    props: [
        'messages',
        'info'
    ],
    data () {
        return {
            body: '',
        }
    },
    methods: {
        store() {
            axios.post('/messages/send', {body: this.body})
                .then( res => {
                    console.log(res.data)
                    this.messages.unshift(res.data);
                    this.body = '';
                })
        }
    },
    mounted() {
        console.log(this.messages);
    },
    created() {
        this.authUserId = this.info.me;
    },
}
</script>

<template>
    <div class="pt-3 pe-3 perfect-scrollbar ps ps--active-y" data-mdb-perfect-scrollbar="true" style="position: relative; height: 100%;">


        <div v-for="message in messages" :key="message.id">
            <template v-if="message.user_id_sender == this.authUserId">
                <div class="d-flex flex-row" :class="['message', message.user_id_sender == this.authUserId ? 'justify-content-end' : 'justify-content-start']">
                    <div>
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary" style="background-color: #e9e9e9;">
                            {{ message.body }}
                        </p>
                        <p class="small ms-3 mb-3 rounded-3 text-muted float-end">{{ message.time }}</p>
                    </div>
                    <img class="rounded-circle" src="https://media.istockphoto.com/id/1327592506/fr/vectoriel/ic%C3%B4ne-despace-r%C3%A9serv%C3%A9-de-photo-davatar-par-d%C3%A9faut-photo-de-profil-grise-homme-daffaires.jpg?s=2048x2048&w=is&k=20&c=tQFAQnQzS5QjjGB_nnco4LkKDxR-2ACKjBPqsbL3m0k=" alt="avatar 1" style="width: 45px; height: 45px">
                </div>
            </template>
            <template v-else>
                <div class="d-flex flex-row" :class="['message', message.user_id_sender == this.authUserId ? 'justify-content-end' : 'justify-content-start']">
                    <img class="rounded-circle" src="https://media.istockphoto.com/id/1327592506/fr/vectoriel/ic%C3%B4ne-despace-r%C3%A9serv%C3%A9-de-photo-davatar-par-d%C3%A9faut-photo-de-profil-grise-homme-daffaires.jpg?s=2048x2048&w=is&k=20&c=tQFAQnQzS5QjjGB_nnco4LkKDxR-2ACKjBPqsbL3m0k=" alt="avatar 1" style="width: 45px; height: 45px">
                    <div>
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #e9e9e9;">
                            {{ message.body }}
                        </p>
                        <p class="small ms-3 mb-3 rounded-3 text-muted float-end">{{ message.time }}</p>
                    </div>
                </div>
            </template>
        </div>

        <div class="text-muted d-flex justify-content-start align-items-center pt-3 mt-2" style="width: 100%; gap: 10px;">
            <img class="rounded-circle" src="https://media.istockphoto.com/id/1327592506/fr/vectoriel/ic%C3%B4ne-despace-r%C3%A9serv%C3%A9-de-photo-davatar-par-d%C3%A9faut-photo-de-profil-grise-homme-daffaires.jpg?s=2048x2048&w=is&k=20&c=tQFAQnQzS5QjjGB_nnco4LkKDxR-2ACKjBPqsbL3m0k=" alt="avatar 3" style="width: 40px; height: 40px;">
            <input v-model="body" type="text" class="form-control" placeholder="Type message">
            <a @click.prevent="store" href="#" class="btn btn-primary">Send</a>
        </div>

    </div>
</template>

<style scoped>

</style>
