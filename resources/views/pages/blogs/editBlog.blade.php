@extends('layouts.app')
@section('content')
    <div class="container-md px-4 px-lg-3">
        <div class="my-5 text-center text-md-start">
            <h4 class="text-primary">Edit Blog</h4>
            <h5 class="text-left m-b-custom-2 fw-normal">buat pengguna lain terinspirasi!</h5>
        </div>
        <div class="d-md-flex justify-content-center">
            <div class="col col-xl-7 border border-1 rounded-4 align-items-center p-5">
                <form enctype="multipart/form-data" action="{{ route('blog.update', $article->slug) }}" class="ms-2" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <x-form.base-form-input class="mb-4" title="Judul Artikel" name="title" type="text"
                                value="{{ $article->title }}" :label="true">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </x-form.base-form-input>
                        </div>
                        <div class="col">
                            <label for="article_category" class="text-primary fw-bold mb-2">Kategori Artikel</label>
                            <x-form.base-form-select name="article_category" id="article_category" value="{{ $article->ArticleCategory->label }}"
                                placeholder="Pilih kategori" :options="$articleCategories" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <x-form.base-form-input class="mb-4" title="Sumber" name="source" type="text"
                                value="{{ $article->source }}" :label="true">
                                @error('source')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </x-form.base-form-input>
                        </div>
                        <div class="col">
                            <x-form.base-form-input class="mb-4" title="Penulis" name="created_by" type="text"
                                value="{{ $article->created_by }}" :label="true">
                                @error('created_by')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </x-form.base-form-input>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-primary label-add-blog">Thumbnail</label>
                        <div class="image-thumbnail">
                            <label for="image" style="width: 11rem; height: 11rem; background-color: #f4f4f4"
                                class="d-block rounded-3 position-relative z-10" id="label-image">
                                <img src="{{ asset('/storage/'.$article->file->file_path) }}" style="max-width: 11rem; max-height: 11rem;"
                                    class="object-fit-contain position-absolute top-50 start-50 translate-middle"
                                    id="thumbnail" alt="">
                                <img style="max-width: 2.5rem" src="{{ asset('assets/icons/addImage.png') }}"
                                    class="position-absolute top-50 start-50 translate-middle" alt="">
                            </label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                onchange="imageThumbnail()" name="image">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="mb-4">
                    <label class="form-label text-primary label-add-blog">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="floatingInput"
                        name="title">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                    <div class="mb-4">
                        <label for="content" class="form-label text-primary label-add-blog">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                            id="content" rows="4">{{ $article->content }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        <button class="btn btn-primary text-bg-primary mt-1 rounded-3 ms-2 px-4"
                            type="submit">Edit</button>
                    </div>
                    <x-dialog.base-dialog id="uploadArticleModal"
                        action="{{ route('blog.create', ['actionType' => 'submit']) }}"
                        title="Yakin akan upload artikel?" />
                </form>

                @push('after-script')
                    <script>
                        imageThumbnail = () => {
                            thumbnail.src = URL.createObjectURL(event.target.files[0])
                        }
                    </script>
                @endpush

                @if (session()->has('uploadArticleModal'))
                    @push('after-script')
                        <script>
                            imageThumbnail = () => {
                                console.log(100)
                            }
                            document.addEventListener('DOMContentLoaded', () => {
                                const popupModal = document.getElementById('uploadArticleModal')
                                popupModal.style.display = 'block'
                                popupModal.classList.add('show')
                                const modalBackdrop = document.createElement('div')
                                modalBackdrop.setAttribute('id', 'modal_backdrop')
                                modalBackdrop.className = 'modal-backdrop fade show'
                                document.body.appendChild(modalBackdrop)

                            });
                        </script>
                    @endpush
                @endif
            </div>
        </div>
    </div>
@endsection
