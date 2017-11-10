<template>
    <div class="column is-faded is-9">
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
</template>

<script>
    import RoleService from '../../services/RoleService';

    export default {

        props: ['roles'],

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
            }
        }
    }
</script>