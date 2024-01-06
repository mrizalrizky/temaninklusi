<div class="row align-items-center justify-content-center gap-4 mb-3">
    <div class="col-md-3" style="height: 12rem;">
        <img src="{{ Storage::disk('public')->exists($article->articleBanner->file_path) ? Storage::disk('public')->url($article->articleBanner->file_path . $article->articleBanner->file_name) : $article->articleBanner->file_path }}" class="w-100 h-100 object-fit-cover border-0 rounded-4" alt="Article banner">
    </div>

    <div class="col-md-5">
        <p class="text-primary mb-1"><small style="font-size: .9rem">{{ $article->articleCategory->label ?? ''}}</small></p>
        <h5 class="fw-bold">{{ $article->title }}</h5>
        <p class="elipsis-description">{{ Str::limit($article->content, 128) }}</p>
        <a class="text-primary fw-bold" style="font-size: 0.75rem" href="{{ route('blog.index')}}/{{ $article->slug }}">
            Read More
        </a>
    </div>
</div>
