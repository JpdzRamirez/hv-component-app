<div>
    <div class="taskBarFooter dark" id="taskBar-Footer">
        <div class="windows-container">
          <a><i class="fa-solid fa-square-list"></i></a>
          <div class="windows-tab">
            <a><i class="fa-light fa-window-flip win-tab"></i><img src="/assets/img/wallpaper.jpg" class="win-img"/></a>
            <a><i class="fa-light fa-window-flip win-tab"></i></a>
            <a><i class="fa-light fa-window-flip win-tab"></i></a>
          </div>
          <a><i class="fa-sharp fa-solid fa-magnifying-glass"></i></a>
        </div>
        <div class="gadgets">
          <a href="#" target="_blank"><i class="fa-brands fa-square-whatsapp gadget whatsapp"></i></a>
          <a href="#" target="_blank"><i class="fa-brands fa-github gadget github"></i></a>   
          <a href="#" target="_blank"><i class="fa-sharp-duotone fa-solid fa-envelopes-bulk gadget mail"></i></a>  
          <a href="#" target="_blank"><i class="fa-brands fa-linkedin gadget linkedin"></i></a>
          <a href="#" target="_blank"><i class="fa-solid fa-rectangle-terminal gadget terminal"></i></a>
          <a href="#" target="_blank"><i class="fa-brands fa-chrome gadget chrome"></i></a>
          <a href="#" target="_blank"><i class="fa-brands fa-google-drive gadget drive"></i></a>
          <a href="#" target="_blank"><i class="fa-sharp fa-solid fa-trash gadget trash"></i></a>
          <a href="#" target="_blank"><i class="fa-sharp fa-solid fa-gear gadget settings"></i></a>
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
