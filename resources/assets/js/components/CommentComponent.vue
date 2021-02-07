<template>
    <div>
        <b-card class="mt-2">
            <b-card-text>
                {{ comment.description }}
            </b-card-text>
            <b-card-text class="small text-muted">{{ comment.name }} • {{ comment.created_at | moment('from', 'now') }} • <b-link href="#" v-on:click="showCommentForm" class="card-link" v-if="comment.level < 3">Reply</b-link></b-card-text>
        </b-card>
        <component class="ml-5 mt-2" :is="commentFormComponent" v-if="showForm"></component>
        <!-- <div class="ml-5 mt-2">
            <hr/>
            <comment-form-component @submitForm="addComment($event)"></comment-form-component>
        </div> -->
    </div>
</template>

<script>
    import CommentFormComponent from './CommentFormComponent.vue'

    export default {
        props : ['comment'],
        data()  {
            return {
                commentFormComponent : CommentFormComponent,
                showForm : false
            }
        },
        methods : {
            showCommentForm : function(){
                this.showForm = true
            }
        }
    }
</script>
