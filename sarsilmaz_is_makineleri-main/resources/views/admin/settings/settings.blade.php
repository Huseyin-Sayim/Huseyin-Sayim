@extends("admin.layout.app")

@section("content")
    <table class="table border">
        <thead>
            <tr>
                <th class="col-md-1" scope="col">#</th>
                <th class="col-md-3" scope="col">Name</th>
                <th class="col-md-3" scope="col">Key</th>
                <th class="col-md-3" scope="col">Value</th>
                <th class="col-md-1" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->key }}</td>
                    <td>{{ substr($item->value, 0, 60 )}}</td>
                    <td>
                        <a href="{{ route("settings.edit", [$item->id]) }}" class="btn btn-secondary">
                            <i class="ph ph-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(\Illuminate\Support\Facades\Session::has("update_settings"))
        @if(\Illuminate\Support\Facades\Session::get("update_settings") == "success")
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Başarıyla Güncellendi",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            @php
                \Illuminate\Support\Facades\Session::remove("update_settings");
            @endphp
        @else
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "Güncelleme Hatası",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            @php
                \Illuminate\Support\Facades\Session::remove("update_settings");
            @endphp
        @endif
    @endif

@endsection
