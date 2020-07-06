<template>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>ဒီမှာလျှာရှည်မယ်</h3>
                    </div>
                    <hr>

                    <form @submit.prevent="create">
                        <div class="form-group">
                            <m-editor :body="body" name="new-answer">
                                <textarea class="form-control" autocomplete="body" autofocus v-model="body" rows="7" name="body"></textarea>
                            </m-editor>
                        </div>
                        <div class="form-group">
                            <button type="submit" :disabled="isInvalid" class="btn btn-lg btn-outline-primary">ရမ်းနှိပ်မယ်</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MEditor from './MEditor.vue';

export default {
    props: ['questionId'],

    components: { MEditor },

    methods: {
        create() {
            axios.post(`/questions/${this.questionId}/answers`, {
                body: this.body
            })
            .catch(error => {
                this.$toast.error(error.response.data.message, "Error");
            })
            .then(({data}) => {
                this.$toast.success(data.message, "Success");
                this.body = '';
                this.$emit('created', data.answer);
            })
        }
    },

    data() {
        return {
            body: ''
        }
    },

    computed: {
        isInvalid() {
            return !this.signedIn || this.body.length < 10;
        }
    },
}
</script>
