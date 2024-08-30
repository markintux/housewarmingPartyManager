<div class="row" style="margin-top:80px;">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('app.home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">New Image</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row mt-3 mb-5">
    <div class="col">
        <div class="card p-4 shadow-sm">
            <h3 class="text-center mb-4">New Image</h3>
            <form id="createImageForm">
                @csrf
                <div class="row mb-3 align-items-center">
                    <label for="image" class="form-label">Image</label>
                    <div class="col">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Create</button>
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::getUser()->id }}">
            </form>
            <div id="resultMessage" class="mt-3"></div>
        </div>
    </div>
</div>