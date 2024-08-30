<div class="row" style="margin-top:80px;">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('app.home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">View Images</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row mt-3 mb-5">
    <div class="col">
        <div class="table-responsive">
            <h1 class="mb-5">View Images</h1>
            <table id="imagesTable" class="table table-sm">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td class="text-center">
                                @if($image->image)
                                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/' . $image->image) }}" alt="image" style="width: 200px; height: auto;">
                                @else
                                    <i class="fas fa-image" style="font-size: 200px;"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('images.edit', $image->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('images.destroy', $image->id) }}" method="POST" class="delete-form" style="display:inline-block;">
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