
const state = {
    token: localStorage.getItem('x_xsrf_token') || 0, 
}

const getters = {
    token: state => {
        return state.token
    }
}

const actions = {
    setToken(context, payLoad) {
        localStorage.setItem('x_xsrf_token', payLoad)
        context.commit('UPDATE_TOKEN',payLoad)
    },
    removeToken(context) {
        localStorage.removeItem('x_xsrf_token')
        context.commit('UPDATE_TOKEN', 0)
    }
}

const mutations = {
    UPDATE_TOKEN(state, payLoad) {
        state.token = payLoad
    }
}



export default {state, getters, actions, mutations}

