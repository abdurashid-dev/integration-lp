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
                    <th>Actions</th>
                </tr>
                @forelse($technologies as $technology)
                    <tr>
                        <td>{{$technology->id}}</td>
                        <td>{{$technology->name}}</td>
                        <td><a href="{{$technology->link}}">{{ $technology->link}}</a></td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('admin.technologies.edit', $technology->id)}}" class="btn btn-success"><i
                                        class="fas fa-pencil-alt"></i> Edit</a>
                                <form action="{{route('admin.technologies.destroy', $technology->id)}}" method="POST"
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
                {{$technologies->links()}}
            </div>
        </div>
    </div>
</div>
