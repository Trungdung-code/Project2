@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Thêm sinh viên = excel
                </h1>

                <form action="{{ url('/student-preview') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="excel"
                            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                            class="custom-file-input" id="validatedCustomFile" required>
                    </div>
                    <button type="submit" class="btn btn-">Thêm</button>
                </form>

                @if (session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
