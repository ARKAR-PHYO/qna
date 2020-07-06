@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- ANSWER-SESSION --}}
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h1>ပေါက်ကရ ဖြေထားတာကို ပြင်မယ် : <strong>{{ $question->title }}</strong></h1>
                    </div>
                    <hr>

                    <form action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <textarea class="form-control @error('body') is-invalid @enderror" autocomplete="body" autofocus rows="7" name="body">{{ old('body', $answer->body) }}</textarea>
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

</div>
@endsection
