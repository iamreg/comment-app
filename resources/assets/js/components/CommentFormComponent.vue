<template>
    <div>
        <b-form @submit.stop.prevent="submitForm">
            <b-form-group id="input-group-comment">
                <b-form-textarea
                    id="comment"
                    v-model="$v.form.comment.$model"
                    :state = "validateState('comment')"
                    v-bind:placeholder="commentFieldPlaceholder"
                    rows="3"
                    aria-describedby="message-live-feedback"
                ></b-form-textarea>
                <b-form-invalid-feedback id="comment-live-feedback" v-if="!$v.form.comment.required">
                    Enter your comment.
                </b-form-invalid-feedback>
            </b-form-group>

            <b-input-group
                class="mb-3"
            >
                <b-form-input
                    id="name"
                    v-model="$v.form.name.$model"
                    :state = "validateState('name')"
                    placeholder="Enter your name"
                ></b-form-input>
                <b-input-group-append>
                    <b-button type="submit" size="sm" text="Button" variant="success">Submit</b-button>
                    <b-button type="button" size="sm" text="Button" variant="secondary" v-on:click="resetForm" v-if="parent_id">Cancel</b-button>
                </b-input-group-append>

                <b-form-invalid-feedback id="name-live-feedback" v-if="!$v.form.name.required">
                    Enter your name.
                </b-form-invalid-feedback>
                <b-form-invalid-feedback id="name-live-feedback" v-if="!$v.form.name.minLength">
                    Your name should be at least 2 characters in length.
                </b-form-invalid-feedback>

                <b-form-invalid-feedback id="name-live-feedback" v-if="!$v.form.name.maxLength">
                    Your name should be at most 50 characters in length.
                </b-form-invalid-feedback>
            </b-input-group>
        </b-form>
    </div>
</template>

<script>
    import { validationMixin } from 'vuelidate'
    import { required, minLength, maxLength } from 'vuelidate/lib/validators'
    import { mapActions } from 'vuex'


    export default {
        mixins: [validationMixin],
        props : ['parent_id'],
        computed : {
            commentFieldPlaceholder : function(){
                return 'Write a ' + ((this.parent_id) ? 'reply..' : 'comment..')
            }
        },
        data() {
            return {
                form: {
                    comment: '',
                    name: '',
                    parent_id : this.parent_id
                }
            }
        },
        validations : {
            form : {
                name : { required, minLength: minLength(2), maxLength : maxLength(50) },
                comment : { required },
            }
        },
        methods : {
            ...mapActions(['createComment']),
            validateState(input){
                const { $dirty, $error } = this.$v.form[input];

                return $dirty ? !$error : null;
            },
            resetForm(){
                this.form = {
                    name: null,
                    comment: null,
                };

                this.$nextTick(() => {
                    this.$v.$reset();
                });

                this.$emit('resetForm', false);

            },
            submitForm(){
                this.$v.form.$touch();
                if (this.$v.form.$anyError) {
                    return;
                }

                this.createComment(this.form);
            }
        }
    }
</script>
