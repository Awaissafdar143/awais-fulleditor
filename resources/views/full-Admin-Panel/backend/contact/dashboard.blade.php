@extends('larpack::full-Admin-Panel.layout.backend')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="mt-5 col-12">
                <div class="title" style="text-align: center">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; color: black;">
                        Contact Messages
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
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Service</th>
                            <th>Message</th>
                            @if (auth()->user()->role === 'super')
                                <th>Deleted Status</th>
                            @endif
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr @if ($data->trashed()) style="background-color: #f8d7da;" @endif>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->date }}</td>
                                @php
                                    // Clean up the service string if needed
                                    $serviceName = str_replace(['["', '"]'], '', $data->service);
                                @endphp
                                <td>{{ $serviceName }}</td>
                                <td>
                                    {{-- Display a short version of the message --}}
                                    {{ Str::limit($data->message, 20) }}
                                    <!-- View button to open a modal with the full message -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#messageModal" data-message="{{ $data->message }}">
                                        View
                                    </button>
                                </td>
                                @if (auth()->user()->role === 'super')
                                    <td>
                                        @if ($data->trashed())
                                            {{-- Show when the record was soft-deleted --}}
                                            {{ $data->deleted_at ? $data->deleted_at->diffForHumans() : '' }}
                                        @else
                                            Active
                                        @endif
                                    </td>
                                @endif
                                <td>
                                    {{ $data->created_at ? $data->created_at->diffForHumans() : 'No date available' }}
                                </td>
                                <td>
                                    @if ($data->trashed())
                                        {{-- Provide a restore button if record is deleted --}}
                                        <a href="{{ route('contact_restore', $data->id) }}"
                                            class="btn btn-warning">Restore</a>
                                    @else
                                        {{-- Soft delete the record --}}
                                        <a onclick="return confirm('Are you sure to delete?')"
                                            href="{{ route('contact_delete', $data->id) }}" class="btn btn-danger">
                                            Delete
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Full Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- This paragraph will be filled with the full message -->
                    <p id="modalMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            // Get the modal element
            var messageModal = document.getElementById('messageModal');

            // Add an event listener for when the modal is about to be shown
            messageModal.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                var button = event.relatedTarget;

                // Extract the full message from data-message attribute
                var message = button.getAttribute('data-message');

                // Find the element in the modal where the message should be displayed
                var modalMessage = messageModal.querySelector('#modalMessage');

                // Insert the message text
                modalMessage.textContent = message;
            });
        </script>
    @endpush
@endsection
