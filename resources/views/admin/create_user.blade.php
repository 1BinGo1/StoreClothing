<div class="modal fade" id="modal-create-user" tabindex="-1" role="dialog" aria-labelledby="modal-create-user" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создание нового пользователя</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.create-user')}}" method="post" id="form-create-user">
                    {{csrf_field()}}
                    <div class="form-group">
                        @php
                            $roles = \App\Models\Role::all();
                        @endphp
                        <label class="mr-sm-2" for="user-role">Role</label>
                        <select class="form-control form-control-lg" name="role" id="user-role">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @if(!empty(old('role'))) @if(old('role') == $role->id) selected @endif @endif>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user-name">Name</label>
                        <input type="text" name="name" class="form-control" id="user-name" placeholder="Name" value="{{old('name') ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="user-email">Email</label>
                        <input type="text" name="email" class="form-control" id="user-email" placeholder="Email" value="{{old('email') ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="user-password">Password</label>
                        <input type="password" name="password" class="form-control" id="user-password" placeholder="Password" value="{{old('password') ?? ''}}">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="create-user">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
