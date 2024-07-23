<div class="d-block">

    @foreach ($posts as $post)
        <div class="d-flex" style="width: 45vw">
            <div style="width: 18rem">
                <img src="..." class="card-img-top" alt="...">
            </div>
            <div class="card dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-light">
                <div class="card-body">
                    <p class="card-title">
                        {{ $post->title }}
                    </p>
                    <p class="card-text">
                        {{ $post->text }}
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    @endforeach
 
</div>