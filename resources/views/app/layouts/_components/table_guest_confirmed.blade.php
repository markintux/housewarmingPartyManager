<div class="row" style="margin-top:80px;">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('app.home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Confirmed Guests</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row mt-3 mb-5">
    <div class="col">
        @if($guests->isEmpty())
            <div class="alert alert-warning mt-3" role="alert">
                No guests have confirmed gifts.
            </div>
        @else
            <div class="table-responsive">
                <h1 class="mb-5">Confirmed Guests</h1>
                <table id="guestsTable" class="table table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Number of Guests</th>
                            <th>Selected Gifts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guests as $guest)
                            <tr>
                                <td>{{ $guest->name }}</td>
                                <td>{{ $guest->number_of_guests }}</td>
                                <td>
                                    <ul>
                                        @foreach($guest->gifts as $gift)
                                            <li>{{ $gift->gift }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="alert alert-info mt-3" role="alert">
                Total Confirmed Guests: <strong>{{ $totalConfirmedGuests }}</strong><br>
                Total Confirmed Gifts: <strong>{{ $totalGifts }}</strong>
            </div>
        @endif
    </div>
</div>