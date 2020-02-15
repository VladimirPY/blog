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

<form class = "form_editAdd" action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h1>Изменить пост {{$post->title}}</h1>
    <input type="text" placeholder="author_name" name="author_name" value=""><br>
    <input type="text" placeholder="title" name="title" value="{{$post->title}}"><br>
    <input type="hidden" name="id" value="{{$post->id}}">
    <textarea placeholder="body" name="body">{{$post->body}}</textarea><br>
    <input type="file" name="image"><br>
    <input type="submit" value="Сохранить">
</form>



