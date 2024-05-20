@if(!is_null($advs_top))
    <div class="row">
        <div class="col-12 text-center mb-50">
            <a href="{{ $advs_top->link }}">
                <img class="border-radius-10 d-inline" style="width: 500px; height: 100px" src="{{ asset('storage' . DIRECTORY_SEPARATOR.$advs_top->imagePath) }}" alt="{{ $advs_top->title }}">
            </a>
        </div>
    </div>
@endif
