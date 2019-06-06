<!doctype html>
<html>
<link>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Document</title>
<link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
@include('layouts.header')


<section id="content">
    @include('layouts.menu')
    <div class="rightContent">
        <h3>{{ $recipe->title }}</h3>
        <p>{{ $recipe->description }}</p>
        <h3>Ингридиенты</h3>
        <table class="show_recip">
            @foreach($recipe->ingredients as $name)
                <tr>
                    <th>{{ ($name->title) }} -</th>
                    <th>
                        @if (Auth::check())
                            {{ Form::text('ingredients_count',isset($name->pivot->ingredients_count) ?
                                   $name->pivot->ingredients_count  :
                                   Input::old('ingredients_count'), ['class' => 'form-control' ]) }}
                        @else
                            {{ $name->pivot->ingredients_count }}
                        @endif
                    </th>
                </tr>
            @endforeach
        </table>
    </div>
</section>
</body>
</html>
