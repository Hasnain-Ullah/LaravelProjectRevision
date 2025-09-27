<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template IV</title>
</head>
<body>
    @php
        $name = "Zavi";
        $fruits = ["Banana","Mango","Guava","Orange","Apple"];
    @endphp

    <script>
        // How to use a php variable inside javascript
        // var data = {{ $name }};     it will give us an error
        var name = @json($name);    // it will change the php variable into json data which are easily readable by JS
        var fruits = {{ Js::from($fruits)}};    // it will also change the php variable into json data which are easily read by JS
                 
        console.log(name);
        // console.log(fruits);
        
        fruits.forEach(function(fruit){   // forEach is a method of array it will loop through each element of the array
            console.log(fruit);                                  // and execute the function for each element
            
        });

    </script>


</body>
</html>