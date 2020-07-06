{{-- ANSWER-SESSION --}}
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>ဒီမှာလျှာရှည်မယ်</h3>
                </div>
                <hr>

                <form action="{{ route('questions.answers.store', $question->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control @error('body') is-invalid @enderror" autocomplete="body" autofocus rows="7" name="body">{{ old('body') }}</textarea>
                        @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-outline-primary">ရမ်းနှိပ်မယ်</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- //ANSWER-SESSION END --}}
