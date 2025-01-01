@extends("admin.layout.app")

@section("content")
    <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <div class="mb-4 w-75 m-auto">
                    <form action="{{ route("gallery.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="fw-bold pb-2 mb-3"></div>

                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Fotoğraf Başlığı</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                                <span class="input-group-text text-primary">
                                                    <i class="ph ph-text-h-one"></i>
                                                </span>
                                    <input type="text" name="media_title" class="form-control" placeholder="Başlık Giriniz" required>
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
                                    <textarea class="form-control" name="media_description" placeholder="Açıklama Giriniz" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3">Fotoğraf Yükle</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                                <span class="input-group-text bg-input text-primary">
                                                    <i class="ph ph-image"></i>
                                                </span>
                                    <input type="file" name="media" class="form-control" placeholder="Fotoğraf Yükleyin" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg float-end">Ekle</button>
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
