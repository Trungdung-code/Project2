@extends('layout.layout');

@section('main')
    <style>
        table,
        th,
        td {
            padding: 7px;
        }

    </style>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <br><br><br><br>
                <Table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Môn</th>
                            <th>Điểm Skill </th>
                            <th>Điểm Final </th>
                            <th>Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grade as $grade)
                            <tr>
                                <td>{{ $grade->nameSub }}</td>
                                <td>
                                    <div @if ($grade->Skill1 < 5) style="color:red;" @endif>
                                        {{ $grade->Skill1 }}
                                    </div>
                                </td>
                                <td>
                                    <div @if ($grade->Final1 < 5) style="color:red;" @endif>
                                        {{ $grade->Final1 }}
                                    </div>
                                </td>
                                <td>
                                    @if( $grade->Skill1 < 5 || $grade->Final1 < 5)
                                        Thi lại
                                    @else
                                        Qua môn
                                    @endif
                                </td>
                                @if ($grade->Skill2 != NULL && $grade->Final2 != NULL)
                                <td><a href="{{ route('grade2.show', $grade->idStudent) }}">Xem điểm thi lại</a></td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </Table>

            </div>
        </div>
    </div>
@endsection
