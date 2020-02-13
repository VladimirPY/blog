@extends( 'layout' )
@section('content')
<ul class="pagination justify-content-center mb-4">
            <li class="page-item"><a class="page-link" href="{{route('admin_category')}}"> Редактировать категории </a></li>
        </ul>
        <a href="{{ route( 'add_post_get' ) }}" class="list-group-item ">
            <span class="glyphicon glyphicon-star"></span> Create New Post <span class="badge">
                <img style = "max-width:30px;max-height:30px" src="../images/add.svg" alt=" ">
            </span>
        </a><br/>
        <table class="table table-hover table-dark">
           <caption style = "caption-side: top;margin:0 auto;">Управление постами</caption>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col"></th>
            </tr>
            @foreach( $posts as $post)
            <tr>
                <td scope="row">{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>
                    <form action="/admin/edit_post/{{$post->id}}" method="get">
                    <input type="hidden" name="id" value="{{$post->id}}">
                        <button type="submit" class="btn btn-outline-success">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route( 'delete_post' ) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$post->id}}">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </table>
            <ul class="pagination justify-content-center mb-4 "  style = "margin:0 auto">
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
                    <h1><span size="15" color="aqua" face="Arial"> Нет постов...
                                </span></h1>
                @endif
                @if ($posts->currentPage() != $posts->lastPage())
                    <li class="page-item"><a class="page-link" href="{{$posts->nextPageUrl()}}"> > </a></li>
                    <li class="page-item"><a class="page-link" href="?page={{$posts->lastPage()}}"> Последняя страница </a>
                    </li>
                @endif
            </ul>

@endsection