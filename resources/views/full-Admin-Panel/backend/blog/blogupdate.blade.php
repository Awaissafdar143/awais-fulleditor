@extends('larpack::full-Admin-Panel.layout.backend')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="title" style="text-align: center">
                <h1 class="wow fadeInUp" data-wow-delay=".3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; color: black;">
                    Update blog
                </h1>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @foreach ($blogs as $blog )
            <form action="{{ route('blogupdatepost',$blog->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Enter your title</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="blogtitle"
                        value="{{ $blog->title }}" placeholder="Enter your title">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Enter slug</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="blogslug"
                        value="{{ $blog->slug}}" placeholder="Enter your slug">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Enter description</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="blogdescription"
                        value="{{ $blog->description }}" placeholder="Enter your description">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Enter keyword</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="blogkeyword"
                        value="{{ $blog->keyword}}" placeholder="Enter your keyword">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Insert your Featured Image</label>
                    <input type="file" class="form-control" id="formGroupExampleInput2" name="image"
                        placeholder="Enter your keyword">
                    <img src="{{asset($blog->featuredimage)}}" height="100" width="180">
                </div>
                <div class="mb-3">
                    <textarea name="content" id="formGroupExampleInput2">{!! $blog->content !!}</textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Update Now" class="btn btn-warning">
                </div>
            </form>
            @endforeach
        </div>
        <div class="col-md-1"></div>
    </div>
    <br>
    <br>
    <br>
</div>
@endsection
@push('style')
<script src="{{ asset('ckeditor/ckeditor/ckeditor.js') }}"></script>
@endpush
@push('script')
<script>
    CKEDITOR.replace('content');
</script>
@endpush