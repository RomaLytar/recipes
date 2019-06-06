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
        <div class="headerRecipe">
            <h3>Ингридиенты</h3>
            <a class="btn btn-success" href="{{ route('front.ingredients.add') }}">Добавить Ингридиент</a>
        </div>

        <table class="recipes">
            <tr class="global__table">
                <th>Название</th>
                <th>Действия</th>
            </tr>
            @foreach($ingredients as $ingredient)
                <tr>
                    <th>{{ $ingredient->title }}</th>
                    <th>
                        <a href="{{route('front.ingredients.edit', $ingredient->id) }}">Редактировать</a>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['ingredients.destroy', $ingredient->id], 'data-confirm' => 'Уверен?', 'style' => 'display:inline-block' ])}}
                        {{ Form::button("Удалить", ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </th>
                </tr>
            @endforeach

        </table>
    </div>
</section>
</section>
</body>
</html>
