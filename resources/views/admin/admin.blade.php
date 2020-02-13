@extends( 'layout' )
@section('content')
    @if (\Auth::check ())
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item"><a class="page-link" href="{{route('admin_posts')}}"> Редактировать посты </a></li>
        <li class="page-item"><a class="page-link" href="{{route('admin_category')}}"> Редактировать категории </a></li>
    </ul>
    @endif
@endsection