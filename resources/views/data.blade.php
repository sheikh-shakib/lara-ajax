@foreach ($posts as $post)
    <div class="card">
        <div class="card-header">
            <h4> <a href=""> {{$post->title}} </a></h4>
        </div>
        <div class="card-body">
            <p>{{$post->body}}</p>
            <div class="text-center">
                <button class="btn btn-success">read more</button>
            </div>
        </div>
    </div>
@endforeach
