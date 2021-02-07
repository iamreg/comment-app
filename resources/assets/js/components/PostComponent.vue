<template>
    <b-container fluid>
        <b-row>
            <b-col md="6" offset-md="3">
                <b-card
                    img-src="https://picsum.photos/600/300/?image=25"
                    img-alt="Image"
                    title="Trade Like a Pro"
                    sub-title="How to become a pro trader"
                    class="mb-2 mt-2">
                    <b-card-text>
                        Some quick example text to build on the <em>card title</em> and make up the bulk of the card's
                        content.
                    </b-card-text>

                    <b-card-text>A second paragraph of text in the card.</b-card-text>
                </b-card>
                <div v-for="(comment, index ) in comments" :post="comment" :key="comment.id">
                    <comment-component :comment="comment">
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
            getComments : function() {
                let _this = this;
                axios.get('/post/comments', ).then(response => {
                    _this.comments = response.data;
                });
            },
            addComment : function (comment) {
                this.comments.push(comment);
            }
        }
    }
</script>
