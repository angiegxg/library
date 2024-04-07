<select name="genre_id" id="genre_id" class="">
    @foreach($genres as $genre)
        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
    @endforeach
</select>