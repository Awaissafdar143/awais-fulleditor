@extends('larpack::full-Admin-Panel.layout.backend')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="title" style="text-align: center">
                <h1 class="wow fadeInUp" data-wow-delay=".3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; color: black;">
                    Add Blog
                </h1>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form action="{{ route('addblogpost') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Enter your title</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="blogtitle"
                        placeholder="Enter your title">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Enter slug</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="blogslug"
                        placeholder="Enter your slug">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Enter description</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="blogdescription"
                        placeholder="Enter your description">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Enter keyword</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="blogkeyword"
                        placeholder="Enter your keyword">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Insert your Featured Image</label>
                    <input type="file" class="form-control" id="formGroupExampleInput2" name="image"
                        placeholder="Enter your keyword">
                </div>
                <div class="mb-3">
                    <textarea name="content" id="formGroupExampleInput2"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Submit Now" class="btn">
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
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