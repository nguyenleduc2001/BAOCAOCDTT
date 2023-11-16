@extends('layouts.admin')

@section('title', 'Sản phẩm')
@section('content')
    <form acction="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>TẤT CẢ MENU</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Title</h3>
                        <div class="row">
                            <div class="col-12 text-right">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">TÊN MENU</label>
                            <input name="name" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">LINK</label>
                            <textarea name="link" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea2" class="form-label">TABLE_ID</label>
                            <select name="table_id" class="form-control" id="select1" aria-label="Default select example">
                                <option selected value="0">Không Có</option>
                                @foreach ($idmenu as $item2)
                                    <option value="{{ $item2->id }}">
                                        {{ $item2->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea2" class="form-label">TYPE</label>
                            <select name="type" class="form-control" id="select1" aria-label="Default select example">
                                <div>
                                    <option selected value="0"></option>
                                    <option value="Mainmenu">Mainmenu</option>
                                    <option value="MenuSub">MenuSub</option>
                                </div>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea2" class="form-label">TRẠNG THÁI</label>
                            <select name="status" class="form-select" id="select1" aria-label="Default select example">
                                <div>
                                    <option selected> </option>
                                    <option value="1">Hiển Thị</option>
                                    <option value="2">Ẩn Danh</option>
                                </div>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-sm btn-success"><i
                                        class="fas fa-save"></i>Lưu</button>

                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        @includeIf('backend.message')
                        <div class="card-body">
                            <table class="table table-bordered table-striped " id="dataTable">
                                <thead>
                                    <tr class="bg-primary">
                                        <th class="text-center" style="width:20px;">#</th>

                                        <th class="text-center"style="width:200px;">TÊN MENU</th>
                                        <th class="text-center">LIÊN KẾT BẢNG</th>

                                        <th class="text-center" style="width:160px;">NGÀY TẠO</th>
                                        <th class="text-center" style="width:200px;">CHỨC NĂNG</th>
                                        <th class="text-center" style="width:20px;">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($idmenu as $row)
                                        <tr>
                                            <td><input type="checkbox" name="checkId[]" value="{{ $row->id }}"></td>

                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->table_id }}</td>

                                            <td>{{ $row->created_at }}</td>
                                            <td>
                                                @if ($row->status == 2)
                                                    <a href="{{ route('menu.status', ['menu' => $row->id]) }}"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fas fa-toggle-on"></i></a>
                                                @else
                                                    <a href="{{ route('menu.status', ['menu' => $row->id]) }}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fas fa-toggle-off"></i></a>
                                                @endif

                                                <a href="{{ route('menu.edit', ['menu' => $row->id]) }}"
                                                    class="btn btn-sm btn-info"> <i class="fas fa-wrench"></i></a>
                                                <a href="{{ route('menu.show', ['menu' => $row->id]) }}"
                                                    class="btn btn-sm btn-primary "><i class="far fa-eye"></i></a>

                                                <a href="{{ route('menu.delete', ['menu' => $row->id]) }}"
                                                    class="btn btn-sm btn-danger "><i class="fas fa-trash"></i></a>
                                            </td>
                                            <td>{{ $row->id }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    Footer
                </div>
        </div>

        </section>
        </div>
    </form>
@endsection
