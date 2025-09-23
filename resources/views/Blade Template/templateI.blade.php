<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template I</title>
</head>
<body>
    @php                 
    $name = "simple variable";
    $age = 33;
    @endphp                                {{--start and end of php--}}
    <h2>Blade Template I</h2>
    {{-- <span>Send value is : {{ $value }}</span><br> --}}
    <ul>
        @foreach ($fruits as $color => $fruit)
            <li>{{ $color }} => {{ $fruit }}</li>   
        @endforeach
    </ul>
    {{ "Hello world" }}<br>                {{-- print a simple statement in blade template--}}
    {{ $name }}                            {{--print simple variable--}}
    {!! "<h2> Html code </h2>" !!}         {{-- print simple html or javascript code in blade--}}
    {!! "<script>alert('Welcoome to blade')</script>" !!}
    {{-- Control Structure Syntax--}}
    @if ($age < 20)
        {{ "you are younger"}}
    @elseif($age > 40)
        {{ "you are oldest one" }}
    @else
        {{ "you are neither young nor old" }}
    @endif

    @php
    $status = 'pending';
    @endphp

    @switch($status)
        @case('active')
            <p>Status is <strong>Active</strong>.</p>
            @break
        @case('pending')
            <p>Status is <strong>Pending</strong>.</p>
            @break
        @case('inactive')
            <p>Status is <strong>Inactive</strong>.</p>
            @break
        @default
            <p>Status is <strong>Unknown</strong>.</p>
    @endswitch
    
    @php
        $record = "Wowww";
        $value = Null;
    @endphp
    @isset($record)
        {{ "value is exist" }}<br>
    @endisset
    @empty($value)
        {{ "check the value whether it is empty or not" }}
    @endempty

    {{--Loop statement syntax--}}
    <ul>
        @for ($i = 1; $i <= 5; $i++)
            <li>Item {{ $i }}</li>
        @endfor
    </ul><br>

    <ul>
        @php $i = 1; @endphp
        @while ($i <= 3)
            <li>Count {{ $i }}</li>
            @php $i++; @endphp
        @endwhile
    </ul><br>

    @php
    $users = ['Alice', 'Bob'];
@endphp

    <ul>
        @forelse ($users as $user)
            <li>User: {{ $user }}</li>
        @empty
            <li>No users found.</li>
        @endforelse
    </ul>


    @php
    $username = ["Ali","Khuzaima","Saifa","Azhan","Basam","Ahmad","LALA"];
    $names = ["Ali","Khuzaima","Saifa","Azhan","Basam","Ahmad","LALA","Aban"];
    @endphp
    <ul>
    @foreach ($username as $name)
        <li>{{ $loop->count }} : {{ $name }}</li>
    @endforeach
    </ul><br>

    <ul>
        @foreach ($names as $item)
            @if ($loop->first)
                <li style="color:green">{{ $item }}</li>
                
            @elseif($loop->last)
                <li style="color:red">{{ $item }}</li>
            @else
                <li style="color:blue">{{$item }}</li>
            @endif
        @endforeach
    </ul>


</body>
</html>
