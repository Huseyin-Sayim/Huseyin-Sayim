@extends("admin.layout.app")

@section("content")
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <div class="mb-4 w-75 m-auto">
                <form action="{{ route("settings.update", [$settings->id]) }}" method="post">
                    @csrf
                    <div class="fw-bold pb-2 mb-3"></div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Name</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                        <span class="input-group-text text-primary">
                            <i class="ph ph-text-h-one"></i>
                        </span>
                                <input type="text" name="settings_name" class="form-control" value="{{ $settings->name }}" placeholder="Şirket İsmi" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Key</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                        <span class="input-group-text text-primary">
                            <i class="ph ph-lock-key"></i>
                        </span>
                                <input type="text" name="settings_key" disabled class="form-control" value="{{ $settings->key }}" >
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Value</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                        <span class="input-group-text text-primary">
                            <i class="ph ph-key"></i>
                        </span>
                                <input type="text" name="settings_value" class="form-control" value="{{ $settings->value }}" placeholder="Giriniz" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg float-end">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
@endsection
