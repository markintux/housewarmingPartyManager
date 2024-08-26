<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="card p-4 shadow-sm">
        <h3 class="text-center mb-4">Register</h3>
        <form id="registerForm">
            @csrf
            <div class="row mb-3 align-items-center">
                <label for="name" class="form-label">Name</label>
                <div class="col">
                    <input type="name" class="form-control form-control-lg" id="name" name="name" placeholder="Enter your name here...">
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <label for="email" class="form-label">Email</label>
                <div class="col">
                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email here...">
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <label for="password" class="form-label">Password</label>
                <div class="col">
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password here...">
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="col">
                    <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password here...">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div id="resultMessage" class="mt-3"></div>
    </div>
</div>