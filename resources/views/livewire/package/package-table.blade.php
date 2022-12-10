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
                    <th>Price</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
                @forelse($packagies as $package)
                    <tr>
                        <td>{{$package->id}}</td>
                        <td>{{$package->name}}</td>
                        <td>{{$package->price}}</td>
                        <td>{{$package->type}}</td>
                        <td><a href="{{route('admin.packages.show', $package->id)}}" class="btn btn-primary"><i
                                    class="fas fa-eye"></i> Show</a>
                            <a href="{{route('admin.packages.edit', $package->id)}}" class="btn btn-success"><i
                                    class="fas fa-pencil-alt"></i> Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No data found :(</td>
                    </tr>
                @endforelse
            </table>
            <div class="float-right py-3">
                {{$packagies->links()}}
            </div>
        </div>
    </div>
</div>
