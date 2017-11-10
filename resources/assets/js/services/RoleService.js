export default {
    destroy(id) {
        return axios.delete('/instellingen/bedrijf/role/' + id);
    }
}