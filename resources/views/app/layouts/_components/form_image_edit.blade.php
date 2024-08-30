<div class="row" style="margin-top:80px;">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('app.home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('images.index')}}">View Images</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Image</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row mt-3 mb-5">
    <div class="col">
        <div class="card p-4 shadow-sm">
            <h3 class="text-center mb-4">Edit Image</h3>
            <form id="editImageForm">
                @csrf
                @method('PUT')
                <div class="row mb-3 align-items-center">
                    <label for="image" class="form-label">Image</label>
                    <div class="col">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                @if ($image->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="image" style="max-width: 200px;">
                    </div>
                @endif
                <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::getUser()->id }}">
                <input type="hidden" id="image_id" name="image_id" value="{{ $image->id }}">
            </form>
            <div id="resultMessage" class="mt-3"></div>
        </div>
    </div>
</div>