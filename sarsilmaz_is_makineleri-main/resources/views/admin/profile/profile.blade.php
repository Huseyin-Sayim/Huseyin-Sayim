@extends("admin.layout.app")

@section("content")
    <table class="table border table-light">
        <thead>
        <tr>
            <th class="col-1">#</th>
            <th class="col-4">Kullanıcı Adı</th>
            <th class="col-4">Mail</th>
            <th class="col-1"></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ auth()->user()->id }}</th>
                <td>{{ auth()->user()->name }}</td>
                <td>{{ auth()->user()->email }}</td>
                <td>
                    <a href="{{ route('profile.edit') }}" class="btn btn-secondary"><i class="ph ph-pencil-line"></i></a>
                </td>
            </tr>
        </tbody>
    </table>

    @if (\Illuminate\Support\Facades\Session::has('edit_profile'))
        @if (\Illuminate\Support\Facades\Session::get("edit_profile") == "success")
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Başarıyla Güncellendi",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @else
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "Güncelleme Başarısız",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif
        @php
            \Illuminate\Support\Facades\Session::remove('edit_profile')
        @endphp
    @endif

    @if (\Illuminate\Support\Facades\Session::has('confirm_password'))
        <script>
            Swal.fire({
                title: "Şifreler Eşleşmiyor",
                text: "Yeni şifre ve şifre tekrarı farklı",
                icon: "error"
            });
        </script>
        @php
          \Illuminate\Support\Facades\Session::remove('confirm_password')
        @endphp
    @endif
@endsection
