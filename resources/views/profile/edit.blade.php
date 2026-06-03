@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h1 class="h3 mb-1">My Profile</h1>
        <p class="text-muted mb-0">Update your personal information and profile picture.</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card page-card shadow-sm">
                <div class="card-body text-center p-4">
                    @if ($user->profile_photo)
                        <img
                            src="{{ asset('storage/' . $user->profile_photo) }}"
                            alt="Profile Photo"
                            class="profile-photo mb-3"
                        >
                    @else
                        <div class="profile-photo d-flex align-items-center justify-content-center bg-primary-subtle text-primary fs-1 fw-bold mx-auto mb-3">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                    <h2 class="h5 mb-1">{{ $user->name }}</h2>
                    <div class="mb-2">
                        <span class="badge text-bg-dark">{{ $user->isAdmin() ? 'Admin Account' : 'Member Account' }}</span>
                    </div>
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card page-card shadow-sm">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $user->address) }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                    <option value="">Select gender</option>
                                    <option value="Male" @selected(old('gender', $user->gender) === 'Male')>Male</option>
                                    <option value="Female" @selected(old('gender', $user->gender) === 'Female')>Female</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Profile Picture</label>
                                <input type="file" name="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror">
                                @error('profile_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
