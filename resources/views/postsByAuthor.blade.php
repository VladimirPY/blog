@extends('layout')
@section('title', 'Блог - Главная')
@section ('content')

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="my-4">Все посты автора
                    <small>{{$author->name}}</small>
                </h1>

            @foreach ($author->posts as $post)

                <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{$post->img}}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{$post->title}}</h2>
                            <p class="card-text">{{$post->body}}</p>
                            <a href="#" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{$post->created_at}} by
                            <a href="#">{{$post->authors->name}}</a>
                        </div>
                    </div>
                @endforeach

            </div>
        @endsection
        @section('categories')
            <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <a href="#">HTML</a>
                                    </li>
                                    <li>
                                        <a href="#">Freebies</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        @endsection
        @section('search')
            <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                        </div>
                    </div>
                </div>
        @endsection
        @section ('advertising')
            <!-- Advertising Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Рекламный блок</h5>
                    <div class="card-body">
                        <strong style="color:#ff0000"> Покупайте наших слонов </strong>
                    </div>
                </div>
@endsection
