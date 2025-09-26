<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template II</title>
</head>
<body>
    <h2> Blade Template II</h2>
    <h3> Blade Template Main Directives </h3>

    @php
        $person = "Ali";
        $names = ["names1" => "Ali","names2" => "Khuzaima","names3" => "Saifa","names4" => "Azhan","names5" => "Basam"];
        $value = "";
        $boolean  = false;
    @endphp

    {{-- @include('Blade_Template.footer')      to include contents of one view  into another view we use "@include" directives --}}

    {{-- @include('Blade_Template.footer',['name' => 'Ali'])       pass a value to a view --}}

    {{-- @include('Blade_Template.footer',['name' => $names ]) --}}

    {{-- @includeIf('view.name', ['some' => 'data'])   it check if  view is exist it include the contents otherwise will not include the view  --}}

    {{-- @includeWhen(empty($value), 'view.name', ['some' => 'data'])  it check if the given condition is true it include the contents of view --}}
                                                                    {{-- work opposite to @includeWhen --}}
    {{-- @includeUnless($boolean, 'view.name', ['some' => 'data']) it check if the given condition is false it include the view --}}



</body>
</html>