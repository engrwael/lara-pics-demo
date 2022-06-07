<h1>All Images</h1>


<h2>
    <a href="{{ route('image.create') }}">Upload Image</a>
</h2>

<br>

@if (session('success'))
<h3>{{ session('success') }}</h3>

@endif

@if (session()->has('del'))
<h3>{{ session('del') }}</h3>

@endif


<hr>

@foreach ($images as $image)
<a href="{{ $image->permaLink() }}">
    <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="300" height="600">
</a>
@endforeach
