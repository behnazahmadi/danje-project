@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="card">
            <div class="d-flex justify-content-between" style="width: 95%;margin: 0 auto">
                <h3 style="margin-right: 20px" class="font-weight-bold">ویرایش کاربر</h3>
            </div>
            <div class="card-body">
                <form action="{{route('admin.user.permissions',$user->id)}}" method="post">
                    @csrf
                    <label for="roles">نقش کاربر</label>
                    <div class="form-group">
                        <select name="roles[]" class="form-control" id="roles" multiple>
                            @foreach(\App\Models\Role::all() as $role)
                                <option
                                    value="{{$role->id}}" {{in_array($role->name,$user->roles->pluck('name')->toArray()) ? 'selected' : ''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="permissions">مجوز کاربر</label>
                    <div class="form-group">
                        <select name="permissions[]" class="form-control" id="permissions" multiple>
                            @foreach(\App\Models\Permission::all() as $permission)
                                <option
                                    value="{{$permission->id}}" {{in_array($permission->name,$user->permissions->pluck('name')->toArray()) ? 'selected' : ''}}>{{$permission->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="form-control btn btn-primary mt-2" value="ایجاد دسترسی کاربر">
                </form>
            </div>
        </div>
    </main>
@endsection
