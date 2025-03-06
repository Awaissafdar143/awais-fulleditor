@extends('larpack::full-Admin-Panel.layout.backend')
@section('content')
    <div class="container">
    <div class="row">
        <<div class="mt-5 col-12">
            <br>
            <div class="title" style="text-align: center">
                <h2 class="wow fadeInUp" data-wow-delay=".3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; color: black;">
                    <br>
                    SEO Activity Logs
                </h2>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th>IP Address</th>
                        <th>Old Values</th>
                        <th>New Values</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->description }}</td>
                            <td>
                                {{-- Assuming you added the IP in the properties --}}
                                {{ $log->properties['ip'] ?? 'N/A' }}
                            </td>
                            <td>
                                @if ($log->properties->has('old'))
                                    <pre>{{ json_encode($log->properties['old'], JSON_PRETTY_PRINT) }}</pre>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if ($log->properties->has('attributes'))
                                    <pre>{{ json_encode($log->properties['attributes'], JSON_PRETTY_PRINT) }}</pre>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No logs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Display pagination links if using paginate() --}}
        {{ $logs->links() }}
    </div>
    </div>
@endsection
