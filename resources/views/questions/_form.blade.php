@csrf
<div class="form-group">
    <label for="question-title" class="col-md-4 col-form-label">Question Title</label>
    <input id="question-title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $question->title) }}" autocomplete="title" autofocus>
    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="question-body" class="col-md-4 col-form-label">Explain your questions here</label>
    <textarea id="question-body" name="body" rows="10" class="form-control @error('body') is-invalid @enderror"  autocomplete="body" autofocus>{{ old('body', $question->body) }}</textarea>
    @error('body')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-secondary">{{ $buttonText }}</button>
</div>
