<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Users List') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-3">
                <a href="{{ url('dashboard')}}" class="btn btn-primary">back</a>
                <a href="{{ url('role/create') }}" class="btn btn-primary">create user</a>
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{$role['id']}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{implode(",",$role->permissions->pluck('name')->toArray())}}</td>
                            <td>
                                <form action="role/{{$role['id']}}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button class="btn btn-primary">Delete</button>
                                </form>
                                <a href="role/{{$role['id']}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
