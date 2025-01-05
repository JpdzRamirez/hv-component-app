import $ from "jquery";
window.$ = window.jQuery = $;

const dropdowns = document.querySelectorAll(".dropdown");

dropdowns.forEach((dropdown) => {
  dropdown.addEventListener("click", function (e) {
    e.stopPropagation();

    // Si el dropdown ya tiene la clase 'is-active', la removemos de todos
    const isActive = dropdown.classList.contains("is-active");

    // Primero quitamos 'is-active' de todos los elementos
    dropdowns.forEach((c) => c.classList.remove("is-active"));

    // Si el botón no estaba activo, le volvemos a agregar 'is-active'
    if (!isActive) {
      dropdown.classList.add("is-active");
    }
  });
});


//CONSTANTES
const appWindow = $("#app");
const toggleButton = $('.dark-light');

const time = document.getElementById("time");
const day = document.getElementById("day");
const midday = document.getElementById("midday");

//ALTERNANCIA DE TAMAÑO
let isResize = false;
let isMinimized = false;

// Document ready
$(function () {
  $("#submitModalExperience").on("click", function() {        
    $(this).addClass("circle")
    $(this).children("span").addClass("click")    
  });
  $(".menu-link").on("click", function(){
    $(".menu-link").removeClass("is-active");
    $(this).addClass("is-active");
  });

  $(".main-header-link").on("click",function(){
    $(".main-header-link").removeClass("is-active");
    $(this).addClass("is-active");
  });

  $(".search-bar input")
    .on("focus", function() {
      $(".header").addClass("wide");
    })
    .on("blur", function() {
      $(".header").removeClass("wide");
    });

  $(".dropdown").on("click",  function(e) {
    $(".content-wrapper").addClass("overlay");
    e.stopPropagation();
  });
  
  $('.select-selected').on("click",function() {
    $('.select-items').toggle();
});


  $(document).on("click", function(e) {
    if ($(e.target).is(".dropdown") === false) {
      $(".content-wrapper").removeClass("overlay");
    }
  });

  let clock = setInterval(
    function calcTime() {
      let date_now = new Date();
      let hr = date_now.getHours();
      let min = date_now.getMinutes();
      let sec = date_now.getSeconds();
      let middayValue = "AM";

      let days = [
        "Domingo",
        "Lunes",
        "Martes",
        "Miércoles",
        "Jueves",
        "Viernes",
        "Sábado"
      ];

      day.textContent = days[date_now.getDay()];

      middayValue = hr >= 12 ? "PM" : "AM";

      if (hr == 0) {
        hr = 12;
      } else if (hr > 12) {
        hr -= 12;
      }

      hr = hr < 10 ? "0" + hr : hr;
      min = min < 10 ? "0" + min : min;
      sec = sec < 10 ? "0" + sec : sec;

      time.textContent = hr + ":" + min + ":" + sec;
      midday.textContent = middayValue;
    },

    1000
  );
});
//Full page charged
$(window).on("load", function() {
  // Oculta el estado de carga
  $('#status').fadeOut();
  // Aplica un retraso de 350ms y luego oculta el preloader lentamente
  $('#preloader').delay(350).fadeOut('slow');
  // Después de 350ms, permite que la página sea visible y scrollable
  $('body').delay(350).css({
    overflow: 'visible'
  });
});

// END DOCUMENT READY
//Events
toggleButton.on("click", function() {
  $('body').toggleClass('light-mode');

  // Alterna entre las variables de color
  if ($('body').hasClass('light-mode')) {
    $("#dark-light-icon").removeClass("fa-solid fa-sun");
    $("#dark-light-icon").addClass("fa-solid fa-moon-cloud");
    $("#header-img").css("background-image", "url('/assets/img/background-singleservices-2.jpg')");
    $("#JPDZSoftware-logo-1").addClass("hidden");
    $("#JPDZSoftware-logo-2").removeClass("hidden");
    $("#lottie-crm-1").addClass("hidden");
    $("#lottie-crm-2").removeClass("hidden");
  } else {
    $("#dark-light-icon").removeClass("fa-solid fa-moon-cloud");
    $("#dark-light-icon").addClass("fa-solid fa-sun");
    $("#header-img").css("background-image", "url('/assets/img/background-singleservices-1.jpg')");
    $("#JPDZSoftware-logo-1").removeClass("hidden");
    $("#JPDZSoftware-logo-2").addClass("hidden");
    $("#lottie-crm-1").removeClass("hidden");
    $("#lottie-crm-2").addClass("hidden");
  }
});

$(document).on("click", function(e) {
  let container = $(".status-button");
  let dd = $(".dropdown");
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    dd.removeClass("is-active");
  }
});


$("#resize").on("click", function() {
  if (!isResize) {
    // Restablecer los valores originales
    document.documentElement.style.setProperty('--app-max-width', '1250px');
    document.documentElement.style.setProperty('--app-height', '90vh');
    document.documentElement.style.setProperty('--body-padding', '2em');
  } else {
    // Aplicar los nuevos valores
    document.documentElement.style.setProperty('--body-padding', '0');
    document.documentElement.style.setProperty('--app-height', '92vh');
    document.documentElement.style.setProperty('--app-max-width', '1357px');
  }

  isResize = !isResize;
});
$("#max").on("click",  function(){
  if (!isMinimized) {
    // Restablecer los valores originales
    appWindow.addClass('window-minimized');
    setTimeout(function () {
      appWindow.attr('hidden', true);
      if (appWindow.hasClass('window-minimized')) {
        appWindow.removeClass('window-minimized');
      }
    }, 600);
  } else {
    // Aplicar los nuevos valores
    appWindow.removeAttr('hidden', false);
    $(".app").addClass('window-maximized');
    setTimeout(function () {
      if ($(".app").hasClass('window-maximized')) {
        $(".app").removeClass('window-maximized');
      }
    }, 600);
  }
  isMinimized = !isMinimized;
});
$("#min").on("click", function() {
  appWindow.addClass('window-minimized');
  setTimeout(function () {
    appWindow.attr('hidden', true);
    if (appWindow.hasClass('window-minimized')) {
      appWindow.removeClass('window-minimized');
    }
  }, 600);
  isMinimized = !isMinimized;
});



// Boton X cerrar modal popup
$(".pop-up .close").on("click", function() {
  let form = $(this).closest(".pop-up").find("form");
  if(form)form.trigger('reset');  // Restablecer el formulario a su estado inicial  
  $(".pop-up").removeClass("visible");
});

//Boton cancelar modal poupup
$(".pop-up .close").on("click",function() {
  $(".overlay-app").removeClass("is-active");
});

$(".header-menu").on('wheel', function(e) {
  e.preventDefault(); // Prevenir el desplazamiento vertical
  this.scrollLeft += e.originalEvent.deltaY; // Aplicar desplazamiento horizontal
});

