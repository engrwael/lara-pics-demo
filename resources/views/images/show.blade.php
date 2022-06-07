<h1>{{ $image->title }}</h1>

<h2>
    <a href="{{ route('index') }}">BACK</a>
    <a href="{{ route('image.edit', $image->slug) }}">Edit</a>
    <a href="{{ route('image.delete', $image->slug) }}">Delete</a>
</h2>

<hr>

<div>
    <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" srcset="" width="350" height="500">
</div>
