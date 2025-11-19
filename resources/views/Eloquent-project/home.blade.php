<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      width: 100%;
      background: #f4f6fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .wide-card {
      width: 95%;
      margin: auto;
    }

    .table {
      width: 100%;
      font-size: 15px;
    }

    .table th, .table td {
      vertical-align: middle !important;
      padding: 10px;
    }

    .card-header h4 {
      font-size: 24px;
    }

    .add-btn a {
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>

<body class="bg-light">

  <div class="container-fluid py-5">
    <div class="card shadow-lg border-0 rounded-4 wide-card">

      <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4 p-3">
        <h4 class="mb-0">Student Registration Details</h4>

        <button class="btn btn-light text-primary fw-bold add-btn">
          <a href="{{ route('awkum.create') }}">
            <i class="bi bi-plus-circle"></i> Add New Student
          </a>
        </button>
      </div>

      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success m-3">
            {{ session('success') }}
          </div>
        @endif
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped align-middle table-hover">
            <thead class="table-primary">
              <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Status</th>
                <th>Discipline</th>
                <th>Campus</th>
                <th colspan="3" class="text-center">Actions</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($students as $student)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->student_name }}</td>
                <td>{{ $student->student_email }}</td>
                <td>{{ $student->student_phone }}</td>
                <td>{{ $student->student_address }}</td>
                <td>{{ $student->student_dob }}</td>
                <td>{{ $student->adm_status }}</td>
                <td>{{ $student->adm_discipline }}</td>
                <td>{{ $student->adm_campus }}</td>

                <td>
                  <a href="{{ route('awkum.show',$student->id) }}" class="btn btn-sm btn-primary">View</a>
                </td>
                <td>
                  <a href="{{ route('awkum.edit', $student->id) }}" class="btn btn-sm btn-warning">Update</a>
                </td>
                <td>
                  <form action="{{ route('awkum.destroy',$student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- 🔥 PAGINATION ADDED HERE -->
        <div class="d-flex justify-content-center my-3">
          {{ $students->links('pagination::bootstrap-5') }}
        </div>

      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>
</body>
</html>
