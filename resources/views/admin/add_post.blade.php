@extends ('layout')

@section('title', 'Блог - Главная')
@section('content')



    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form class = "form_editAdd" action="add_post" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h1>Добавить пост</h1>
    <input type="text" placeholder="author_name" name="author_name" value="{{old('author_name')}}"><br>
    <input type="text" placeholder="title" name="title" value="{{old('title')}}"><br>
    <textarea placeholder="body" name="body">{{old('body')}}</textarea><br>
    <input type="file" name="image"><br>
    <input type="submit" value="Сохранить">
</form>



