@extends('full-Admin-Panel.layout.backend')
@section('content')
    <div class="container mt-5">
        <h1>Edit Maintenance Page</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('maintenance.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Maintenance Page HTML/CSS Content:</label>
                <textarea name="content" id="content" class="form-control" rows="15">{{ $content }}</textarea>
                <small class="form-text text-muted">Enter your custom HTML and CSS code to style the maintenance page.</small>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="enabled" id="enabled" class="form-check-input" value="1" {{ $enabled === '1' ? 'checked' : '' }}>
                <label for="enabled" class="form-check-label">Enable Maintenance Mode</label>
            </div>
            <button type="submit" class="btn btn-primary">Update Maintenance Settings</button>
        </form>
    </div>
@endsection
