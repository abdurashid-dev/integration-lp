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
                        <td><a href="{{$technology->link}}">{{$technology->link}}</a></td>
                        <td>Actions</td>
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
