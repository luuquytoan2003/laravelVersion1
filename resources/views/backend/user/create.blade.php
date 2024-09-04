@include('backend.dashboard.component.breadcrumb', [
    'title' => $config['seo']['title'],
])

<form action="" method="POST">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title mb-15">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin người sử dụng</p>
                        <p>Lưu ý: Những trường có <span class="text-danger">(*)</span> là trường bắt buộc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb-15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label ">Email </label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" class="form-control" name="email" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label ">Họ tên </label>
                                    <span class="text-danger">(*)</span>

                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label ">Nhóm thành viên</label>
                                    <span class="text-danger">(*)</span>
                                    <select name="user_catalogue_id" class="form-control ">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row" id="data_2">
                                    <label class="control-label">Ngày sinh</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" value="" name="birthday">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label ">Mật khẩu</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label ">Nhập lại mật khẩu</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="password" class="form-control" name="re_password" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-15">
                            <div class="col-lg-12">
                                <label for="" class="control-label">Ảnh đại diện</label>
                                <input type="text" name="image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title mb-15">Thông tin liên hệ</div>
                    <div class="panel-description">
                        <p>Nhập thông tin liên hệ người sử dụng</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb-15">
                            <div class="col-lg-4">
                                <div class="form-row">
                                    <label for="" class="control-label ">Chọn thành phố </label>
                                    <select name="province_id" class="form-control setupSelect2 province location"
                                        data-target="district">
                                        <option value="0">[Chọn Tỉnh/thành phố]</option>
                                        @if (isset($provinces))
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->code }}">{{ $province->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-row">
                                    <label for="" class="control-label">Quận/huyện </label>
                                    <select name="district_id" class="form-control setupSelect2 district location"
                                        data-target="ward">
                                        <option value="0">[Chọn Quận/huyện]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-row">
                                    <label for="" class="control-label ">Xã/phường</label>
                                    <select name="ward_id" class="form-control setupSelect2 ward">
                                        <option value="0">[Chọn Xã/phường]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label ">Địa chỉ</label>

                                    <input type="text" class="form-control" name="address" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label ">Số điện thoại</label>

                                    <input type="text" class="form-control" name="phone" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-15">

                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label ">Ghi chú</label>
                                    <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb-15">
            <a class="btn" style="border: 1px solid #ccc;color:#1c1c1c">Quay lại</a>
            <button type="submit" class="btn btn-danger" style="width:80px">Lưu</button>
        </div>
    </div>
</form>
