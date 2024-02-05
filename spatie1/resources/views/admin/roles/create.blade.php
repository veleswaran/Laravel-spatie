<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Role') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-message/>
                <form action="{{url('role')}}" class="form p-5" method="post">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                    </div>
                    @if($permissionGroups->count())
                    <div class="row">
                        @foreach($permissionGroups as $pg)
                            <div class="col-md-4">
                                <div class="form-check">    
                                    <h4>{{$pg->name}} </h4>
                                    @if($pg->permission->count())
                                        @foreach($pg->permission as $permission)
                                            <input class="form-check-input" type="checkbox" id="check1" name="permission_ids[]" value="{{$permission->id}}" >
                                            <label class="form-check-label">{{$permission->name}}</label><br>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary mt-3">create Role</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
