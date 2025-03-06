@extends('full-Admin-Panel.layout.backend')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="title" style="text-align: center">
                <h1 class="wow fadeInUp" data-wow-delay=".3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; color: black;">
                    Update seo
                </h1>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @foreach ($seos as $seo )
            <form action="{{ route('seoupdatepost',$seo->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Enter your title</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="seotitle"
                        value="{{ $seo->title }}" placeholder="Enter your title">
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Enter description</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="seodescription"
                        value="{{ $seo->description }}" placeholder="Enter your description">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Enter keyword</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="seokeyword"
                        value="{{ $seo->keyword}}" placeholder="Enter your keyword">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Insert your og Image</label>
                    <input type="file" class="form-control" id="formGroupExampleInput2" name="image"
                        placeholder="Enter your keyword">
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
</div>
@endsection