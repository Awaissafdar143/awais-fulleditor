@extends('larpack::full-Admin-Panel.layout.backend')
@section('content')
    <div class="container">
        <div class="row">
            <div class="mt-5 offset-3 col-md-6 ffset-3">
                <div class="card">
                    <div class="card-header">
                        <h1>Update Profile </h1>
                    </div>
                    @if (session('message'))
                        <h6 class="alert alert-success">{{ session('message') }}</h6>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('updateprofile') }}" method="POST">
                            <div class="mb-3">
                                @csrf
                                <label for="formGroupExampleInput2" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"
                                    id="formGroupExampleInput2" placeholder="Enter input placeholder">
                                @error('name')
                                    <small class="text-danger"{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Username</label>
                                <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}"
                                    id="formGroupExampleInput" placeholder="Example input placeholder">
                                @error('email')
                                    <small class="text-danger"{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" id="formGroupExampleInput2"
                                    placeholder="Enter Your Password">
                                @error('password')
                                    <small class="text-danger"{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="form-control" value="submit Now" id="formGroupExampleInput2">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
