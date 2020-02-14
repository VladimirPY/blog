@extends ('layout')

@section('title', 'Блог - О нас')
@section('content')
    <hr>
    @if (\Auth::check ())
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item"><a class="page-link" href="{{route('admin_posts')}}"> Редактировать посты </a></li>
        </ul>
        <form  action = "{{ route( 'add_category' ) }}" method = "post">
            <input type="text" name="key" > Ключ
            <input type="text" name="categories" > Название
            <input type="submit" value="Добавить">
            {{ csrf_field() }}
        </form>
        <hr>
            <table bordercolor="blue" >
                <tr>
                    <th>Id</th>
                    <th>Ключ</th>
                    <th>Название</th>
                    <th></th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                    <form action = "{{ route( 'save_categories' ) }}" method = "post">
                        <td>{{$category->id}}</td>
                        <td><input name = "key" type="text" value="{{$category->key}}"></td>
                        <input name = "id" type="hidden" value="{{$category->id}}">
                        <td><input name = "categories" type="text" value="{{$category->categories}}"></td>
                        <td><input type="submit" value="Save"></td>
                        {{ csrf_field() }}
                    </form>
                    <form action = "{{ route( 'delete_category' ) }}" method = "post">
                        <td>

                                <input type="submit" value="Delete">
                                <input name = "id" type="hidden" value="{{ $category->id }}">
                                {{ csrf_field() }}

                        </td>
                    </form>
                    </tr>
                @endforeach
            </table>
    @endif
