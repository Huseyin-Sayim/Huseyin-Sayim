@extends("admin.layout.app")

@section("content")
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <div class="mb-4 w-75 m-auto">
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    <div class="fw-bold pb-2 mb-3"></div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Kullanıcı Adı</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                        <span class="input-group-text text-primary">
                            <i class="ph ph-text-h-one"></i>
                        </span>
                                <input type="text" name="username" class="form-control" value="{{ auth()->user()->name }}" placeholder="Kullanıcı adı" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">E-Mail</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                        <span class="input-group-text text-primary">
                            <i class="ph ph-at"></i>
                        </span>
                                <input type="email" name="email" value="{{ auth()->user()->email  }}" class="form-control" placeholder="Email Giriniz" >
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Kullanımdaki Şifre</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                        <span class="input-group-text text-primary">
                            <i class="ph ph-key"></i>
                        </span>
                                <input type="password" name="old_password" class="form-control" value="" placeholder="Kullanımdaki şifrenizi giriniz" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Yeni Şifre</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                        <span class="input-group-text text-primary">
                            <i class="ph ph-key"></i>
                        </span>
                                <input type="password" name="new_pass" class="form-control" value="" placeholder="Yeni şifrenizi giriniz" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Yeni Şifre Tekrar</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                        <span class="input-group-text text-primary">
                            <i class="ph ph-key"></i>
                        </span>
                                <input type="password" name="new_pass_repeat" class="form-control" value="" placeholder="Yeni şifrenizi tekrar giriniz" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg float-end">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
@endsection
