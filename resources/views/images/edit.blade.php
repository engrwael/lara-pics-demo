<h1>Edit Image</h1>


<div>
    <form action="{{ route('image.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="400" height="250">
        </div><br>

        {{-- <div>
            <label for="file">File</label>
            <input type="file" name="file" id="file">

            @error('file')
                <span>{{ $message }}</span>
            @enderror
        </div> --}}

        <div>
            <input type="hidden" name="id" value="{{ $image->id }}">
        </div>


        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $image->title) }}">

            @error('title')
                <span>{{ $message }}</span>
            @enderror
        </div><br>

        <button type="submit">Update</button>
    </form>
</div>
