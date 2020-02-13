@extends ('layout')

        @section('title', 'Блог - Главная')
        @section('content')
            <div class="col-md-8">
            <h1 class="my-4">
                    <small>Посты категории {{ $category->key }}</small>
            </h1>

{{--                @include ('load')--}}

                @foreach( $posts as $post)
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{$post->img}}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title" style="color:#008000">{{$post->title}}</h2>
                            <p class="card-text">{{mb_substr($post->body,0 , 200)}} ...</p>
                            <a href="{{route('single_post', $post->id)}}" class="btn btn-primary">Читать дальше &rarr;</a>
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
                @endforeach

                <ul class="pagination justify-content-center mb-4">
                    @if ($posts->currentPage()!=1)
                        <li class="page-item"><a class="page-link" href="?page=1"> Первая страница </a></li>
                        <li class="page-item"><a class="page-link" href="{{$posts->previousPageUrl()}}"> < </a></li>
                    @endif
                    @if ($posts->count ()>0)
                        @for ($count=1; $count<=$posts->lastPage(); $count++)
                            @if($count>$posts->currentPage()-3 and $count<$posts->currentPage()+3)
                                <li class="page-item @if ($count==$posts->currentPage()) active @endif">
                                    <a class="page-link" href="?page={{$count}}"> {{$count}} </a></li>
                            @endif
                        @endfor
                    @else
                        <h1><font size="15" color="aqua" face="Arial"> Нет постов...
                                 </font></h1>
                    @endif
                    @if ($posts->currentPage() != $posts->lastPage())
                        <li class="page-item"><a class="page-link" href="{{$posts->nextPageUrl()}}"> > </a></li>
                        <li class="page-item"><a class="page-link" href="?page={{$posts->lastPage()}}"> Последняя страница </a>
                        </li>
                    @endif
                </ul>
            </div>
    @endsection

    @section ('categories')
        <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Категории:</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
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


    @section ('search')
        <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Курсы валют</h5>
        <div class="card-body">
            @inject('currency', 'App\Get_currency')
            {{ $currency->show_currency() }}<br>
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