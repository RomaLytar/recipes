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
            <h3>Редактировать ингридиента</h3>
        </div>
    </div>
    {{ Html::ul($errors->all()) }}
    {{ Form::model($ingredient, array('route' => array('front.ingredients.update',$ingredient->id),'files'=>true, 'method' => 'post')) }}
    <div class="form-group">
        {{ Form::label('title', 'Название') }}
        {{ Form::text('title',isset($ingredient->title) ? $ingredient->title  : 'Заголовок', ['class' => 'form-control' ]) }}
    </div>
    {{ Form::submit('Сохранить', ['class' => 'btn']) }}
    {{ Form::close() }}
</section>
</body>
</html>
