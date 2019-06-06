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
            <h3>Добавления ингридиента</h3>
        </div>
    </div>

    {{ Html::ul($errors->all()) }}

    {{ Form::open(['url' => '/add_ingredient/', 'id' => 'ingredient', 'method' => 'post', 'files'=>true]) }}
    <div class="form-group">
        {{ Form::label('title', 'Название') }}
        {{ Form::text('title') }}
    </div>
    {{ Form::submit('Сохранить', ['class' => 'btn']) }}
    {{ Form::close() }}
</section>
</body>
</html>
