@extends ('layout')

@section('title', 'Блог - Главная')
@section('content')
    <div class="col-md-8">
        <h1 class="my-4" style="color:#C71585">Добро пожаловать<br>
            <small>Пожалуй, самый лучший в мире блог</small>
        </h1>

        <div class="card mb-4">
            <img class="card-img-top" src="{{$post->img}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title" style="color:#008000">{{$post->title}}</h2>
                <p class="card-text">{{$post->body}}</p>
            </div>
            <div class="card-footer text-muted">
                Создан: {{$post->created_at}} <br>
                Автор: <a href="{{route('posts_by_author', $post->author->key)}}">{{$post->author->name}}</a>
                Категории:
                @foreach($post->category as $category)

                    <a href="{{route('posts_by_category', $category->key)}}">{{$category->categories}}   </a>
                @endforeach
            </div>
        </div>
        <div>
        <h4>Коментарии:</h4>
        @if (\Auth::check ())
            <form class = "comment" action="{{ route( 'add_comment' ) }}" method="post">
                {{ csrf_field() }}
                <textarea name="text" placeholder = "New comment..."></textarea>
                <input type = "hidden"  name = "user_id" value = " {{ \Auth::user()->id }}">
                <input type = "hidden" name = "post_id" value = " {{ $post->id }}">
                <img src="http://blog/images/rocket.png" alt="">
                <input type = "submit"  value = "Полетели">
            </form>
        @endif

           @foreach( $post->comment as $comment )
            <div class="card mb-4">
                <div class="card-body">
                    {{ $comment->text }}
                </div>
                <div class="card-footer text-muted">
                {{ $comment->user->name }}
                </div>
            </div>
           @endforeach
        </div>
    </div>
@endsection

@section ('categories')
    <!-- Categories Widget -->
    <div class="card my-4 ctg">
        <h5 class="card-header">Категории:</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-15">
                    <ul class="list-unstyled mb-0">
                        @inject('categories', 'App\Categories_for_sidebar')
                        <div>
                            {{ $categories->show_category() }}<br>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection



@section ('advertising')
                <!-- Advertising Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Рекламный блок</h5>
                        <div class="card-body">
                            <img src="https://b1.vestifinance.ru/c/356760.742xp.jpg" alt="реклама">
                        </div>
                    </div>
@endsection
