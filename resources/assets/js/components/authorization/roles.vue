<template>
    <div>
        <div class="column is-9">
            <h2 class="title is-3">
                Rollen
            </h2>

            <div v-if="roles.length > 0">
                <div class="notification is-danger" v-for="role in roles">
                    <button class="delete" @click="destroy(role.id)"></button>
                    {{ role.name }}
                </div>
            </div>

            <div v-else>
                <p>Er zijn nog geen rollen.</p>
            </div>
        </div>

        <div class="column is-9">
            <a type="submit" value="Maak rol" class="button is-primary is-outlined" @click="newRole()">
                Nieuwe rol
            </a>
        </div>
    </div>
</template>

<script>
    import RoleService from '../../services/RoleService';

    export default {

        props: ['prp-roles'],

        data() {
            return {
                role: { name: "" },
                roles: []
            }
        },

        created() {
            this.roles = this.prpRoles;
        },

        methods: {
            destroy(id) {
                RoleService.destroy(id)
                    .then(({data}) => {
                    swal(({
                    title: 'Verwijderd',
                    text: data.status,
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1000
                }));

                this.roles = this.roles.filter((item) => item.id != id);
            })
            .catch(error => {
                    let message = Object.keys(error.response.data)[0];

                swal(
                    'Geannuleerd',
                    error.response.data[message],
                    'error'
                )
            });
            },

            newRole() {
                swal({
                    title: 'Nieuwe rol',
                    input: 'text',
                    inputValue: this.role.name,
                    confirmButtonText: 'Opslaan',
                    showLoaderOnConfirm: true,
                    preConfirm: (value) => {
                    this.role.name = value;
                return new Promise((resolve, reject) => {
                        RoleService.store(this.role)
                        .then(({data}) => {
                        swal(({
                        title: 'Aangemaakt',
                        text: data.status,
                        type: 'success',
                        showConfirmButton: false,
                        timer: 1000
                    }));

                this.roles.push(data);
            })
            .catch(error => {
                    reject(error.response.data.message);
            });
            })
            },
                allowOutsideClick: true
            });
            }
        }
    }
</script>