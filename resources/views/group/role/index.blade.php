@extends('template')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
        {{ Breadcrumbs::render('group.role.index',$group) }}
            <div class="card-body">
            <h3 class="text-center mb-4">役割</h3>


            <a class="btn btn-success btn-sm btn-round text-white" href="{{route('group.role.create',$group->id)}}"><i class="material-icons">add</i>追加</a>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                        <tr>
                            <th>役割名</th>
                            <th>アクション</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->role_name}}</td>
                                <td>
                                <a class="btn btn-primary btn-sm btn-round m-0 text-white" href="{{route('group.role.edit',[$group->id,$role->index])}}"><i class="material-icons">edit</i> 変更</a>
                                @if($role->index!=0)
                                <a class="btn btn-warning btn-sm btn-round m-0 text-white" href="{{route('group.permission.edit',[$group->id,$role->index])}}"><i class="material-icons">lock_open</i> 権限</a>
                                <a class="btn btn-info btn-sm btn-round m-0 text-white" href="{{route('group.user.index',[$group->id,$role->index])}}"><i class="material-icons">groups</i> ユーザ</a>
                                
                                <button type="button" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-round btn-sm m-0 text-white"><i class="material-icons">remove_circle_outline</i> 削除</button>
                                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                本当に役割を削除しますか？
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">やめる</button>
                                                <form action="{{route('group.role.destroy',[$group->id,$role->index])}}" method="post" name="delete-role">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger text-white">削除する</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection