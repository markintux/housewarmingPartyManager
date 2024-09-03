@if ($images->isEmpty())
    <div class="mt-5"></div>
@else
    <div id="userImagesCarousel" class="carousel slide mt-5">
        <div class="carousel-indicators">
            @foreach ($images as $index => $image)
                <button type="button" data-bs-target="#userImagesCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($images as $index => $image)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid" alt="image">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#userImagesCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#userImagesCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endif
<form id="giftsForm" action="{{ route('gifts.choose') }}" method="POST">
    @csrf
    <div class="row mt-3 mb-5">
        <div class="col">
            <h1><strong>{{ $user->title ?? 'Housewarming Party of ' . $user->name }}</strong></h1>
            <p>{{ $user->message ?? '' }}</p>
            @if ($gifts->isEmpty())
                <p>No gifts available.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>                            
                                <th>Image</th>
                                <th>Gift</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gifts as $gift)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selected_gifts[]" value="{{ $gift->id }}">
                                    </td>
                                    <td>
                                        @if ($gift->gift_image)
                                            <img src="{{ asset('storage/' . $gift->gift_image) }}" alt="{{$gift->gift}}" style="width: 100px; height: auto;">
                                        @else
                                            <i class="fas fa-image" style="font-size: 100px;"></i>
                                        @endif
                                    </td>
                                    <td>{{ $gift->gift }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row g-2 align-items-center">
                    <div class="col-auto">
                    <label class="col-form-label">Enter with your code:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="guest_code" name="guest_code" class="form-control" placeholder="Your code here...">
                    </div>
                    <div class="col-auto">
                        <button id="submitSelection" type="submit" class="btn btn-success">Select Gifts</button>
                    </div>
                </div>
                <div id="resultMessage" class="alert d-none"></div>
            @endif
        </div>
    </div>
</form>
<div class="row mb-5 pb-5">
    <div class="col-auto">
        <h1><strong>I forgot the gifts I chose...</strong></h1>
        <p>No problem! If you forgot the gifts you chose, enter your code in the field below and click "Remember Gifts". Simple, quick and easy!</p>
        <div class="row g-2 align-items-center">
            <div class="col-auto">
              <label class="col-form-label">Enter with your code:</label>
            </div>
            <div class="col-auto">
                <input type="text" id="guestCodeRemember" name="code" class="form-control" placeholder="Your code here...">
            </div>
            <div class="col-auto">
                <button id="submitRemember" type="submit" class="btn btn-primary">Remember Gifts</button>
            </div>
        </div>
    </div>
</div>