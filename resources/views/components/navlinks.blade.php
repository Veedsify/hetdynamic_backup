<ul class="main-menu__list">
    <li{{ request()->is('home') ? ` class="current"` : '' }}>
        <a href="{{ route('home') }}">Home </a>
        </li>
        <li{{ request()->is('about') ? ` class="current"` : '' }}>
            <a href="{{ route('about') }}">About </a>
            </li>
            <li class="dropdown">
                <a href="#">Services</a>
                <ul class="sub-menu">
                    @foreach ($allServices as $service)
                        <li><a href="{{ route('services.list.service', $service->slug) }}">{{ $service->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li {{ request()->is('blog') ? ` class="current"` : '' }}>
                <a href="{{ route('blog') }}">Blog</a>
            </li>
            <li {{ request()->is('blog') ? ` class="current"` : '' }}>
                <a href="{{ route('contact') }}">Contact</a>
            </li>
</ul>
