@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Sinh viên
                </h1>

                <a href="{{ route('student.create') }}"><button class="btn btn-default">Thêm sinh
                        viên</button></a> &nbsp &nbsp &nbsp &nbsp &nbsp
                <a href="{{ route('student.insert-by-excel') }}"><button class="btn btn-default">Thêm sinh
                        viên = excel</button></a> &nbsp &nbsp &nbsp &nbsp &nbsp
                        <a href="{{ url('/student-sample') }}"><button class="btn btn-default">Tải xuống mẫu excel</button></a>

                {{-- <form>
                    <select name="id-class" class="selectpicker">
                        <option>------</option>
                        @foreach ($listClass as $class)
                            <option value="{{ $class->idClass }}" @if ($class->idClass == $idClass) selected @endif>{{ $class->nameClass }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Email </th>
                            <th>Mật khẩu </th>
                            <th>Giới tính </th>
                            <th>Ngày sinh </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listStudent as $student)
                            <tr>
                                <td>{{ $student->idStudent }}</td>
                                <td>{{ $student->name }}</td>
                                <td>
                                    {{ $student->email }}
                                </td>
                                <td>
                                    {{ $student->password }}
                                </td>
                                <td>
                                    @if ($student->gender == 0)
                                        Nam
                                    @else
                                        Nu
                                    @endif
                                </td>
                                <td>
                                    {{ $student->dob }}
                                </td>
                                <td><a href="{{ route('student.edit', $student->idStudent) }}" title="Sửa"
                                    class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i></a></td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $listStudent->links('pagination::bootstrap-4') }} --}}
            </div>
        </div>
    </div>
@endsection
