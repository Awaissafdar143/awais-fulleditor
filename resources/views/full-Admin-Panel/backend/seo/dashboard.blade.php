@extends('larpack::full-Admin-Panel.layout.backend')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="mt-5 col-12">
                <br>
                <div class="title" style="text-align: center">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; color: black;">
                        <br>
                        Our Meta
                    </h2>
                </div>
            </div>
            <div class="mt-5 col-12">
                <div class="title" style="text-align: center">
                    @if (session('message'))
                        <h6 class="alert alert-success">{{ session('message') }}</h6>
                    @endif

                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td style="text-align: center"><strong> Id</strong></td>
                            <td style="text-align: center"><strong> Image</strong></td>
                            <td style="text-align: center"><strong> Title</strong></td>
                            <td style="text-align: center"><strong> Description</strong></td>
                            <td style="text-align: center"> <strong> Action </strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seos as $seo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img height="80" width="80" src="{{ $seo->ogimage }}" alt=""></td>
                                <td>{{ $seo->title }}</td>
                                <td>{{ $seo->description }}</td>
                               
                                <td><a href="{{ route('seoupdate', $seo->id) }}" class="btn btn-danger">Update</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <br>

    </div>
@endsection
