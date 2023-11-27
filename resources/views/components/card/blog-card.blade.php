<div class="row align-items-center justify-content-center gap-4">
    <div class="col-md-3" style="height: 13rem;">
        <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721" class="w-100 h-100 object-fit-cover border-0 rounded-4" alt="Blog banner">
    </div>

    <div class="col-md-4">
        <p class="text-primary">Lifestyle</p>
        <h4 class="fw-bold">{{ $article->title }}</h4>
        <p>{{ $article->content}}</p>
        <a class="text-primary fw-bold" style="font-size: 0.75rem" href="{{ route('blog.details', $article->slug) }}">
            Read More
        </a>
    </div>
</div>
