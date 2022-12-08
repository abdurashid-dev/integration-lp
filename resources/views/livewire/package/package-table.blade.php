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
                    <th>Actions</th>
                </tr>
                @forelse($packagies as $package)
                    <tr>
                        <td>{{$package->id}}</td>
                        <td>{{$package->name}}</td>
                        <td>{{$package->price}}</td>
                        <td>Actions</td>
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
