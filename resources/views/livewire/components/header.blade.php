<div>
    <div class="header">
        <div class="header-title">
            <div class="header__input-menu">
                <a href="" class="header__input-close"></a>
                <a id="resize" class="header__input-full-screen"></a>
                <a id="min" class="header__input-minimize"></a>
            </div>
        </div>
        <div class="header-menu">
            <a class="menu-link is-active" href="#">
                @if (Request::is('/'))
                    {{ __('general.header-menu.apps') }}
                @elseif (Request::is('register'))
                    {{ __('general.header-menu.register') }}
                @endif
            </a>
            <a class="menu-link notify" href="#">{{__('general.header-menu.work')}}</a>
            <a class="menu-link" href="#">{{__('general.header-menu.studys')}}</a>
            @if (Request::is('/'))
            <a class="menu-link notify" href="#">{{__('general.header-menu.contact')}}</a>
            @endif
        </div>
        <div class="search-bar">
            <input type="text" placeholder="{{ __('general.search-bar') }}">
        </div>
        <div class="header-profile">
            <div class="notification">
                <span class="notification-number">3</span>
                <i class="fa-sharp fa-solid fa-bell"></i>
            </div>
            <i class="fa-solid fa-clouds"></i>
            <img id="profileToggle" class="profile-img"
                src="https://images.unsplash.com/photo-1600353068440-6361ef3a86e8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                alt="">
                <div id="menuProfile" class="menu">
                    <h3>FULANO<br /><span>Programador</span></h3>
                    <ul>
                      <li>
                        <i class="fa-solid fa-user-vneck"></i><a href="#">{{__('auth.profile-show')}}</a>
                      </li>
                      <li>
                        <i class="fa-sharp fa-solid fa-user-pen"></i><a href="#">{{__('auth.profile-edit')}}</a>
                      </li>
                      <li>
                        <i class="fa-solid fa-calendar-lines-pen"></i><a target="_blank" href="{{route('profile.create')}}">{{__('auth.profile-create')}}</a>
                      </li>
                    </ul>
                  </div>
        </div>
    </div>
</div>
