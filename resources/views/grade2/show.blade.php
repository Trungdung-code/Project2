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
                                    <div @if ($grade->Skill2 < 5) style="color:red;" @endif>
                                        {{ $grade->Skill2 }}
                                    </div>
                                </td>
                                <td>
                                    <div @if ($grade->Final2 < 5) style="color:red;" @endif>
                                        {{ $grade->Final2 }}
                                    </div>
                                </td>
                                @if ($grade->Skill2 != NULL && $grade->Final2 != NULL)
                                <td>
                                    @if( $grade->Skill2 < 5 || $grade->Final2 < 5)
                                        Học lại
                                    @else
                                        Qua môn
                                    @endif
                                </td>
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
