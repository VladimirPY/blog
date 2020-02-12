@extends( 'layout' )
@section('title', 'Блог - О нас')
@section('content')
        <a href="{{ route( 'add_post_get' ) }}" class="list-group-item ">
            <span class="glyphicon glyphicon-star"></span> Create New Post <span class="badge">
                <img style = "max-width:30px;max-height:30px" src="../images/add.svg" alt=" ">
            </span>
        </a><br/>
        <table class="table table-hover table-dark">
           <caption style = "caption-side: top;">Управление постами</caption>
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
                        <button type="submit" class="btn btn-outline-danger">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="" method="get">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <input type="hidden" name="id" value="{{$post->id}}">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
@endsection