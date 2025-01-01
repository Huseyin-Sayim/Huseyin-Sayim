@extends("admin.layout.app")

@section("content")
    <!-- Main content -->


        <!-- Media library -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6 class="mb-0">Galeri</h6>
                <a href="{{ route("gallery.create") }}" class="btn btn-primary float-end">Yeni Fotoğraf Ekle</a>
            </div>

            <table class="table media-library">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fotoğraf</th>
                                <th>Başlık</th>
                                <th>Açıklama</th>
                                <th>Tür</th>
                                <th>Durum</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($gallery as $image)
                            <tr>
                                <td>
                                    {{ $image->id }}
                                </td>
                                <td>
                                    <a href="{{asset($image->media_url)}}" data-bs-popup="lightbox">
                                        <img src="{{asset($image->media_url)}}" alt="" class="img-preview rounded">
                                    </a>
                                </td>
                                <td>{{ $image->media_title }}</td>
                                <td>{{ substr($image->media_description, 0, 50) }}</td>
                                <td>{{ $image->media_type }}</td>
                                <td>
                                    @if($image->media_status == 1)
                                        {{ 'Aktif' }}
                                    @else
                                        {{ 'Pasif' }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-flex">
                                        <div class="dropdown">
                                            <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                <i class="ph-list"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{ route("gallery.edit", [$image->id]) }}" class="dropdown-item">
                                                    <i class="ph-pencil me-2"></i>
                                                    Düzenle
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{ route("gallery.delete", [$image->id]) }}" class="dropdown-item delete">
                                                    <i class="ph-trash me-2"></i>
                                                    Sil
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table
        </div>

            <!-- /media library -->

            <!-- Modal -->
            <div class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Bu ögeyi silmek istediğinize emin misiniz ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Hayır</button>
                            <button type="button" class="btn btn-primary" id="confirm">Evet</button>
                            <!-- <a href="" class="btn btn-danger" id="confirm"></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modal -->

            <!-- <========== This section will be edit again later =============> -->

        @if(\Illuminate\Support\Facades\Session::has("added_gallery"))
            @if(\Illuminate\Support\Facades\Session::get("added_gallery") == "success")
                <script>
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Başarıyla eklendi",
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
                @php
                  \Illuminate\Support\Facades\Session::remove("added_gallery");
                @endphp
            @else
                <script>
                    Swal.fire({
                        position: "top-end",
                        icon: "Error",
                        title: "Ekleme Başarısız",
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
                @php
                    \Illuminate\Support\Facades\Session::remove("added_gallery");
                @endphp
            @endif
        @endif

        @if(\Illuminate\Support\Facades\Session::has("update_gallery"))
            @if(\Illuminate\Support\Facades\Session::get("update_gallery") == "success")
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
                  \Illuminate\Support\Facades\Session::remove("update_gallery");
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
                    \Illuminate\Support\Facades\Session::remove("update_gallery");
                @endphp
            @endif
        @endif

        @if(\Illuminate\Support\Facades\Session::has("delete_gallery"))
            @if(\Illuminate\Support\Facades\Session::get("delete_gallery") == 'success')
                <script>
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Başarıyla Silindi",
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
                @php
                    \Illuminate\Support\Facades\Session::remove("delete_gallery");
                @endphp
            @else
                <script>
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "Beklenmedik bir hata oluştu",
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
                @php
                    \Illuminate\Support\Facades\Session::remove("delete_gallery");
                @endphp
            @endif
        @endif

        <!-- <=======================================================> -->

    <script>
        $('.delete').click((e) => {
            e.preventDefault();
            $('.modal').show();
            let element = e.target.getAttribute('href');
            $('#confirm').click(() => {
                window.location.href = element;
            });
            $('#close').click(() => {
                $('.modal').hide();
            })
        });
    </script>

    </div>
    <!-- /main content -->
@endsection
