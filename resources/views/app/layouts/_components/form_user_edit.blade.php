<div class="row" style="margin-top:80px;">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('app.home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row mt-3 mb-5">
    <div class="col">
        <div class="">
            <div class="card p-4 shadow-sm">
                <h3 class="text-center mb-4">Profile</h3>
                <form id="editUserForm">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3 align-items-center">
                        <label for="name" class="form-label">Name</label>
                        <div class="col">
                            <input type="name" class="form-control form-control" id="name" name="name" placeholder="Enter your name here..." value="{{$user->name ?? ''}}">
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="password" class="form-label">Password</label>
                        <div class="col">
                            <input type="password" class="form-control form-control" id="password" name="password" placeholder="Enter your password here...">
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="col">
                            <input type="password" class="form-control form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password here...">
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="address" class="form-label">Address</label>
                        <div class="col">
                            <textarea type="text" class="form-control form-control" id="address" name="address" placeholder="Enter your address here...">{{$user->address ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="phone" class="form-label">Phone</label>
                        <div class="col">
                            <input type="text" class="form-control form-control" id="phone" name="phone" placeholder="Enter your phone here..." value="{{$user->phone ?? ''}}">
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="title" class="form-label">Title</label>
                        <div class="col">
                            <input type="text" class="form-control form-control" id="title" name="title" placeholder="Enter the title here..." value="{{$user->title ?? ''}}">
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="message" class="form-label">Message</label>
                        <div class="col">
                            <textarea rows="10" type="text" class="form-control form-control" id="message" name="message" placeholder="Enter the message here...">{{$user->message ?? ''}}</textarea>
                        </div>
                    </div>
                    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                </form>
                <div id="resultMessage" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>
