<div class="row align-items-center justify-content-center gap-4 mb-3">
    <div class="col-md-3" style="height: 12rem;">
        <img src="{{ asset('/storage/'.$article->file->file_path) }}" class="w-100 h-100 object-fit-cover border-0 rounded-4" alt="Blog banner">
    </div>

    <div class="col-md-5">
        <p class="text-primary mb-1"><small style="font-size: .8rem">Lifestyle</small></p>
        <h5 class="fw-bold">{{ $article->title }}</h5>
        <p style="font-size: .9rem" class="elipsis-description">{{ $article->content}}</p>
        <a class="text-primary fw-bold" style="font-size: 0.75rem" href="{{route('blog.index')}}/{{ $article->slug }}">
            Read More
        </a>
    </div>
</div>
