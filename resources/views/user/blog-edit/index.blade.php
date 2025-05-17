@extends('layout.user.main')

@section('title', 'Blog Modification')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="section accent-background">

        <div class="container">
            <div class="row gy-4 py-5">
                <div class="order-2 order-lg-1 d-flex flex-column justify-content-end align-items-center">
                    <h1>Edit Your Blog</h1>
                </div>
            </div>
        </div>

    </section>
    <!-- /Hero Section -->

    <section id="form-edit-blog">
        <div class="container">
            <form action="{{ route('user.blog-edit.index', $blog->id) }}" method="post" enctype="multipart/form-data" id="blogForm">
                @csrf
                @method('PUT')
                <div>
                    <div class="form-floating mb-3">
                        <input name="title" type="text" class="form-control" id="blogTitle" placeholder="Blog Title" value="{{$blog->blog_title}}">
                        <label for="blogTitle">Title</label>
                    </div>

                    <div class="d-flex gap-2 mb-3">
                        <select class="form-select" name="category" required>
                            <option disabled selected value="">Choose Category</option>
                            <option value="PROGRAMMING" {{$blog->blog_category === 'PROGRAMMING' ? 'selected' : ''}}>Programming</option>
                            <option value="AI" {{$blog->blog_category === 'AI' ? 'selected' : ''}}>AI</option>
                            <!-- Add more categories as needed -->
                        </select>

                        <select name="privacy" class="form-select" required>
                            <option disabled selected value="">Choose Privacy</option>
                            <option value="1" {{$blog->is_published === 1 ? 'selected' : ''}}>Publish</option>
                            <option value="0" {{$blog->is_published === 0 ? 'selected' : ''}}>Unpublish</option>
                        </select>
                    </div>

                    <div id="editor" style="height: 150px; border: 1px solid #ccc; padding: 10px;"></div>
                    <input type="hidden" name="caption" id="captionInput">

                    <input type="hidden" name="created_by" value="{{Auth::user()->id}}">

                    <div class="my-3">
                        <div class="mb-3">
                            <label for="blogImage" class="btn btn-secondary d-flex align-items-center justify-content-center">
                                <i class="bi bi-cloud-upload fs-5 me-2"></i>
                                <span>Select Image</span>
                            </label>
                            <span id="file-name" class="text-muted ms-2"></span>
                            <input class="form-control d-none" type="file" id="blogImage" name="image" accept="image/jpeg,image/png,image/jpg,image/gif">
                            <div class="form-text">Supported formats: JPEG, PNG, JPG, GIF. Max size: 2MB</div>
                        </div>

                        <div id="preview-container" class="mt-3">
                            <div class="position-relative d-inline-block">
                                <i class="bi bi-x-circle text-danger position-absolute" style="top: 5px; right: 8px; cursor: pointer; z-index: 2;" onclick="clearPreview()"></i>
                                <img id="image-preview" src="{{asset($blog->blog_thumbnail)}}" alt="Preview" class="img-thumbnail" style="max-height: 200px; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <a class="btn btn-outline-secondary me-2" href="{{url('/profile')}}">Cancel</a>
                    <button type="submit" class="btn btn-primary" id="submitBtn">Edit Blog</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        let quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write your blog content here...',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'code', 'link']
                ]
            },
            bounds: '#editor',
            scrollingContainer: '#editor'
        });

        // Load initial content into the editor
        quill.root.innerHTML = `{!! $blog->blog_caption !!}`;

        document.getElementById('blogImage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const fileNameDisplay = document.getElementById('file-name');
            const previewContainer = document.getElementById('preview-container');
            const imagePreview = document.getElementById('image-preview');

            if (!file) {
                fileNameDisplay.textContent = "";
                previewContainer.classList.add('d-none');
                return;
            }

            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File Type',
                    text: 'Please upload an image file (JPEG, PNG, JPG, GIF)',
                    confirmButtonColor: '#3085d6',
                });
                this.value = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'File Too Large',
                    text: 'Maximum file size is 2MB',
                    confirmButtonColor: '#3085d6',
                });
                this.value = '';
                return;
            }

            fileNameDisplay.textContent = file.name;

            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                previewContainer.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        });

        function clearPreview() {
            document.getElementById('blogImage').value = '';
            document.getElementById('file-name').textContent = '';
            document.getElementById('preview-container').classList.add('d-none');
        }

        document.getElementById('blogForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const originalBtnText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';

            const htmlContent = quill.root.innerHTML;
            document.getElementById('captionInput').value = htmlContent;

            if (htmlContent.replace(/<[^>]*>/g, '').trim() === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Content Required',
                    text: 'Please write some content for your blog',
                    confirmButtonColor: '#3085d6',
                });
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
                return;
            }

            this.submit();
        });
    </script>
@endsection
