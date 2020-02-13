@extends ('layout')

@section('title', 'Блог - О нас')
@section('content')
    <hr>
    @if (\Auth::check ())
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item"><a class="page-link" href="{{route('admin_posts')}}"> Редактировать посты </a></li>
        </ul>
        <form >
            <input type="text" name="key" > Ключ
            <input type="text" name="caterories" > Название
            <input type="submit" value="Добавить">
        </form>
        <hr>
        <form >
            <table bordercolor="blue" >
                <tr>
                    <th>Id</th>
                    <th>Ключ</th>
                    <th>Название</th>
                    <th></th>
                </tr>
                @foreach($categories as $caregory)
                    <tr>
                        <td>{{$caregory->id}} </td>
                        <td><input type="text" value="{{$caregory->key}}"></td>
                        <td><input type="text" value="{{$caregory->categories}}"></td>
                        <td><input type="button" value="Delete"></td>
                    </tr>
                @endforeach
            </table>
            <input type="submit" value="Save all">
        </form>
    @endif
