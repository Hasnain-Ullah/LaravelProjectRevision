<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Validation Form</title>
  <!-- Bootstrap 5 CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6"> <!-- Reduced width for better size -->

        <div class="card shadow-lg rounded-3">
          <div class="card-header bg-primary text-white text-center">
            <h4>Registration Form</h4>
          </div>
 
          {{-- @if ($errors->any())      print all messages at once
              <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach  
              </ul>
          @endif --}}
          
          <div class="card-body p-4">

            <form method="POST" action="{{ route('validate.user') }}">
                @csrf

              <!-- Text Field 1 -->
              <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name">
                <span class="text-danger">
                    @error('name')
                        {{ $message}}
                    @enderror
                </span>
              </div>

              <!-- Text Field 2 -->
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email">
                <span class="text-danger">
                    @error('email')
                        {{ $message}}
                    @enderror
                </span>
              </div>

              <!-- Password Field 2 -->
              {{-- <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password"  class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                <span class="text-danger">
                    @error('password')
                        {{ $message}}
                    @enderror
                </span>
              </div> --}}

              <!-- Radio Buttons -->
              <div class="mb-3">
                <label class="form-label d-block @error('gender') is-invalid @enderror">Gender</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender"  id="male" value="male" {{ old('gender') == 'male' ? 'checked' : ''}}>
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : ''}}>
                  <label class="form-check-label" for="female">Female</label>
                </div><br>
                <span class="text-danger">
                    @error('gender')
                        {{ $message}}
                    @enderror
                </span>
              </div>

              <!-- Multiple Checkboxes -->
              <div class="mb-3">
                <label class="form-label d-block">Select Your Hobbies</label>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="hobbies[]" id="reading" value="Reading" {{ in_array('Reading', old('hobbies',[])) ? 'checked' : '' }}>
                  <label class="form-check-label" for="reading">Reading</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="hobbies[]" id="traveling" value="Traveling" {{ in_array('Traveling', old('hobbies',[])) ? 'checked' : '' }}>
                  <label class="form-check-label" for="traveling">Traveling</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="hobbies[]" id="gaming" value="Gaming" {{ in_array('Gaming', old('hobbies',[])) ? 'checked' : '' }}>
                  <label class="form-check-label" for="gaming">Gaming</label>
                </div>
                <span class="text-danger">
                    @error('hobbies')
                        {{ $message}}
                    @enderror
                </span>
              </div>

              <!-- Dropdown -->
              <div class="mb-3">
                <label for="city" class="form-label">Select Your City</label>
                <select id="city" name="city" class="form-select">
                  <option value="">-- Choose City --</option>
                  <option value="karachi"{{ old('city') == 'karachi' ? 'selected' : ''}}>Karachi</option>
                  <option value="lahore" {{ old('city') == 'lahore' ? 'selected' : ''}}>Lahore</option>
                  <option value="islamabad" {{ old('city') == 'islamabad' ? 'selected' : ''}}>Islamabad</option>
                  <option value="peshawar" {{ old('city') == 'peshawer' ? 'selected' : ''}}>Peshawar</option>
                </select>
                <span class="text-danger">
                    @error('city')
                        {{ $message}}
                    @enderror
                </span>
              </div>

              <!-- Submit Button -->
              <div class="text-center">
                <button type="submit" class="btn btn-success px-5">Submit</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

</body>
</html>
