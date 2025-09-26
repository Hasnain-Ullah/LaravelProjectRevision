
    <h2> Footer Page </h2>
    {{-- @isset($name)
        <p>{{ $name }}</p>
        @else
        <p>{{ "Azhan" }}</p>
        
    @endisset --}}

    {{-- <p>{{ $name }}</p> --}}
    <ul>
    @foreach ($name as $keys => $values)
        <li>{{ $keys }} - {{ $values }}</li>
    @endforeach
    </ul>

    {{-- <p>{{ $name ?? "Azhan"}}</p> --}}
    

