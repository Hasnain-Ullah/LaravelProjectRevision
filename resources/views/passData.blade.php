<!DOCTYPE html>
<html>
<head>
    <title>Show Data from Route</title>
</head>
<body>
    <h1>Data from Route</h1>
    <p>Name: {{ $name }}</p>
    <p>City: {{ !empty($city) ? $city : "No City" }}</p>
    <p>{!! $script !!}</p> <!-- Using double curly braces to render HTML content -->

    <ul>
    @foreach ($passArray as $id => $values)
        <li>{{ $id }} | {{ $values['Name'] }} | {{ $values['Phone'] }} | {{ $values['City'] }} |
            <a href="{{ route('view.user' , $id)}}">Show</a>
        </li>
    @endforeach
    </ul>

</body>
</html>