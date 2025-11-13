<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Single User Detail</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top-4">
                        <h3 class="mb-0">Single User Detail</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <p><strong>User ID : </strong> {{ $user_data->id }}</p>
                            <p><strong>User Name : </strong> {{ $user_data->username }}</p>
                            <p><strong>User Email : </strong> {{ $user_data->useremail }}</p>
                            <p><strong>Password : </strong> {{ $user_data->userpassword }}</p>
                            <p><strong>Gender : </strong> {{ $user_data->usergender }}</p>
                            <p><strong>Hobbies : </strong> {{ $user_data->userhobbies }}</p>
                            <p><strong>City : </strong> {{ $user_data->usercity }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-sm">← Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for components like dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
