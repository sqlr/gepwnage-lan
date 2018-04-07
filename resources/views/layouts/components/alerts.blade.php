@foreach(['danger', 'warning', 'success', 'info'] as $type)
    @if($alert = session()->get('alert-' . $type))

        <div class="alert alert-{{ $type }} alert-dismissible mb-4">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&cross;</span>
            </button>

            @if(isset($alert['title']))
                <h4 class="alert-heading">{{ $alert['title'] }}</h4>
            @endif

            @if(isset($alert['message_raw']))
                {!! $alert['message_raw'] !!}
            @else
                @foreach(array_wrap($alert['message'] ?? $alert) as $message)
                    <p>{{ $message }}</p>
                @endforeach
            @endif
        </div>

    @endif
@endforeach