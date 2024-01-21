@extends('layouts.app')
@section('content')
    <div class="container-md px-4 px-lg-3">
        <div class="my-5 text-center text-md-start">
            <h4 class="text-primary">Edit Tips dan Artikel</h4>
            <h5 class="text-left m-b-custom-2 fw-normal">buat pengguna lain terinspirasi!</h5>
        </div>
        <div class="d-md-flex justify-content-center">
            <div class="col col-xl-7 border border-1 rounded-4 align-items-center p-5">
                <form enctype="multipart/form-data" action="{{ route('blog.validate') }}" class="d-flex flex-column gap-4" method="POST">
                    @csrf
                    @if (Session::get('articleModal'))
                        @php
                            $data = Session::get('articleModal');
                        @endphp
                    @else
                        @php
                            $data = null;
                        @endphp
                    @endif
                    <input type="hidden" value="{{ $article->slug }}" name="slug">
                    <div class="row gap-4 gap-sm-3">
                        <div class="col-12 col-sm">
                            <x-form.base-form-input title="Judul Artikel" name="title" type="text"
                                value="{{ $data ? $data['title'] : $article->title }}" :label="true" mandatory>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </x-form.base-form-input>
                        </div>
                        <div class="col-12 col-sm">
                            <label for="article_category" class="text-primary fw-bold mb-2 mandatory">Kategori Artikel</label>
                            <x-form.base-form-select name="article_category" id="article_category"
                                selectedValue="{{ $data ? $data['article_category'] : $article->articleCategory->id }}"
                                placeholder="Pilih kategori" :options="$articleCategories" />
                        </div>
                    </div>

                    <div class="row gap-4 gap-sm-3">
                        <div class="col-12 col-sm">
                            <x-form.base-form-input title="Sumber" name="source" type="text"
                                value="{{ $data ? $data['source'] : $article->source }}" :label="true" mandatory>
                                @error('source')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </x-form.base-form-input>
                        </div>
                        <div class="col-12 col-sm">
                            <x-form.base-form-input title="Penulis" name="created_by" type="text"
                                value="{{ $article->created_by }}" :label="true" disabled>
                                @error('created_by')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </x-form.base-form-input>
                        </div>
                    </div>

                    <div>
                        <label class="form-label text-primary label-add-blog fw-bold">Banner Artikel</label>
                        <x-button.upload-image-button src="{{ Storage::disk('public')->exists($article->articleBanner->file_path . $article->articleBanner->file_name) ? Storage::disk('public')->url($article->articleBanner->file_path . $article->articleBanner->file_name) : asset('assets/img/temuinklusi-asset.png') }}" name="article_banner" />
                    </div>
                    @if ($data)
                    <input type="hidden" name="article_banner" value="{{ $data['article_banner'] ?? '' }}">
                    @endif

                    <div>
                        <label for="content" class="form-label text-primary label-add-blog fw-bold mandatory">Konten</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="4">{{ $data ? $data['content'] : $article->content }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        <button class="btn btn-primary text-bg-primary mt-1 rounded-custom ms-2 px-4"
                            type="submit">Edit</button>
                    </div>
                </form>

                <x-dialog.base-dialog id="articleModal" action="{{ route('blog.update', $article->slug) }}"
                    title="Yakin akan edit artikel?" method="PUT">
                    @if (session()->has('articleModal'))
                        @foreach (session()->get('articleModal') as $key => $value)
                            <input name="{{ $key }}" value="{{ $value }}" type="hidden" />
                        @endforeach
                    @endif
                </x-dialog.base-dialog>

                @push('after-script')
                    <script>
                        imageThumbnail = () => {
                            thumbnail.src = URL.createObjectURL(event.target.files[0])
                        }
                    </script>
                @endpush

                @if (session()->has('articleModal'))
                    @push('after-script')
                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                const popupModal = document.getElementById('articleModal')
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
