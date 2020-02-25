<div class="form-group">
    <label for="title">Title</label>
    <input class="form-control form-control-sm @error('title') is-invalid @enderror"
            type="text"
            name="title"
            placeholder="title"
            value="{{ old('title', $article->title ?? '') }}">
    @error('title')
        <p class="text-danger"> {{ $errors->first('title') }} </p>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Description">{{ old('description', $article->description ?? '') }}</textarea>
    @error('description')
        <p class="text-danger">{{ $errors->first('description') }} </p>
    @enderror
</div>

<div class="form-group">
    <label for="author_id">Author</label>
    <select name="author_id" class="form-control form-control-sm">
        <option value=""> Select an author... </option>
        @foreach($authors as $id => $name)
            <option value="{{ $id }}" {{ old('author_id', $article->author_id ?? "") == $id ? 'selected' : "" }} >
                {{ $name }}
            </option>
        @endforeach
    </select>
    @error('author_id')
        <p class="text-danger">{{ $errors->first('author_id') }} </p>
    @enderror
</div>

<div class="form-group">
    <label for="published_at">Published Date</label>
    <input class="form-control form-control-sm @error('published_at') is-invalid @enderror"
            type="date"
            name="published_at"
            max="{{ date('Y-m-d') }}"
            value="{{ old('published_at', $article->published_at ?? date('Y-m-d') ) }}" >
    @error('published_at')
        <p class="text-danger">{{ $errors->first('published_at') }} </p>
    @enderror
</div>

<button type="submit" class="btn btn-primary form-control-sm"> {{ $submitButtonText }} </button>
