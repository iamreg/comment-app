import axios from 'axios'

const state = {
    comments : [],
    comment : {
        id : '',
        name : '',
        description : '',
        level : '',
        parent_id : '',
        replies : [],
        created_at : ''

    }
}

const getters = {
    comments : (state) => state.comments
}

const actions = {
    async getComments({ commit }){
        const response = await axios.get('/post/comments');
        commit('setComments', response.data);
    },

    async createComment({ commit }, comment) {
        const response = await axios.post('/post/comment/store', comment);
        commit('createComment', response.data.comment);
    }
}

const mutations = {
    setComments : (state, comments) => (state.comments = comments),
    createComment : function(state, comment) {
        //add as plain comment since no parent_id
        if (!comment.parent_id) {
            //need to have the same format with state.comment as stored comment hasn't any reply yet.
            comment =  Object.assign(state.comment, comment);
            state.comments.push(comment)
        } else {
            //since there is a parent_id, means this comment is a reply
            state.comments.forEach(element => {
                //check if parent_id == comment.id
                if (element.id == comment.parent_id) {
                    element.replies.push(comment);
                    return false;
                } else {
                    //if not in comments, check on replies
                    element.replies.forEach(reply => {
                        if (reply.id == comment.parent_id) {
                            reply.replies.push(comment);
                            return false;
                        }
                    })
                }
            })
        }

    },
}


export default {
    state,
    getters,
    actions,
    mutations
}
