
@if ($type === 'alert')
    @if (Session::has('error'))
        <div class="alert alert-danger m-0">
            {{ $message }}
        </div>
    @elseif (Session::has('success'))
        <div class="alert alert-success m-0">
            {{ $message }}
        </div>
    @endif
@elseif ($type === 'text')
    @if (Session::has('error'))
        <div class="text-danger m-0">
            {{ $message }}
        </div>
    @elseif (Session::has('success'))
        <div class="text-success m-0">
            {{ $message }}
        </div>
    @endif
@elseif ($type === 'toast')
    @section('scripts')
        <script>
            toastr.options = {
                'progressBar': true,
                'closeButton': true
            }
            document.addEventListener('DOMContentLoaded', function() {
                @if (Session::has('error'))
                    toastr.error('{{ $message }}');
                @elseif (Session::has('success'))
                    toastr.success('{{ $message }}');
                @elseif (Session::has('warning'))
                    toastr.warning('{{ $message }}');
                @elseif (Session::has('info'))
                    toastr.info('{{ $message }}');
                @endif
            });
        </script>
    @endsection
@endif
