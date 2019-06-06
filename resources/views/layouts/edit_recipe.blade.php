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
    {{ Form::model($recipe, array('route' => array('front.recipe.update',$recipe->id),'files'=>true, 'method' => 'post')) }}
    <div class="form-group">
        {{ Form::label('title', 'Название') }}
        {{ Form::text('title',isset($recipe->title) ? $recipe->title  : 'Заголовок', ['class' => 'form-control' ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Описание') }}
        {{ Form::text('description',isset($recipe->description) ? $recipe->description  : 'Описание', ['class' => 'form-control' ]) }}
    </div>
    <div class="input_fields_wrap">
        {{--                <button class="add_field_button">Add More Fields</button>--}}
        <div>
            {{ Form::label('ingredient', 'Ингридиент') }}
            {{ Form::select('id', $names, 'ingredients_ids', ['class' => 'form-control']) }}

            {{ Form::label('ingredients_count', 'Кол-во') }}
            @foreach($recipe->ingredients as $name)
                {{ Form::text('ingredients_count',isset($name->pivot->ingredients_count) ? $name->pivot->ingredients_count  : 'Кол-во', ['class' => 'form-control' ]) }}
            @endforeach
        </div>
    </div>
    </div>
    {{ Form::submit('Сохранить', ['class' => 'btn']) }}
    {{ Form::close() }}


</section>

</body>
</html>
