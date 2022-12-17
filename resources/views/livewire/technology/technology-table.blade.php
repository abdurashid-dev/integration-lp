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
                    <th>Link</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody wire:sortable="updateOrder">
                @forelse($technologies as $technology)
                    <tr wire:sortable.item="{{ $technology->id }}" wire:key="technology-{{ $technology->id }}">
                        <td wire:sortable.handle style="cursor: move;" class="align-middle"><i class="fa fa-arrows-alt"></i></td>
                        <td>{{$technology->id}}</td>
                        <td>{{$technology->name}}</td>
                        <td><a href="{{$technology->link}}">{{ $technology->link}}</a></td>
                        <td><img src="{{asset($technology->image)}}" alt="logo" class="img-responsive img-thumbnail"
                                 style="width: 100px; height: 100px"></td>
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
                {{$technologies->links()}}
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    @endpush
</div>
