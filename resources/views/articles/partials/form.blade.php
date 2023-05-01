<div>
    <label for="title-input">Title</label>
        <input type="text" id="title-input" name="title" value="{{ old('title', optional($article ?? null)->title) }}">
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="content-input">Content</label>
        <textarea id="content-input" name="content">{{ old('content', optional($article ?? null)->content) }}</textarea>
        @error('content')
            <p>{{ $message }}</p>
        @enderror
</div>


<div>
        <label for="date-input">Date</label>
        <input type="datetime-local" id="date-input" name="date" value="{{ old('date', optional($article ?? null)->date) }}">
        @error('date')
            <p>{{ $message }}</p>
        @enderror
</div>



<div>
    <label for="address-input">Address</label>
        <input type="text" id="address-input" name="address" value="{{ old('address', optional($article ?? null)->address) }}">
        @error('address')
            <p>{{ $message }}</p>
        @enderror
    </div>