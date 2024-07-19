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
@endif
