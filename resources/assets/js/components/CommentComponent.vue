<template>
    <div>
        <b-card class="mt-2">
            <b-card-text>
                {{ data.description }}
            </b-card-text>
            <b-card-text class="small text-muted">{{ data.name }} • {{ data.created_at | moment('from', 'now') }} <span v-if="data.level < 3"> • <b-link href="#" v-on:click="toggleVisibility(true)" class="card-link">Reply</b-link> </span></b-card-text>
        </b-card>
        <component class="ml-5 mt-2" :is="commentFormComponent" :parent_id="data.id" v-if="showReplyForm" @resetForm="toggleVisibility($event)" @submitForm="addReply($event)"></component>

        <!-- used recursive component, need to have component name property  -->
        <comment-component v-for="reply in replies" :data="reply" :key="reply.id" class="ml-5">
        </comment-component>
    </div>
</template>

<script>
    import CommentFormComponent from './CommentFormComponent.vue'

    export default {
        props : ['data'],
        name : 'comment', // added this in relations to using of recursive component
        data()  {
            return {
                commentFormComponent : CommentFormComponent,
                showReplyForm : false, //use to toggle comment/reply form visibility
                replies : this.data.replies || []
            }
        },
        methods : {
            toggleVisibility : function(isVisible){
                this.showReplyForm = isVisible
            },
            addReply : function(reply)
            {
                this.replies.push(reply);
            }
        }
    }
</script>
