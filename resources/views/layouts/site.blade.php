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
            <h3>Рецепты</h3>
            @if (Auth::check())
                <a class="btn btn-success" href="{{ route('front.recipe.create') }}">Добавить рецепт</a>
            @else
            @endif
        </div>

        <table class="recipes">
            <tr class="global__table">
                <th>Рецепт</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
            @foreach ($recipes as $recipe)
                <tr>
                    <th>{{ $recipe->title }}</th>
                    <th>{{ $recipe->description }}</th>
                    <th>
                        @if (Auth::check())
                            <a href="recipe/{{$recipe->id}}">Просмотр</a>
                            {{--                        <a href="{{ route('front.recipe.show',$recipe->id) }}">Редактировать</a>--}}
                            {{ Form::open(['method' => 'DELETE', 'route' => ['recipes.destroy', $recipe->id], 'data-confirm' => 'Уверен?', 'style' => 'display:inline-block' ])}}
                            {{ Form::button("Удалить", ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        @else
                            <a href="recipe/{{$recipe->id}}">Просмотр</a>
                        @endif
                    </th>
                </tr>
            @endforeach
        </table>
    </div>
</section>
</body>
</html>
