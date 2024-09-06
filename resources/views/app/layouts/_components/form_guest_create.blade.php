<div class="row" style="margin-top:80px;">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('app.home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">New Guest</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row mt-3 mb-5">
    <div class="col">
        <div class="card p-4 shadow-sm">
            <h3 class="text-center mb-4">New Guest</h3>
            <form id="createGuestForm">
                @csrf
                <div class="row mb-3 align-items-center">
                    <label for="name" class="form-label">Names</label>
                    <div class="col">
                        <input type="name" class="form-control form-control" id="name" name="name" placeholder="Enter your family members' names here...">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label for="number_of_guests" class="form-label">Number of Guests</label>
                    <div class="col-2">
                        <input type="number" class="form-control form-control" id="number_of_guests" name="number_of_guests" placeholder="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Save</button>
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::getUser()->id }}">
            </form>
            <div id="resultMessage" class="mt-3"></div>
        </div>
    </div>
</div>