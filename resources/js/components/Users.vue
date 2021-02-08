<template>
<div>
    <validation v-if="validationErrors"
                :errors="validationErrors"
    >
    </validation>
<div class="col-md-12">
    <div class="row">
        <div class="text-center">
            <h1>Создайте сокращенную ссылку уже сейчас! </h1>
        </div>
        <h3 class="mt-5 ">Пользователь: {{user.name}}</h3>
        <h3 class="mt-5 ">Email: {{user.email}}</h3>
    </div>

</div>

<div class="col-md-12">
    <div v-if="loading"><h2>Загружаем записи...</h2></div>
    <div class="row">
        <div class="card-header mt-5">
            <h2 class="mt-3" v-if="edit === false">Сократить: {{link}}</h2>
            <h2 class="mt-3" v-else>Редактировать:</h2>
            <form @submit.prevent="addLink()">
                <div class="input-group mb-3">
                    <input v-if="edit === false" v-model="link" type="text" id="link" class="form-control" placeholder="URL">

                    <input v-if="edit === true" v-model="newLink"  type="text" id="newLink" class="form-control" placeholder="URL">
                    <input v-if="edit === true" v-model="oldLink"  type="text" id="oldLink" class="form-control" placeholder="URL">

                    <div class="input-group-append">
                        <button v-if="edit === false" class="btn btn-primary" type="submit">Сократить ссылку</button>
                        <button v-else class="btn btn-success" type="submit">Сохранить изменения</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-bordered ">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Сокращенная ссылка</th>
                <th scope="col">Ссылка</th>
                <th scope="col">Операции</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(link, index) in links.slice().reverse()" :key="link.id">
                <th>{{  links.length - index }}</th>
                <td><a v-bind:href="link.old_link"
                       target="_blank">{{ link.new_link }}</a>
                </td>
                <td>{{ link.old_link }}</td>
                                <td>
                    <div class="d-inline-block">
                        <button @click="editLink(link)" class="btn mt-2 btn-success">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button @click="deleteLink(link.id)" class="btn mt-2 btn-danger">
                            <i class="far fa-times-circle"></i>
                        </button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</div>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    id: '',
                    name: '',
                    email: ''
                },
                links: [],
                userId: '',
                edit: false,
                loading: true,
                errored: false,
                link: '',
                linkId: '',
                oldLink: '',
                newLink: '',
                validationErrors: ''
            }
        },
        mounted() {
            this.getLinks()
        },
        methods: {
            getLinks() {
                axios
                    .get('/links')
                    .then(response => {
                        this.user = response.data
                        this.links = response.data.links

                    })
                    .catch(error => {

                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false);
            },
            addLink() {
                if (this.edit === false) {
                    // Добавляем ссылку
                    axios
                        .post('/api/links', {
                            user_id: this.user.id,
                            link: this.link
                        })
                        .then(response => {
                            this.link = ''
                            this.getLinks()
                        })
                        .catch(error => {
                            if (error.response.status === 422)
                            {
                                this.validationErrors = error.response.data.errors
                            }
                            console.log(error)
                        })
                }else{
                    // Edit Link
                    axios
                        .put(`/api/links/${this.linkId}`, {
                            newLink: this.newLink,
                            oldLink: this.oldLink
                        })
                        .then(response => {
                            this.link = ''
                            this.newLink = ''
                            this.oldLink = ''
                            this.linkId = ''
                            this.getLinks()
                        })
                        .catch(error => {
                            if (error.response.status === 422)
                            {
                                this.validationErrors = error.response.data.errors
                            }
                            console.log(error)
                        })
                        .finally(() => this.edit = false );
                }
            },
            editLink(link) {
                //console.log(link)
                this.edit = true
                this.linkId = link.id
                this.oldLink = link.old_link
                this.newLink = link.new_link
            },
            deleteLink(id) {
                axios
                    .delete(`/api/links/${id}`)
                    .then(response => {
                        this.link = ''
                        this.getLinks()
                    })
                    .catch(error => console.log(error))
            },
        }
    }
</script>

<style scoped>

</style>
