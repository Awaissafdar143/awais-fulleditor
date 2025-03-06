@extends('larpack::full-Admin-Panel.layout.backend')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="mt-5 col-12">
                <div class="title" style="text-align: center">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; color: black;">
                        Blog Dashboard
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
            <div class="mt-5 col-12">
                <div class="title" style="text-align: left">
                    <a href="{{ route('addblog') }}" class="text-white btn wow fadeInUp" data-wow-delay=".5s" type="submit"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp; background-color:#01456f;">
                        <span>Add Blog</span>
                    </a>
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
                            <td style="text-align: center"><strong> Slug</strong></td>
                            @if (auth()->user()->role === 'super')
                                <th>Deleted Status</th>
                            @endif
                            <td colspan="2" style="text-align: center"> <strong> Action </strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs->reverse() as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img height="80" width="80" src="{{ $blog->featuredimage }}" alt=""></td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->description }}</td>
                                <td>{{ $blog->slug }}</td>
                                @if (Auth::user()->role == 'super')
                                    {
                                    <td>{{ $blog->deleted_at }}</td>
                                    }
                                @endif
                                <td><a href="{{ route('blogupdate', $blog->id) }}" class="btn btn-success">Edit</a></td>
                                <td><a onclick="return confirm('Are you sure to delete?')"
                                        href="{{ route('blogDelete', $blog->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
