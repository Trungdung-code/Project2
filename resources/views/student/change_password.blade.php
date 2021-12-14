@extends('layout.layout');

@section('main')
    <style>
        table,
        th,
        td {
            padding: 5px;
        }

    </style>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Đổi mật khẩu
                </h1>
                <form action="{{ url('/pass-confirm', $id) }}" method="POST">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                <input type="password" name="current_password2" id="current_password2" value="{{ $student->password }}" hidden/>
                            </td>
                        </tr>
                        <tr>
                            <td>Mật khẩu hiện tại</td>
                            <td>
                                <input type="password" name="current_password" id="current_password" required />
                            </td>
                            <td>
                                <span id="error-nhap-pass" id="error"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Mật khẩu mới</td>
                            <td>
                                <input type="password" name="new_password" id="nhap-pass1" required />
                            </td>
                            <td>
                                <span id="error-nhap-pass1" id="error"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Nhập lại mật khẩu mới</td>
                            <td>
                                <input type="password" name="new_confirm_password" id="nhap-pass2" required />
                            </td>
                            <td>
                                <span id="error-nhap-pass2" id="error"></span>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <button class="btn btn-default" onclick="return user()">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $(".form-group a").click(function() {
                let $this = $(this);

                if ($this.hasClass('active')) {
                    $this.parents(".form-group").find('input').attr('type', 'password')
                    $this.removeClass('active');
                } else {
                    $this.parents(".form-group").find('input').attr('type', 'text')
                    $this.addClass('active')
                }
            });
        });

        function user() {
            var current_password = document.getElementById("current_password");
            var current_password2 = document.getElementById("current_password2").value;
            var vnhappass1 = document.getElementById("nhap-pass1");
            var vnhappass2 = document.getElementById("nhap-pass2");
            ///////////
            var errnhappass = document.getElementById("error-nhap-pass");
            var errnhappass1 = document.getElementById("error-nhap-pass1");
            var errnhappass2 = document.getElementById("error-nhap-pass2");
            ////////////////////////////////
            var dem = 0;
            ////////////////////////////////
            if(current_password.value != current_password2){
                current_password.innerHTML = '';
                errnhappass.innerHTML = " Mật khẩu hiện tại không chính xác. Xin vui lòng nhập lại ";
            } else{
                errnhappass1.innerHTML = '';
                dem++;
            }


            if (vnhappass1 == "") {
                errnhappass1.innerHTML = " * ";
            } else if (vnhappass1.value != vnhappass2.value) {
                errnhappass2.innerHTML = 'Mật khẩu không trùng khớp. Xin vui lòng nhập lại';
            } else {
                errnhappass1.innerHTML = "";
                dem++;
            }

            if (dem == 2) {
                return true;
            } else {

            }
            return false;
        }
    </script>
@endsection
