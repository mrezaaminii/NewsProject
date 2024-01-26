<div id="sidebar-menu">
    <ul class="metismenu" id="side-menu">
        @foreach(config('panelConfig.menus') as $menu)
        <li>
            <a href="{{$menu['url']}}" class="inactive">
                <i class="mdi mdi-{{$menu['icon']}}"></i>
                <span>{{$menu['title']}}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>
