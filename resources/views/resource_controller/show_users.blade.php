<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Records</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 40px;
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .action-links a {
            text-decoration: none;
        }

        .btn-update {
            background-color: #0d6efd;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn btn-primary mb-3 {
            background-color: #007bff;
            color: white;
            width:200px;
            margin-left: 60px;

        }
    </style>
</head>
<body>

    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark">Registered Users Records</h2>
        </div>
        <div>
            <a href="{{ route('resource.create') }}" class="btn btn-primary mb-3">Add New Users</a>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped align-middle text-center">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th> Password</th>
                            <th>Gender</th>
                            <th>Hobbies</th>
                            <th>City</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registered_users as $reg_users)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $reg_users->username}}</td>
                                <td>{{ $reg_users->useremail}}</td>
                                <td style="font-size:22px">{{ "*********"}}</td>
                                <td>{{ $reg_users->usergender}}</td>
                                <td>{{ $reg_users->userhobbies}}</td>
                                <td>{{ $reg_users->usercity}}</td>
                                <td class="action-links">
                                    <a href="{{ route('resource.show', $reg_users->id) }}" class="btn btn-sm btn-primary">View</a>
                                </td>                                
                                <td class="action-links">
                                    <form action="{{ route('resource.destroy', $reg_users->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('Are you sure you want to delete this record?');">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                                <td class="action-links">
                                    <a href="{{ route('resource.edit' , $reg_users->id ) }}" class="btn btn-sm btn-update">Update</a>
                                </td>   
                            </tr>
                        @endforeach
                        @if($registered_users->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center text-muted">No Faculty Records is found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <a href="" class="btn btn-primary">Back to Main Page</a>
        </div>
    </div>
</body>
</html>
