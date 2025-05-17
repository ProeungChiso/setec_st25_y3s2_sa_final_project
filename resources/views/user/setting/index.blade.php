@extends('layout.user.main')

@section('title', 'Setting')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="section accent-background">
        <div class="container">
            <div class="row gy-4 py-5">
                <div class="order-2 order-lg-1 d-flex flex-column justify-content-end align-items-center">
                    <h1 class="text-uppercase">Setting</h1>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-4">
            <ul class="nav nav-tabs" id="profileTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab">Profile Info</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab">Change Password</button>
                </li>
            </ul>

            <div class="tab-content mt-3" id="profileTabContent">
                <div class="tab-pane fade show active" id="info" role="tabpanel">
                    <h3>Profile Info</h3>
                    <p class="text-black-50 fst-italic">Joined on {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('F j, Y') }}</p>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <form action="{{route('avatar.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            <label for="avatarInput">
                                <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('/assets/img/no_profile.jpg') }}"
                                     class="rounded-circle shadow-sm mb-3 object-fit-cover"
                                     alt="Avatar"
                                     width="120"
                                     height="120"
                                     id="avatarPreview"
                                >
                            </label>

                            <input type="file" id="avatarInput" name="avatar" accept="image/*" style="display: none;">
                            <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="avatarModalLabel">Image Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="border border-success rounded p-1" style="width: 200px; height: 200px; overflow: hidden;">
                                                <img id="modalPreview"
                                                     src=""
                                                     alt="Selected Image"
                                                     class="rounded"
                                                     style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary" id="saveImage">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div id="btn-container">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal"><i class="bi bi-pencil-fill me-1"></i>Edit Info</button>
                            </div>
                            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <form id="updateProfileForm" action="{{route('info.update')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit your info</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="mb-3 col-lg-6 col-md-6">
                                                        <label for="edit_firstname" class="form-label">First Name</label>
                                                        <input name="first_name" type="text" class="form-control" id="edit_firstname" value="{{Auth::user()->first_name}}">
                                                    </div>
                                                    <div class="mb-3 col-lg-6 col-md-6">
                                                        <label for="edit_lastname" class="form-label">Last Name</label>
                                                        <input name="last_name" type="text" class="form-control" id="edit_lastname" value="{{Auth::user()->last_name}}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-lg-6 col-md-6">
                                                        <label for="edit_username" class="form-label">Username</label>
                                                        <input name="username" type="text" class="form-control" id="edit_username" value="{{Auth::user()->username}}">
                                                    </div>
                                                    <div class="mb-3 col-lg-6 col-md-6">
                                                        <label for="edit_position" class="form-label">Position</label>
                                                        <input name="position" type="text" class="form-control" id="edit_position" value="{{Auth::user()->position}}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-12">
                                                        <label for="edit_phone_number" class="form-label">Phone Number</label>
                                                        <input name="phone_number" type="text" class="form-control" id="edit_phone_number" value="{{Auth::user()->phone_number}}">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_quote" class="form-label">Quote</label>
                                                    <textarea name="quote" class="form-control" style="resize: none;" id="edit_quote" rows="3">{{Auth::user()->quote}}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-3 col-6">
                                <label for="firstname" class="form-label text-black-50">First Name</label>
                                <input name="firstname" type="text" class="form-control" id="firstname" placeholder="First Name" value="{{Auth::user()->first_name}}" disabled>
                            </div>
                            <div class="mb-3 col-lg-3 col-6">
                                <label for="lastname" class="form-label text-black-50">Last Name</label>
                                <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last Name" value="{{Auth::user()->last_name}}" disabled>
                            </div>
                            <div class="mb-3 col-lg-3 col-6">
                                <label for="username" class="form-label text-black-50">Username</label>
                                <input name="username" type="text" class="form-control" id="username" placeholder="Username" disabled value="{{Auth::user()->username}}">
                            </div>
                            <div class="mb-3 col-lg-3 col-6">
                                <label for="position" class="form-label text-black-50">Position</label>
                                <input name="position" type="text" class="form-control" id="position" placeholder="Position" disabled value="{{Auth::user()->position ?? 'No Position'}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6 col-12">
                                <label for="email" class="form-label text-black-50">Email</label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Email" disabled value="{{Auth::user()->email}}">
                            </div>
                            <div class="mb-3 col-md-6 col-12">
                                <label for="phone_number" class="form-label text-black-50">Phone Number</label>
                                <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="Phone Number" disabled value="{{Auth::user()->phone_number}}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="quote" class="form-label text-black-50">Quote</label>
                            <textarea name="quote" class="form-control" style="resize: none;" id="quote" rows="3" disabled>{{Auth::user()->quote}}</textarea>
                        </div>
                </div>
                <div class="tab-pane fade" id="password" role="tabpanel">
                    <h3>Change Password</h3>
                    <form action="{{route('password.update')}}" method="post" id="passwordChangeForm" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                            <div class="form-check mt-1">
                                <input class="form-check-input" type="checkbox" id="showCurrentPassword">
                                <label class="form-check-label" for="showCurrentPassword">
                                    Show password
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="new_password" required>
                            <div class="form-check mt-1">
                                <input class="form-check-input" type="checkbox" id="showNewPassword">
                                <label class="form-check-label" for="showNewPassword">
                                    Show password
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="new_password_confirmation" required>
                            <div class="form-check mt-1">
                                <input class="form-check-input" type="checkbox" id="showConfirmPassword">
                                <label class="form-check-label" for="showConfirmPassword">
                                    Show password
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('showCurrentPassword').addEventListener('change', function() {
            const passwordField = document.getElementById('currentPassword');
            passwordField.type = this.checked ? 'text' : 'password';
        });
        document.getElementById('showNewPassword').addEventListener('change', function() {
            const passwordField = document.getElementById('newPassword');
            passwordField.type = this.checked ? 'text' : 'password';
        });
        document.getElementById('showConfirmPassword').addEventListener('change', function() {
            const passwordField = document.getElementById('confirmPassword');
            passwordField.type = this.checked ? 'text' : 'password';
        });
    </script>

    <script>
        document.getElementById('avatarInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatarPreview').src = e.target.result;
                    document.getElementById('modalPreview').src = e.target.result;
                    const modal = new bootstrap.Modal(document.getElementById('avatarModal'));
                    modal.show();
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        const avatarModalEl = document.getElementById('avatarModal');
        const avatarPreview = document.getElementById('avatarPreview');
        avatarModalEl.addEventListener('hidden.bs.modal', function(){
            avatarPreview.src = "{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('/assets/img/no_profile.jpg') }}"
        })
        const modal = new bootstrap.Modal(avatarModalEl);
    </script>

@endsection
