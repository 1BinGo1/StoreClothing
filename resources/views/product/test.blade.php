<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@if ($message = \Illuminate\Support\Facades\Session::get('data', ''))
    {{ $message }}
@endif

<form action="{{route('products.test')}}" method="post">
    {{csrf_field()}}
    <select name="name" id="name">
        <option value="1">alex</option>
        <option value="2">max</option>
        <option value="3">john</option>
    </select>
    <button type="submit" name="send">send</button>
</form>

</body>
</html>
