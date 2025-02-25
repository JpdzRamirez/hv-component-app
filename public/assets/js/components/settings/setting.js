let toggle_customSidebar = false,
custom_open = 0;

if(!toggle_customSidebar) {
	let toggle = $('.custom-template .custom-toggle');

	toggle.on('click', (function(){
		if (custom_open == 1){
			$('.custom-template').removeClass('open');
			toggle.removeClass('toggled');
			custom_open = 0;
		}  else {
			$('.custom-template').addClass('open');
			toggle.addClass('toggled');
			custom_open = 1;
		}
	})
	);
	toggle_customSidebar = true;
}
window.addEventListener('color-updated', event => {
        const { variable, color } = event.detail;
        document.documentElement.style.setProperty(`--${variable}`, color);
});
