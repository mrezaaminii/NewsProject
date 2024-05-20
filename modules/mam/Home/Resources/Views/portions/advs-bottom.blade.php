@if(!is_null($advs_bottom))
    <div class="sidebar-widget widget-ads mb-30 text-center">
        <a href="{{ $advs_bottom->link }}">
            <img class="border-radius-10" src="{{ asset('storage' . DIRECTORY_SEPARATOR.$advs_bottom->imagePath) }}" alt="{{ $advs_bottom->title }}" style="width: 400px; height: 200px">
        </a>
    </div>
@endif
