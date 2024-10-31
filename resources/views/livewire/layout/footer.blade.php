<div>
    <div class="taskBarFooter dark" id="taskBar-Footer">
        <div class="windows-container">
          <a href="{{route('home')}}" target="_blanck"><i class="fa-solid fa-square-list"></i></a>
          <div class="windows-tab">
            <a id="max"><i class="fa-light fa-window-flip win-tab"></i><img src="{{asset('assets/img/wallpaper.jpg')}}" class="win-img"/></a>
            <a><i class="fa-light fa-window-flip win-tab"></i></a>
            <a><i class="fa-light fa-window-flip win-tab"></i></a>
          </div>
          <a><i class="fa-sharp fa-solid fa-magnifying-glass"></i></a>
        </div>
        <div class="gadgets">
          <a href="https://wa.me/573177163494" target="_blank"><img src="{{asset('assets/img/svg/whatsapp.svg')}}" class="gadget"/></a>
          <a href="https://github.com/JpdzRamirez" target="_blank"><img src="{{asset('assets/img/svg/github.svg')}}" class="gadget"/></a>   
          <a href="mailto:jeremyivanpedraza@gmail.com?Subject=%20Servicios%20de%20Programación%20" target="_blank"><img src="{{asset('assets/img/svg/gmail.svg')}}" class="gadget"/></a>  
          <a href="https://www.linkedin.com/in/jeremy-iván-pedraza-hernández/" target="_blank"><img src="{{asset('assets/img/svg/linkedin.svg')}}" class="gadget"/></a>
          <a href="#" target="_blank"><img src="{{asset('assets/img/svg/terminal.png')}}" class="gadget"/></a>
          <a href="#" target="_blank"><img src="{{asset('assets/img/svg/google-chrome.svg')}}" class="gadget"/></a>
          <a href="#" target="_blank"><img src="{{asset('assets/img/svg/google-Drive.svg')}}" class="gadget"/></a>
          <a href="#" target="_blank"><img src="{{asset('assets/img/svg/trash.svg')}}" class="gadget"/></a>
          <a href="#" target="_blank"><img src="{{asset('assets/img/svg/settings.svg')}}" class="gadget"/></a>
        </div>
        <div class="clock-container">
          <div class="otherIcons">
            <a><i class="fa-solid fa-chevron-up"></i></a>
            <a><i class="fa-sharp fa-solid fa-plug"></i></a>
            <a><i class="fa-sharp fa-solid fa-power-off"></i></a>
            <a><i class="fa-sharp fa-solid fa-bell"></i></a>
            <button id="openBatteryToast" class="battery"></button>
            <div class="toast battery-toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    {{__('general.battery-toast')}}
                  <hr class="hr-text m-0">
                  <div class="mt-2 pt-2">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</button>
                  </div>
                </div>
            </div>
          </div>
          <div class="shape1"></div>
          <div class="clock">
            <div id="day"></div>
            <div class="wrapper">
              <div id="time"></div>
              <div id="midday"></div>
            </div>
          </div>
        </div>
      </div>
      <span class="builded">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} 
        (PHP v{{ PHP_VERSION }}), Livewire v3.5.9
    </span>
</div>
