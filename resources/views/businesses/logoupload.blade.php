@extends('layouts.app')

@section('content')
<div>
    <div class="ml-8 mr-8 p-5 bg-gray-200 border rounded-lg">
        <h3 class="text-3xl mb-2 p-2">Upload Your Business Logo</h3>
        <ul class="list-disc ml-8 mb-5">
            <li class="mb-1">File formats: PNG, JPG</li>
            <li class="mb-1">Recommended size: 600px * 600px</li>
            <li class="mb-1">Max. Size: 3MB</li>
            <li class="mb-1">Only one image may be uploaded</li>
        </ul>
        <form action="{{ $business->path() . '/images' }}"
            class="dropzone bg-yellow-200 m-2"
            method="POST"
            id="logoDropzone">
        @csrf
        @method('PUT')
            @error('file')
            <p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('file.message') }} </p>
            @enderror  
        </form>
    </div>
</div>
@endsection