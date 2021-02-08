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
                <comment-form-component></comment-form-component>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    import CommentComponent from './CommentComponent.vue';
    import CommentFormComponent from './CommentFormComponent.vue'
    import { mapGetters, mapActions } from 'vuex'

    export default {
        name : 'PostComponent',
        computed : mapGetters(['comments']),
        methods : {
            ...mapActions(['getComments'])
        },
        mounted(){
            this.getComments();
        },


        components: { CommentFormComponent, CommentComponent },
    }
</script>
