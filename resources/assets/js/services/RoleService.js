export default {
    store(role) {
        return axios.post('/instellingen/rollen/', role);
    },

    destroy(id) {
        return axios.delete('/instellingen/rollen/' + id);
    }
}