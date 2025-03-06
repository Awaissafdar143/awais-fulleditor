@extends('larpack::full-Admin-Panel.layout.backend')
@section('content')
   <div class="container">
    <div class="row">
        <div class="offset-2 col-md-8 ">
            <div class="card">
                <div class="card-head">
                    <div class="card-header">
                        <h1>Environment Variables Editor</h1>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
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
        
                    <form action="{{ route('env.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="env_content" class="form-control" rows="20">{{ $envContent }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection
