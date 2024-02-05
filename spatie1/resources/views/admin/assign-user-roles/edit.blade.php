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
                <a href="{{ url('assignrole') }}" class="btn btn-primary">back</a>
               
                <form action="{{url('assignrole')}}/{{$selecteduser->id}}" class="form p-5" method="post">
                    @csrf
                    @method('PUT')
                    <select name="user_id" class="form-select mt-3"  disabled>
                        @if($users->count())
                        <option value="" >Select User</option>
                            @foreach($users as $user)
                                <option  
                                @if($selecteduser->id==$user->id) 
                                selected 
                                @endif
                                 value="{{$user->id}}" >{{$user->email}}</option>
                            @endforeach
                        @endif
                    </select>
                    <select name="role_id[]" multiple class="form-select mt-3" >
                        @if($roles->count())
                        <option value="" >Select Role</option>
                            @foreach($roles as $role)
                                <option
                                @if(in_array($role->id, $selecteduser->roles->pluck('id')->toArray())) 
                                selected
                                @endif
                                value="{{$role->name}}" >{{$role->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    <button type="submit" class="btn btn-primary mt-3">create Role</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
