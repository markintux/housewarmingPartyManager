<div class="container" style="margin-top: 100px">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card text-bg-success">
                <div class="card-body">
                    <center>
                        <h1>{{number_format($percentGiftsSelected, 2)}}% <i class="fas fa-gift"></i></h1>
                        <p>Total Confirmed Gifts</p>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card text-bg-light">
                <div class="card-body">
                    <center>
                        <h1>{{$totalGifts}} <i class="fas fa-gift"></i></h1>
                        <p>Total Registered Gifts</p>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-bg-light">
                <div class="card-body">
                    <center>
                        <h1>{{$totalConfirmedGifts}} <i class="fas fa-gift"></i></h1>
                        <p>Total Confirmed Gifts</p>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card text-bg-success">
                <div class="card-body">
                    <center>
                        <h1>{{number_format($percentGuestsConfirmed, 2)}}% <i class="fa-solid fa-people-group"></i></h1>
                        <p>Total Confirmed Guests</p>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card text-bg-light">
                <div class="card-body">
                    <center>
                        <h1>{{$totalGuests}} <i class="fa-solid fa-people-group"></i></h1>
                        <p>Total Registered Guests</p>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-bg-light">
                <div class="card-body">
                    <center>
                        <h1>{{$confirmedGuests}} <i class="fa-solid fa-people-group"></i></h1>
                        <p>Total Confirmed Guests</p>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>