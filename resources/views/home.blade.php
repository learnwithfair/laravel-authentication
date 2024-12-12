@auth
    <div class="container mt-5">
        <h1>Welcome to the Home Page</h1>

        <p>Hello, {{ Auth::user()->name }}! You are logged in.</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
@endauth
