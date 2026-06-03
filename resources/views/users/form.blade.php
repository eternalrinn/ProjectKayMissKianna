<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', optional($user)->name) }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', optional($user)->email) }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', optional($user)->address) }}">
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
            <option value="">Select gender</option>
            <option value="Male" @selected(old('gender', optional($user)->gender) === 'Male')>Male</option>
            <option value="Female" @selected(old('gender', optional($user)->gender) === 'Female')>Female</option>
        </select>
        @error('gender')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label d-block">Account Type</label>
        <div class="form-check form-switch mt-2">
            <input class="form-check-input" type="checkbox" name="is_admin" value="1" id="is_admin" @checked(old('is_admin', optional($user)->is_admin))>
            <label class="form-check-label" for="is_admin">Make this user an admin</label>
        </div>
        @error('is_admin')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ $user ? 'New Password' : 'Password' }}</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">{{ $user ? 'Update User' : 'Save User' }}</button>
        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</div>
