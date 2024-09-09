<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Họ và Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th class="text-center">Tình trạng</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($users) && is_object($users))
            @foreach ($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" value="" class="input-checkbox checkboxItem">
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->phone }}
                    </td>
                    <td>
                        {{ $user->address }}
                    </td>
                    <td class="text-center">
                        <input type="checkbox" class="js-switch" checked />
                    </td>
                    <td class="text-center">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#userModal{{ $user->id }}"><i class="fa fa-trash"></i></button>
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="userModal{{ $user->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Cảnh báo</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Bạn có chắc chắn xóa dữ liệu của thành viên
                                    <h5 style="font-size:17px;color:red;font-weight:600" class="text-red inline">
                                        {{ $user->name }}
                                    </h5>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                    <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-primary">Xóa dữ
                                        liệu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
        @endif

    </tbody>
</table>
{{ $users->links() }}
