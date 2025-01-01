@extends("layouts.front")

@section("content")
    <div class="breatcam-section style-two d-flex align-items-center">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12">
                    <div class="breatcam-content">
                        <h1> Galeri </h1>
                        <ul>
                            <li><a class="background" href="index.html"> <i class="fas fa-home"></i> Anasayfa </a></li>
                            <li><a href="service.html"> Galeri </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery mt-5">
        <div class="container">
            <div class="gallery_content" style="display: grid; grid-template-columns: 1fr 1fr 1fr">
                @foreach($gallery as $index => $item)
                    <div class="item p-2">
                        <img id="{{ $index + 1 }}" style="cursor: pointer; width: 100%; max-height: 400px; object-fit: cover" class="gallery_image img-fluid" src="{{ asset($item->media_url) }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen" style="background-color: rgba(0, 0, 0, 0.5)">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close me-3 fs-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body overflow-hidden position-relative">
                    <img style="width: 100%; height: 100%; object-fit: contain" class="modal_image" src="" alt="">
                    <div class="gallery_next bg-primary p-2 rounded text-light" style="position: absolute; top: 50%; right: 20px">
                        <i class="fa-solid fa-arrow-right fs-3"></i>
                    </div>
                    <div class="gallery_prev bg-primary p-2 rounded text-light" style="position: absolute; top: 50%; left: 20px;">
                        <i class="fa-solid fa-arrow-left fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.gallery_image').click((e) => {
            $('.modal').show();
            let image = e.target.getAttribute('src');
            $('.modal_image').attr('src', image);
            $('.btn-close').click(() => {
                $('.modal').hide();
            });
            let count = $('.gallery_image').length;
            let id = Number(e.target.getAttribute('id'));
            console.log(count, id)
            $('.gallery_next').click(() => {
                if (id < count) {
                    id += 1
                } else {
                    id = 1;
                }
                let imag = $('#' + id).attr('src');
                $('.modal_image').attr('src', imag);
                console.log(id, imag)
            });
            $('.gallery_prev').click(() => {
                if (id > 1) {
                    id -= 1
                } else {
                    id = count;
                }
                if (id >= 1) {
                    let imag = $('#' + id).attr('src');
                    $('.modal_image').attr('src', imag);
                    console.log(id, imag)
                }
            });
        });
    </script>
@endsection
