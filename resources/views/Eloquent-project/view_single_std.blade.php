<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Single Registration</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3f6fb;
        }
        .card {
            border-radius: 15px;
        }
        .table th {
            width: 30%;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="card shadow-lg p-4">
        <h3 class="text-center text-primary mb-4">Student Registration Details</h3>

        <table class="table table-bordered table-striped">
            <tr>
                <th>Student Name</th>
                <td>{{ $singleDetail->student_name }}</td>
            </tr>

            <tr>
                <th>Student Email</th>
                <td>{{ $singleDetail->student_email }}</td>
            </tr>

            <tr>
                <th>Student Phone</th>
                <td>{{ $singleDetail->student_phone }}</td>
            </tr>

            <tr>
                <th>Student Address</th>
                <td>{{ $singleDetail->student_address }}</td>
            </tr>

            <tr>
                <th>Date of Birth</th>
                <td>{{ $singleDetail->student_dob }}</td>
            </tr>

            <tr>
                <th>Admission Status</th>
                <td>{{ $singleDetail->adm_status }}</td>
            </tr>

            <tr>
                <th>Discipline</th>
                <td>{{ $singleDetail->adm_discipline }}</td>
            </tr>

            <tr>
                <th>Campus</th>
                <td>{{ $singleDetail->adm_campus }}</td>
            </tr>
        </table>

        <div class="text-center mt-4">
            <a href="{{ route('awkum.index') }}" class="btn btn-primary px-4">Back</a>
        </div>
    </div>

</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
