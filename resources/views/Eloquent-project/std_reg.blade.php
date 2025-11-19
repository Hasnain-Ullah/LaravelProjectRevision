<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Admission Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .form-card {
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .form-label {
      font-weight: 600;
    }
  </style>
</head>

<body class="bg-light">

<div class="container py-5">
  <div class="card form-card p-4">
    <h2 class="text-center mb-4 text-primary">Student Admission Form</h2>

    <form method="POST" action="{{ route('awkum.store') }}">
        @csrf
      <div class="row g-3">

        <!-- Student Name -->
        <div class="col-md-6">
          <label class="form-label">Student Name</label>
          <input type="text" 
                 name="student_name" 
                 class="form-control @error('student_name') is-invalid @enderror"
                 placeholder="Enter full name"
                 value="{{ old('student_name') }}">
          @error('student_name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Email -->
        <div class="col-md-6">
          <label class="form-label">Student Email</label>
          <input type="email" 
                 name="student_email" 
                 class="form-control @error('student_email') is-invalid @enderror"
                 placeholder="Enter email address"
                 value="{{ old('student_email') }}">
          @error('student_email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Phone -->
        <div class="col-md-6">
          <label class="form-label">Student Phone</label>
          <input type="text" 
                 name="student_phone" 
                 class="form-control @error('student_phone') is-invalid @enderror"
                 placeholder="Enter phone number"
                 value="{{ old('student_phone') }}">
          @error('student_phone')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Address -->
        <div class="col-md-6">
          <label class="form-label">Student Address</label>
          <input type="text" 
                 name="student_address" 
                 class="form-control @error('student_address') is-invalid @enderror"
                 placeholder="Enter address"
                 value="{{ old('student_address') }}">
          @error('student_address')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Date of Birth -->
        <div class="col-md-6">
          <label class="form-label">Date of Birth</label>
          <input type="date" 
                 name="student_dob" 
                 class="form-control @error('student_dob') is-invalid @enderror"
                 value="{{ old('student_dob') }}">
          @error('student_dob')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Admission Status (Radio) -->
        <div class="col-md-6">
          <label class="form-label d-block">Admission Status</label>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" 
                   name="adm_status" value="Self"
                   {{ old('adm_status') == 'Self' ? 'checked' : '' }}>
            <label class="form-check-label">Self</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" 
                   name="adm_status" value="Open"
                   {{ old('adm_status') == 'Open' ? 'checked' : '' }}>
            <label class="form-check-label">Open</label>
          </div>

          @error('adm_status')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Discipline (Checkboxes) -->
        <div class="col-md-12">
          <label class="form-label d-block">Admission Discipline</label>


          <div class="form-check form-check-inline">
            <input type="checkbox" name="adm_discipline[]" value="Hons"
                   class="form-check-input"
                   {{ in_array('Hons', old('adm_discipline', [])) ? 'checked' : '' }}>
            <label class="form-check-label">Hons</label>
          </div>

          <div class="form-check form-check-inline">
            <input type="checkbox" name="adm_discipline[]" value="Software"
                   class="form-check-input"
                   {{ in_array('Software', old('adm_discipline', [])) ? 'checked' : '' }}>
            <label class="form-check-label">Software</label>
          </div>

          <div class="form-check form-check-inline">
            <input type="checkbox" name="adm_discipline[]" value="Cyber"
                   class="form-check-input"
                   {{ in_array('Cyber', old('adm_discipline', [])) ? 'checked' : '' }}>
            <label class="form-check-label">Cyber</label>
          </div>

          <div class="form-check form-check-inline">
            <input type="checkbox" name="adm_discipline[]" value="AI"
                   class="form-check-input"
                   {{ in_array('AI', old('adm_discipline', [])) ? 'checked' : '' }}>
            <label class="form-check-label">AI</label>
          </div>

          @error('adm_discipline')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Campus Dropdown -->
        <div class="col-md-6">
          <label class="form-label">Campus</label>
          <select name="adm_campus" 
                  class="form-select @error('adm_campus') is-invalid @enderror">
            <option disabled>Choose campus</option>
            <option value="Garden"  {{ old('adm_campus') == 'Garden' ? 'selected' : '' }}>Garden</option>
            <option value="Main"    {{ old('adm_campus') == 'Main' ? 'selected' : '' }}>Main</option>
            <option value="Shanker" {{ old('adm_campus') == 'Shanker' ? 'selected' : '' }}>Shanker</option>
            <option value="Pabbi"   {{ old('adm_campus') == 'Pabbi' ? 'selected' : '' }}>Pabbi</option>

          </select>
          @error('adm_campus')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

      </div>

      <!-- Submit Button -->
      <div class="text-center mt-4">
        <input type="submit" class="btn btn-primary px-4 py-2" value="Submit">
      </div>

    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
