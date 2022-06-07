<h1>Upaload AN Image</h1>


<div>
    <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="file">File</label>
            <input type="file" name="file" id="">
            @error('file')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="">
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <button type="submit">Upload</button>
    </form>
</div>
