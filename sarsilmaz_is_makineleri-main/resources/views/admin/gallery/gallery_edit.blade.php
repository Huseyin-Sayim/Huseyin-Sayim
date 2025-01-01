@extends("admin.layout.app")

@section("content")
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <div class="mb-4 w-75 m-auto">

                <div class="my-3 d-flex">
                    <img class="w-25 mx-auto" src="{{ asset($image->media_url) }}" alt="">
                </div>

                <form action="{{ route("gallery.update", [$image->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="fw-bold pb-2 mb-3"></div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Fotoğraf Başlığı</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                                <span class="input-group-text text-primary">
                                                    <i class="ph ph-text-h-one"></i>
                                                </span>
                                <input type="text" name="media_title" class="form-control" placeholder="Başlık Giriniz" value="{{ $image->media_title }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Fotoğraf Açıklaması</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                                <span class="input-group-text  bg-input">
                                                    <i class="ph ph-text-aa"></i>
                                                </span>
                                <textarea class="form-control" name="media_description" placeholder="Açıklama Giriniz" required>{{ $image->media_description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 rounded d-flex">
                        <label class="col-form-label col-lg-3 ">Fotoğraf Durumu</label>
                        <div>
                            <div class="form-check form-switch mb-2">
                                <input type="radio" class="form-check-input" name="media_status" id="sr_ls_c" @if($image->media_status == 1) {{ 'checked' }} @endif value="1">
                                <label class="form-check-label" for="sr_ls_c">Aktif</label>
                            </div>

                            <div class="form-check form-switch mb-3">
                                <input type="radio" class="form-check-input" name="media_status" id="sr_ls_u" @if($image->media_status == 0) {{ 'checked' }} @endif value="0">
                                <label class="form-check-label" for="sr_ls_u">Pasif</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg float-end">Güncelle</button>
                </form>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mt-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection
