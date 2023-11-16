@extends('layouts.admin')
@section('title', $title ?? 'Danh sách danh mục')
@section('content')
    <form acction="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DANH SÁCH DANH MỤC</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-6">
                                <button class="submit btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('category.trash') }}" class="btn btn-sm btn-danger"><i
                                        class="fas fa-trash"></i>Thùng Rác</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container col-5">
                        <div>
                            <div class="mb-3">
                                <label for="name">Tên danh mục</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control">
                                @if ($errors->has('name'))
                                    <div class="text-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="metakey">Từ khoá</label>
                                <textarea type="text" name="metakey" id="metakey" class="form-control" value="{{ old('metakey') }}"
                                    class="form-control"></textarea>
                                @if ($errors->has('metakey'))
                                    <div class="text-danger">
                                        {{ $errors->first('metakey') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="metadesc">Mô tả</label>
                                <textarea type="text" name="metadesc" id="metadesc" value="{{ old('metadesc') }}" class="form-control"></textarea>
                                @if ($errors->has('metadesc'))
                                    <div class="text-danger">
                                        {{ $errors->first('metadesc') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="parent_id">Chuyên mục cha</label>
                                <select name="parent_id" id="name" class="form-control">
                                    <option value="0">Cấp cha</option>
                                    {!! $html_parent_id !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Sắp sếp</label>
                                <select name="sort_order" id="name" class="form-control">
                                    <option value="0">Cấp cha</option>
                                    {!! $html_sort_order !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image">Hình đại diện</label>
                                <input name="image" id="name" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-sm btn-success"><i
                                        class="fas fa-save"></i>Lưu</button>
                                <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary"><i
                                        class=""></i>Quay về danh sách</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-7">
                        <div class="card-body">
                            @includeIf('backend.message')
                            <table class="table table-bordered table-striped " id="dataTable">
                                <thead>
                                    <tr class=" bg-primary">
                                        <th class="text-center" style="width:20px;"><input type="checkbox"
                                                name="checkId[]  "></th>
                                        <th class="text-center" style="width:100px;">HÌNH ẢNH</th>
                                        <th class="text-center" style="width:260px;">TÊN DANH MỤC</th>
                                        <th class="text-center" style="width:160px;">SLUG</th>
                                        <th class="text-center" style="width:260px;">NGÀY TẠO</th>
                                        <th class="text-center" style="width:200px;">CHỨC NĂNG</th>
                                        <th class="text-center" style="width:20px;">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $row)
                                        <tr>
                                            <td><input type="checkbox" name="checkId[]" value="{{ $row->id }}"></td>
                                            <td><img src="{{ asset('images/category/' . $row->image) }}"
                                                    class="img-fluid" alt="{{ $row->image }}"></td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->slug }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>
                                                @if ($row->status == 2)
                                                    <a href="{{ route('category.status', ['category' => $row->id]) }}"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fas fa-toggle-on"></i></a>
                                                @else
                                                    <a href="{{ route('category.status', ['category' => $row->id]) }}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fas fa-toggle-off"></i></a>
                                                @endif

                                                <a href="{{ route('category.edit', ['category' => $row->id]) }}"
                                                    class="btn btn-sm btn-info"> <i class="fas fa-wrench"></i></a>
                                                <a href="{{ route('category.show', ['category' => $row->id]) }}"
                                                    class="btn btn-sm btn-primary "><i class="far fa-eye"></i></a>

                                                <a href="{{ route('category.delete', ['category' => $row->id]) }}"
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

                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
               
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
        </div>
    </form>
@endsection