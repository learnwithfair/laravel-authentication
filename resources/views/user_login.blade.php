<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Responsive Sign In Card</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: gray;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: white;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-header img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header p-0">
            <img src="{{ asset('banner/banner.jpg') }}" alt="Card Header Image">
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="m-0">Sign In</h5>
                <div>
                    <a href="#" class="text-dark me-2 border-circle border-info"><i
                            class="bi bi-facebook"></i></a>
                    <a href="#" class="text-dark"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
            <form method="POST" action="{{ route('user.submit') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                @error('username')
                    <span style = "color:red;">{{ $message }}</span><br><br>
                @enderror
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                @error('password')
                    <span style = "color:red;">{{ $message }}</span><br><br>
                @enderror
                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <input type="submit" class="btn btn-primary w-100" value='Sign In'>
            </form>
            <p class="text-center mt-3">
                Don't have an account? <a href="#">Sign Up</a>
            </p>
        </div>
    </div>

    <!-- Bootstrap Icons and JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
