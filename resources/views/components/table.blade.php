@props([
    'headers' => [],
])

<div>
    <table {{ $attributes }} class="table {{ $attributes['class'] }}"  style="width: 100%; {{$attributes['style']}}">
        <thead>
            @if (isset($header))
                {{ $header }}
            @else
                @foreach ($headers as $header)
                    <th scope="col">{{$header}}</th>
                @endforeach
            @endif
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
        @if (isset($footer))
            <tfoot>
                {{ $footer }}
            </tfoot>
        @endif
    </table>
</div>
