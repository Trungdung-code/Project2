@extends('layout.layout')

@section('main')

    <style>
        table,
        th,
        td {
            padding: 15px;
        }

    </style>

    <body>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <h1>Thông tin cá nhân</h1>
                </div>
            </div>
            <footer class="footer">

            </footer>

            <table>
                <tr>
                    <th>ID</th>
                    <td>{{ Session::get('id') }}</td>
                </tr>
                <tr>
                    <th>Họ và tên</th>
                    <td>{{ Session::get('name') }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ Session::get('email') }}</td>
                </tr>
                <tr>
                    <th>Giới tính </th>
                    <td>
                        @if (Session::get('gender') == 0)
                            Nam
                        @else
                            Nu
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Ngày sinh </th>
                    <td>{{ Session::get('dob') }}</td>
                </tr>
                <tr>
                    <th></th>
                    <td><a href="{{ route('student.edit', Session::get('id')) }}">Sửa thông tin</a></td>
                    <td><a href="{{ url('/pass-change', Session::get('id')) }}">Đổi mật khẩu</a></td>
                </tr>
            </table>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </body>
@endsection
