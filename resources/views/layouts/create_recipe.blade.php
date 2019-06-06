<!doctype html>
<html>
<link>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Document</title>
<link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</head>
<body>
@include('layouts.header')

<section id="content">
    @include('layouts.menu')

    <div class="rightContent">
        <div class="headerRecipe">
            <h3>Добавления рецепт</h3>
        </div>
    </div>
    {{ Html::ul($errors->all()) }}

    {{ Form::open(['url' => '/add_recipe/', 'id' => 'recipe', 'method' => 'post', 'files'=>true]) }}
    <div class="form-group">
        {{ Form::label('title', 'Название') }}
        {{ Form::text('title'), ['class' => 'form-control' ] }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Описание') }}
        {{ Form::textarea('description'), ['class' => 'form-control'] }}
    </div>
    <div class="input_fields_wrap">
{{--        <button class="add_field_button">Add More Fields</button>--}}
        <div>
                {{ Form::label('ingredient', 'Ингридиент') }}
                {{ Form::select('id', $names, 'ingredients_ids', ['class' => 'form-control']) }}

                {{ Form::label('ingredients_count', 'Кол-во') }}
                {{ Form::text('ingredients_count'), ['class' => 'form-control'] }}
        </div>
    </div>
    </div>
    {{ Form::submit('Сохранить', ['class' => 'btn']) }}
    {{ Form::close() }}


</section>

</body>
</html>
