<div class="row" style="margin-top:80px;">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('app.home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('gifts.index')}}">View Gifts</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Gift</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row mt-3 mb-5">
    <div class="col">
        <div class="card p-4 shadow-sm">
            <h3 class="text-center mb-4">Edit Gift</h3>
            <form id="editGiftForm">
                @csrf
                @method('PUT')
                <div class="row mb-3 align-items-center">
                    <label for="gift" class="form-label">Gift</label>
                    <div class="col">
                        <input type="gift" class="form-control form-control" id="gift" name="gift" placeholder="Enter the name of the gift here..." value="{{ $gift->gift }}">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label for="gift_image" class="form-label">Gift Image</label>
                    <div class="col">
                        <input type="file" class="form-control" id="gift_image" name="gift_image">
                    </div>
                </div>
                @if ($gift->gift_image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $gift->gift_image) }}" alt="{{ $gift->gift }}" style="max-width: 100px;">
                    </div>
                @endif
                <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::getUser()->id }}">
                <input type="hidden" id="gift_id" name="gift_id" value="{{ $gift->id }}">
            </form>
            <div id="resultMessage" class="mt-3"></div>
        </div>
    </div>
</div>