@extends('layouts.admin')
@section('title')
    <title>
        Trang Chu
    </title>

@endsection
@section('content')

    <div class="content-wrapper">
        @include('partials.content-header',['name' =>'category', 'key'=>'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('categories.update', ['id' => $category->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Ten Danh Muc</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{ $category->name }}"
                                       placeholder="Nhap Ten Danh Muc">
                            </div>

                            <div class="form-group">
                                <label>Chon Danh Muc Cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="">Chon Danh muc cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


