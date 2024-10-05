import $ from 'jquery';

const dropdowns = document.querySelectorAll(".dropdown");
dropdowns.forEach((dropdown) => {
    dropdown.addEventListener("click", (e) => {
    e.stopPropagation();
    dropdowns.forEach((c) => c.classList.remove("is-active"));
    dropdown.classList.add("is-active");
    });
});

const toggleButton = document.querySelector('.dark-light');

// Document ready
$(function () {
    $(".menu-link").click(function () {
     $(".menu-link").removeClass("is-active");
     $(this).addClass("is-active");
    });

    $(".main-header-link").click(function () {
        $(".main-header-link").removeClass("is-active");
        $(this).addClass("is-active");
       });

       $(".search-bar input")
       .focus(function () {
        $(".header").addClass("wide");
       })
       .blur(function () {
        $(".header").removeClass("wide");
       });

       $(".dropdown").on("click", function (e) {
        $(".content-wrapper").addClass("overlay");
        e.stopPropagation();
       });
       $(document).on("click", function (e) {
        if ($(e.target).is(".dropdown") === false) {
         $(".content-wrapper").removeClass("overlay");
        }
       });
   });
   // END DOCUMENT READY
   //Events
    $(".status-button:not(.open)").on("click", function (e) {
                $(".overlay-app").addClass("is-active");
            });
            $(".pop-up .close").click(function () {
                $(".overlay-app").removeClass("is-active");
    });

        
    toggleButton.addEventListener('click', () => {
        document.body.classList.toggle('light-mode');
    });
   
   $(document).click(function (e) {
        let container = $(".status-button");
        let dd = $(".dropdown");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
        dd.removeClass("is-active");
    }
   });
   
   $(".status-button:not(.open)").click(function () {
    $(".pop-up").addClass("visible");
   });
   
   $(".pop-up .close").click(function () {
    $(".pop-up").removeClass("visible");
   });
   
   
