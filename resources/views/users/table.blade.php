<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Followers</th>
    </tr>
    </thead>
    <tbody>
    @forelse($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td><img src="{{$user->image}}" alt="..." class="img-thumbnail"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->followers}}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">Список пуст</td>
        </tr>
    @endforelse
    </tbody>
</table>
{{  $users->links() }}

