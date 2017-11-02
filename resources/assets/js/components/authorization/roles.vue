<template>
    <div class="column is-faded is-9">
        <h2 class="title is-3">
            Rollen
        </h2>

        <div v-if="roles.length > 0">
            <div class="notification is-danger" v-for="role in roles">
                <button class="delete"></button>
                {{ role.name }}
            </div>
        </div>

        <div v-else>
            <p>Er zijn nog geen rollen.</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['roles'],
    }
</script>