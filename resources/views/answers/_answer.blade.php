<answer :answer="{{ $answer }}" inline-template>
    {{-- VOTE-CONTROLS AND CREATED_DATE-AND-AVATER --}}
    <div class="media post">
        {{-- VOTE-CONTROLS --}}
        <vote :model="{{ $answer }}" name="answer"></vote>
        {{-- //VOTE-CONTROLS END --}}

        {{-- CREATED_DATE-AND-AVATER --}}
        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                    <textarea class="form-control" v-model="body" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary" :disabled="isInvalid">သေချာပီလား</button>
                <button type="button" @click="cancel" class="btn btn-outline-danger">မသေချာဘူး</button>

            </form>
            <div v-else>
                <div v-html="bodyHtml"></div>
                <div class="row">
                    <div class="col-4">
                        <div class="ml-auto">
                            @can ('update', $answer)
                            <a @click.prevent="edit" class="btn btn-sm btn-outline-info">ပြင်မယ်</a>
                            @endcan

                            @can ('delete', $answer)
                            <button @click="destroy" class="btn btn-sm btn-outline-danger">ဖျက်မယ်</button>

                            @endcan
                        </div>
                    </div>

                    <div class="col-4"></div>
                    <div class="col-4">
                        <user-info :model="{{ $answer }}" label="Answered"></user-info>
                    </div>
                </div>
            </div>
        </div>
        {{-- //CREATED_DATE-AND-AVATER END --}}
    </div>
    {{-- //VOTE-CONTROLS AND CREATED_DATE-AND-AVATER END --}}

</answer>
