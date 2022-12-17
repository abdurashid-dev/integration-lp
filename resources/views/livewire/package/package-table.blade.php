<div>
    <div class="card">
        <div class="card-header">
            <x-search/>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody wire:sortable="updateOrder">
                @forelse($packages as $package)
                    <tr wire:sortable.item="{{ $package->id }}" wire:key="package-{{ $package->id }}">
                        <td class="align-middle" style="cursor: move"><i class="fa fa-arrows-alt"></i></td>
                        <td>{{$package->id}}</td>
                        <td>{{$package->name}}</td>
                        <td>{{$package->price}}</td>
                        <td>{{$package->type}}</td>
                        <td><a href="{{route('admin.packages.show', $package->id)}}" class="btn btn-primary"><i
                                    class="fas fa-eye"></i> Show</a>
                            <a href="{{route('admin.packages.edit', $package->id)}}" class="btn btn-success"><i
                                    class="fas fa-pencil-alt"></i> Edit</a>
                            <form action="{{route('admin.packages.destroy', $package->id)}}" method="POST"
                                  class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No data found :(</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-between py-3">
                <div>
                    <select class="form-control form-select" id="pagination" wire:model="perPage">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                {{$packages->links()}}
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    @endpush
</div>
