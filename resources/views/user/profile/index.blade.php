@extends('layout.user.main')

@section('title', 'Profile')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="section accent-background">
        <div class="container">
            <div class="row gy-4 py-5">
                <div class="order-2 order-lg-1 d-flex flex-column justify-content-end align-items-center">
                    @php
                        use Carbon\Carbon;
                        $hour = Carbon::now()->format('H');
                        if($hour < 12){
                            $greeting = 'Good morning <span>&#9728;&#65039;</span>';
                        }elseif ($hour < 18){
                            $greeting = 'Good afternoon <span>&#127774;</span>';
                        }else{
                            $greeting = 'Good evening <span>&#127769;</span>';
                        }
                    @endphp
                    <h1 class="text-uppercase">{!! $greeting !!} {{Auth::user()->username}}</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section" style="padding-bottom: 0">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-between gy-4">
                <div class="col-lg-12" data-aos="fade-up">
                    <div class="portfolio-description">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>{{Auth::user()->quote}}</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <div>
                                    <img
                                        src="{{Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('assets/img/no_profile.jpg')}}"
                                        class="testimonial-img object-fit-cover"
                                        alt=""
                                        style="height: 90px"
                                    >
                                <h3>{{Auth::user()->username}}</h3>
                                <h4>{{Auth::user()->position ? Auth::user()->position : 'No Position'}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="stats section" style="background: none; padding-top: 0">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-4">
                    <div class="stats-item text-center w-100 h-100" style="padding: 0">
                        <span data-purecounter-start="0" data-purecounter-end="{{$blogCount}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Blogs</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-4">
                    <div class="stats-item text-center w-100 h-100" style="padding: 0">
                        <span data-purecounter-start="0" data-purecounter-end="{{$blogCountPublished}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Publish</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-4">
                    <div class="stats-item text-center w-100 h-100" style="padding: 0">
                        <span data-purecounter-start="0" data-purecounter-end="{{$blogCountUnpublished}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Unpublish</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Your Blogs</h2>
        <div class="d-xl-flex align-items-center justify-content-center gap-2 mb-3">
            <p>Share your new knowledge with the Techie's world.</p>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#blogModal">
                <i class="bi bi-file-earmark-plus fs-4"></i>
            </button>

            <!-- Start Modal New Blog -->
            <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="blogModalLabel">New Blog</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ url('/new-blog') }}" method="post" enctype="multipart/form-data" id="blogForm">
                            @csrf
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input name="title" type="text" class="form-control" id="blogTitle" placeholder="Blog Title" required>
                                    <label for="blogTitle">Title</label>
                                </div>

                                <div class="d-flex gap-2 mb-3">
                                    <select class="form-select" name="category" required>
                                        <option disabled selected value="">Choose Category</option>
                                        <option value="PROGRAMMING">Programming</option>
                                        <option value="AI">AI</option>
                                        <!-- Add more categories as needed -->
                                    </select>

                                    <select name="privacy" class="form-select" required>
                                        <option value="1">Publish</option>
                                        <option value="0">Unpublish</option>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" id="aiPrompt" class="form-control" placeholder="Enter AI prompt (e.g., new blog)">
                                    <button id="btnGemini" class="btn btn-outline-primary" type="button" onclick="generateBlog()">Generate Caption</button>
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

                                    <div id="preview-container" class="mt-3 d-none">
                                        <div class="position-relative d-inline-block">
                                            <i class="bi bi-x-circle text-danger position-absolute" style="top: 5px; right: 5px; cursor: pointer; z-index: 2;" onclick="clearPreview()"></i>
                                            <img id="image-preview" src="#" alt="Preview" class="img-thumbnail" style="max-height: 200px; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="submitBtn">Create Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal New Blog -->
        </div>
        <div class="container">

            <!-- Start Latest Blog -->
            @if($latestBlog)
                <div class="card border-0 shadow-sm mb-4 overflow-hidden h-100 transition-card">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 py-2 blog-thumbnail-container" style="background-image: url('{{asset('img/blog-bg.jpg')}}'); background-size: cover;">
                            <img src="{{ asset($latestBlog->blog_thumbnail) }}"
                                 class="img-fluid object-fit-cover rounded blog-thumbnail"
                                 alt="{{ $latestBlog->blog_title }}"
                                 style="height: 200px;"
                            >
                            <div class="blog-category-badge">
                                <span class="badge bg-danger">Latest <i class="bi bi-fire"></i></span>
                            </div>
                        </div>
                        <div class="col-md-8 d-flex flex-column">
                            <div class="card-body text-start d-flex flex-column h-100">
                                <h5 class="card-title fw-bold mb-3 text-capitalize"><span class="text-uppercase" style="color: darkviolet">Title | </span> {{ $latestBlog->blog_title }}</h5>
                                <div style="height: 100px; overflow: hidden">
                                    <p class="card-text mb-3">{!! Str::limit($latestBlog->blog_caption, 200) !!}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <p class="card-text mb-0">
                                        <small class="text-muted d-flex align-items-center">
                                            <i class="bi bi-calendar-date me-1"></i>
                                            {{ \Carbon\Carbon::parse($latestBlog->created_at)->format('F j, Y') }}
                                        </small>
                                    </p>
                                    <a href="{{route('user.blog-detail.index', $latestBlog)}}" class="btn btn-sm btn-outline-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- End Latest Blog -->

            <!-- Start All Blogs -->
            <div class="row gx-4 gy-4">
                @foreach($blogsOwner as $blogOwner)
                    <div class="col-12 col-md-4 mb-3">
                        <div class="card border-0 shadow-sm h-100 rounded-2 overflow-hidden" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="position-relative py-2" style="background-image: url('{{asset('img/blog-bg.jpg')}}'); background-size: cover;">
                                <img src="{{ asset($blogOwner->blog_thumbnail) }}"
                                     class="card-img-top"
                                     alt="{{ $blogOwner->blog_title }}"
                                     style="height: 200px; object-fit: contain;">

                                <!-- Badge -->
                                <span class="position-absolute top-0 start-0 m-2 badge {{$blogOwner->is_published ? 'bg-success' : 'bg-secondary'}} text-uppercase">
                                    {!! $blogOwner->is_published ? 'Published<i class="bi bi-eye ms-1"></i>' : 'Unpublished<i class="bi bi-eye-slash ms-1"></i>' !!}
                                </span>
                            </div>

                            <div class="card-body d-flex justify-content-between">
                                <h5 class="card-title fw-semibold text-capitalize text-start"><span class="text-uppercase" style="color: darkviolet">Title | </span>{{ $blogOwner->blog_title }}</h5>
                                <div class="dropdown">
                                    <span class="rounded-circle d-flex justify-content-center align-items-center"
                                          style="width: 20px; height: 20px; background: darkviolet;"
                                          data-bs-toggle="dropdown"
                                          aria-expanded="false"
                                          id="dropdownMenu"
                                    >
                                    <i class="bi bi-three-dots text-light"></i>
                                </span>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                        <li><h6 class="dropdown-header">Blog Actions</h6></li>
                                        <li><a class="dropdown-item" href="{{route('user.blog-detail.index', $blogOwner)}}"><i class="bi bi-book me-1"></i>Read</a></li>
                                        <li><a class="dropdown-item" href="{{route('user.blog-edit.index', $blogOwner)}}"><i class="bi bi-pencil me-1"></i>Edit</a></li>
                                        <li class="dropdown-item">
                                            <form action="{{ route('user.profile.index',$blogOwner->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            <button
                                                class="fw-bold text-danger border-0 w-100 text-start"
                                                style="background: none; padding: 0"
                                                type="button"
                                                onclick="showAlert(this)"
                                            >
                                                <i class="bi bi-trash me-1"></i>Delete
                                            </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End All Blogs -->

        </div>
    </div>

    <script>
        let quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write your blog content here...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, false] }],
                    ['bold', 'italic', 'underline', 'code', 'link'],
                    ['code-block'],
                ]
            },
            bounds: '#editor',
            scrollingContainer: '#editor'
        });

        document.getElementById('blogModal').addEventListener('hidden.bs.modal', function () {
            const modalBody = this.querySelector('.modal-body');
            modalBody.scrollTop = 0;
        });

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

            const fileInput = document.getElementById('blogImage');
            if (!fileInput.files || !fileInput.files.length) {
                Swal.fire({
                    icon: 'error',
                    title: 'Image Required',
                    text: 'Please select an image for your blog',
                    confirmButtonColor: '#3085d6',
                });
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
                return;
            }

            this.submit();
        });

        document.getElementById('blogModal').addEventListener('hidden.bs.modal', function () {
            document.getElementById('blogForm').reset();
            quill.root.innerHTML = '';
            document.getElementById('file-name').textContent = '';
            document.getElementById('preview-container').classList.add('d-none');
        });

        async function generateBlog() {
            const prompt = document.getElementById('aiPrompt').value;
            if (!prompt) {
                Swal.fire({
                    title: "prompt required",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1500
                });
                return;
            }

            const submitBtn = document.getElementById('submitBtn');
            const geminiBtn = document.getElementById('btnGemini');

            geminiBtn.disabled = true;
            geminiBtn.innerText = 'Generating...';
            submitBtn.disabled = true;
            submitBtn.innerText = 'Generating...';

            const url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=';
            const key = 'AIzaSyA4jiCecHVPXOq78qPscw0zHsar-ujLo_I';
            const fullUrl = url + key;

            try {
                const res = await fetch(fullUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        contents: [{ parts: [{ text: prompt }] }],
                    })
                });

                Swal.fire({
                    title: "Generate Done!",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1000
                });

                const data = await res.json();
                const firstCandidate = data.candidates?.[0];
                const markdownText = firstCandidate?.content?.parts?.[0]?.text;

                if (markdownText) {
                    const html = marked.parse(markdownText);
                    quill.clipboard.dangerouslyPasteHTML(html);
                } else {
                    quill.setText('No content generated');
                }

            } catch (error) {
                alert("Failed to generate blog content.");
                console.error(error);
            } finally {
                geminiBtn.disabled = false;
                geminiBtn.innerText = 'Generate Caption';
                submitBtn.disabled = false;
                submitBtn.innerText = 'Create Blog';
            }
        }
    </script>

    <script>
        function showAlert(button){
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = button.closest('form')
                    form.submit();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        }
    </script>


@endsection
