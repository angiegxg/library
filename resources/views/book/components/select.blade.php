<select name="author_id" id="author_id" class="">
    @foreach($authors as $author)
        <option value="{{ $author->id }}">{{ $author->name }}</option>
    @endforeach
</select>