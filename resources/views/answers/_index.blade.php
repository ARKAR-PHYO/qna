@if ($answersCount > 0)
{{-- ANSWER-SESSION --}}
<div class="row mt-5" v-cloak>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ Str::plural('ပေါက်ကရအဖြေ', $answersCount) . " " . $answersCount . " ခုတွေ့တယ်"}}</h2>
                </div>
                <hr>
                @include('layouts._messages')

                @foreach ($answers as $answer)
                @include('answers._answer')
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- //ANSWER-SESSION END --}}

@endif

