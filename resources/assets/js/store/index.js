import Vuex from 'vuex'
import Vue from 'vue'
import Comments from './modules/comments.js'

Vue.use(Vuex)



export default new Vuex.Store({
    modules : {
        Comments
    }
});
