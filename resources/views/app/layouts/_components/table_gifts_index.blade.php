<div class="row" style="margin-top:80px;">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('app.home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">View Gifts</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row mt-3 mb-5">
    <div class="col">
        <div class="table-responsive">
            <h1 class="mb-5">View Gifts</h1>
            <table id="giftsTable" class="table table-sm">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Gift</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gifts as $gift)
                        <tr>
                            <td class="text-center">
                                @if($gift->gift_image)
                                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/' . $gift->gift_image) }}" alt="{{ $gift->gift }}" style="width: 100px; height: auto;">
                                @else
                                    <i class="fas fa-image" style="font-size: 100px;"></i>
                                @endif
                            </td>
                            <td>{{ $gift->gift }}</td>
                            <td>
                                <a href="{{ route('gifts.edit', $gift->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('gifts.destroy', $gift->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>