<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

  <div class="card shadow-lg rounded-4" style="width: 380px;">
    <div class="card-header bg-primary text-white text-center py-3">
      <h4 class="mb-0">Login</h4>
    </div>
    <div class="card-body p-4">

      <form action="{{ route('login.user') }}" method="POST">
        @csrf
        <!-- Email Field -->
        <div class="mb-3">
          <label for="email" class="form-label fw-semibold">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" >
          <span>
            @error('email')
              <p class="text-danger small mt-1">{{ $message }}</p>
            @enderror
          </span>
        </div>

        <!-- Password Field -->
        <div class="mb-3">
          <label for="password" class="form-label fw-semibold">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  placeholder="Enter your password" >
            <span>
                @error('password')
                <p class="text-danger small mt-1">{{ $message }}</p>
                @enderror
        </div>

        <!-- Password Field -->
        <div class="mb-3">
          <label for="password" class="form-label fw-semibold">Confirm Password</label>
          <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="password" name="confirm_password" placeholder="Confirm your password" >
            <span>
                @error('confirm_password')
                <p class="text-danger small mt-1">{{ $message }}</p>
                @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
          <button type="submit" class="btn btn-primary fw-semibold">Login</button>
        </div>
      </form>

    </div>
    <div class="card-footer text-center text-muted small">
      &copy; 2025 Encoders' IT
    </div>
  </div>

</body>
</html>
