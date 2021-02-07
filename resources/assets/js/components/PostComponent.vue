<template>
    <b-container fluid>
        <b-row>
            <b-col md="6" offset-md="3">
                <b-card
                    img-src="/img/forex.jpg"
                    img-alt="Image"
                    title="Trade Like a Pro"
                    sub-title="How to become a pro trader"
                    class="mb-2 mt-2">
                    <b-card-text>
                        Forex is a portmanteau of foreign currency and exchange.
                    </b-card-text>

                    <b-card-text>Foreign exchange is the process of changing one currency into another currency for a variety of reasons, usually for commerce, trading, or tourism. According to a recent triennial report from the Bank for International Settlements (a global bank for national central banks), the average was more than $5.1 trillion in daily forex trading volume.</b-card-text>
                </b-card>
                <div v-for="(comment, index ) in comments" :post="comment" :key="comment.id">
                    <comment-component :data="comment">
                    </comment-component>
                </div>

                <hr/>
                <comment-form-component @submitForm="addComment($event)"></comment-form-component>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    import CommentComponent from './CommentComponent.vue';
    import CommentFormComponent from './CommentFormComponent.vue'

    export default {
        components: { CommentFormComponent, CommentComponent },
        data : function(){
            return {
                comments : []
            }
        },
        mounted(){
            this.getComments();
        },
        methods : {

            //performs get request to fetch all comments
            getComments : function() {
                let _this = this;
                axios.get('/post/comments', ).then(response => {
                    _this.comments = response.data;
                });
            },

            //add new comment manually instead of calling getComments() everytime a new comment is added
            //which I find possible resource extensive since it will fetch on all comments
            addComment : function (comment) {
                this.comments.push(comment);
            }
        }
    }
</script>
