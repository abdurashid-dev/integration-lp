<div>
    <div class="card">
        <div class="card-header">
            <x-search/>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Link</th>
                    <td>Image</td>
                    <th>Actions</th>
                </tr>
                @forelse($platforms as $platform)
                    <tr>
                        <td>{{$platform->id}}</td>
                        <td>{{$platform->name}}</td>
                        <td><img src="{{asset($platform->image)}}" alt="logo" class="img-responsive img-thumbnail"
                                 style="width: 100px; height: 100px"></td>
                        <td><a href="{{$platform->link}}">{{ $platform->link}}</a></td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('admin.platforms.edit', $platform->id)}}" class="btn btn-success"><i
                                        class="fas fa-pencil-alt"></i> Edit</a>
                                <form action="{{route('admin.platforms.destroy', $platform->id)}}" method="POST"
                                      class="mx-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i
                                            class="fas fa-trash"></i> Delete!
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No data found :(</td>
                    </tr>
                @endforelse
            </table>
            <div class="float-right py-3">
                {{$platforms->links()}}
            </div>
        </div>
    </div>
</div>
