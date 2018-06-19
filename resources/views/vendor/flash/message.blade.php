@foreach (session('flash_notification', collect())->toArray() as $message)
  @if ($message['overlay'])
      {{-- @include('flash::modal', [
          'modalClass' => 'flash-modal',
          'title'      => $message['title'],
          'body'       => $message['message']
      ]) --}}

      @include('flash::modal', [
          'title' => $message['title'],
          'body'  => $message['message']
      ])
  @else
    {{-- <div class="alert
                alert-{{ $message['level'] }}
                {{ $message['important'] ? 'alert-important' : '' }}"
                role="alert"
    >
        @if ($message['important'])
            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true"
            >&times;</button>
        @endif

        {!! $message['message'] !!}
    </div> --}}

    @if ( strnatcasecmp($message['level'], 'success') == 0 )
      <div class="card-panel green lighten-4 green-text text-darken-4">
        {!! $message['message'] !!}
      </div>
    @elseif ( strnatcasecmp($message['level'], 'warning') == 0 )
      <div class="card-panel yellow lighten-4 yellow-text text-darken-4">
        {!! $message['message'] !!}
      </div>
    @elseif ( strnatcasecmp($message['level'], 'error') == 0 )
    	<div class="card-panel red lighten-4 red-text text-darken-4">
        {!! $message['message'] !!}
      </div>
      @elseif ( strnatcasecmp($message['level'], 'info') == 0 )
    	<div class="card-panel blue lighten-4 blue-text text-darken-4">
        {!! $message['message'] !!}
      </div>
    @endif
  @endif
@endforeach

{{ session()->forget('flash_notification') }}
