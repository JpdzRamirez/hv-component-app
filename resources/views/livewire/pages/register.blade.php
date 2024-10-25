<div>
    <div id="app" class="app">
        <header>
            <livewire:components.header/>
        </header>
        <div class="wrapper">
            <div class="main-container">
                <div class="content-wrapper">
                    <div class="content-profile-header">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="jelly-card">
                                    <div class="card py-3 ">
                                        <form wire:submit.prevent="store">
                                            @csrf
                                            <div class="row row-photo">
                                                <div
                                                    class="col-10 col-md-10 col-lg-3 jelly-bloc">
                                                    <div class="card-img card-pic slowfloat2s">
                                                        <img
                                                            src="https://dl.dropbox.com/s/u3j25jx9tkaruap/Webp.net-resizeimage.jpg?raw=1">
                                                    </div>
                                                    <div class='file file--upload'>
                                                        <label for="photo">
                                                            <i class="fa-solid fa-camera-retro"></i>{{ __('forms.register.label-photo') }}
                                                        </label>
                                                        <input id="photo" class="form-control @error('photo') is-invalid @enderror" wire:model="photo" name="photo" type="file" accept=".jpg,.jpeg,.png" />
                                                        @error('photo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                      </div>                                           
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8 align-content-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title" wire:model="fullname">
                                                            {{$fullname}}
                                                        </h5>
                                                        <div class="line"></div>
                                                        <div class="col-sm-12">
                                                            <label for="description" 
                                                                class="mb-0 label-required">{{ __('forms.register.label-full-name') }}
                                                            </label>
                                                        </div>
                                                        <div x-data="{ typing: false, description: '', fullText: @entangle('description'), index: 0 }" 
                                                        x-init="
                                                            ////  La funcion entangle nos permite por medio de apine comunicarnos con la variable
                                                           $watch('fullText', (newText) => {
                                                               description = '';
                                                               index = 0;
                                                               typeText(newText);
                                                           });
                                                            ////  Velocidad del efecto de escritura (100ms)
                                                           function typeText(text) {
                                                               if (index < text.length) {
                                                                   description += text[index];
                                                                   index++;
                                                                   setTimeout(() => typeText(text), 50); 
                                                               }
                                                           }
                                                       ">
                                                   
                                                       <!-- Textarea con eventos focus/blur -->
                                                       <div class="row mb-3">
                                                           <div class="col text-secondary">
                                                               <textarea class="form-control @error('description') is-invalid @enderror" 
                                                                        id="description" name="description"
                                                                         aria-label="With textarea" 
                                                                         x-on:focus="typing = true" 
                                                                         x-on:blur="typing = false" 
                                                                         wire:model.debounce.500ms="description"></textarea>
                                                                @error('description')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                           </div>
                                                       </div>
                                                       {{--Párrafo con el texto que se muestra y cursor si typing es true--}}
                                                       <p :class="typing ? 'text-typing-with-cursor' : 'text-typing'" 
                                                          x-html="description + (typing ? '<span class=\'cursor\'></span>' : '')"></p>
                                                        </div>
                                                        <i class="fa-solid fa-cabinet-filing slowfloat3s"></i>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="content-section">
                        <div class="content-section-title">
                            @if (Route::currentRouteName() == 'profile.create')
                                {{ __('forms.profile.create') }}
                            @elseif (Route::currentRouteName() == 'profile.edit')
                                {{ __('forms.profile.edit') }}
                            @endif
                        </div>
                        <div class="apps-card">
                            <div class="form-card">
                                <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="firstName"
                                                    class="mb-0 label-required">{{ __('forms.register.label-first-name') }}:</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname"
                                                    name="firstname"  wire:model.live.debounce.500ms="firstname" 
                                                    placeholder="{{ __('forms.register.label-first-name') }}"
                                                    value="">
                                                @error('firstname')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="lastname"
                                                    class="mb-0 label-required">{{ __('forms.register.label-last-name') }}:</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname"
                                                    name="lastname" wire:model.live.debounce.500ms="lastname"
                                                    placeholder="{{ __('forms.register.label-last-name') }}"
                                                    value="">
                                                @error('lastname')
                                                <div class="invalid-feedback">
                                                            {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label
                                                    class="mb-0 label-required">{{ __('forms.register.label-identification') }}:</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control @error('card') is-invalid @enderror" 
                                                name="identification" wire:model="card"
                                                placeholder="C.C/T.I" pattern="[0-9]*" inputmode="numeric">
                                                @error('card')
                                                <div class="invalid-feedback">
                                                        {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="email"
                                                    class="mb-0 label-required">{{ __('forms.register.label-email') }}:</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                                                name="email" wire:model="email"
                                                    placeholder="user@mail.com" value="">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                        {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="email_confirm"
                                                    class="mb-0 label-required">{{ __('forms.register.label-email-confirm') }}:</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="email" id="email_confirm" class="form-control @error('email_confirm') is-invalid @enderror"
                                                    name="email_confirm" wire:model="email_confirm"
                                                    placeholder="user@mail.com" value="">
                                                @error('email_confirm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <livewire:components.location-selector :selectedCountry="$country" :initState="$state" :initCity="$city" />
                                        <livewire:components.phone-selector :selectedPhoneIndicator="$phone_root" :phoneNumber="$phone"/>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="address"
                                                    class="mb-0">{{ __('forms.register.label-address') }}:</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" id="address" class="form-control @error('address') is-invalid @enderror"
                                                    name="address" wire:model="address"
                                                    value="" placeholder="{{ __('forms.register.label-address-placeholder') }}">
                                                @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="address_complement"
                                                    class="mb-0">{{ __('forms.register.label-address-complement') }}:</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" id="address_complement" class="form-control @error('address_complement') is-invalid @enderror"
                                                    name="address_complement" wire:model="address_complement"
                                                    placeholder="{{ __('forms.register.label-address-complement-placeholder')}}"
                                                    value="">
                                                @error('address_complement')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-card-buttons">
                                                <button type="submit"
                                                    class="content-button">{{ __('forms.register.button-submit') }}</button>
                                            </div>
                                            <span wire:loading>Saving...</span> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Social Media Form--}}
                    <div class="content-section">
                        <div class="content-section-title">{{ __('forms.profile.social-media') }}</div>
                        <ul>
                            <li class="adobe-product">
                                <div class="products">
                                    <img class="w-25" src="{{asset('assets/img/svg/linkedin.svg')}}" alt="Linkedin">
                                    Linkedin
                                </div>
                                <span class="status">
                                    <span class="status-circle red"></span>
                                    Sin Añadir
                                </span>
                                <div class="button-wrapper">
                                    <button type="button"
                                    data-toggle="modalSocialMedia" 
                                    data-target="#modalSocialMedia"
                                    data-form-title="Añadir Linkedin"
                                    data-form-socialprompt="linkedin"
                                    data-form-body="Ingrese por favor la URL de su perfil de linkedin"
                                    class="content-button status-button">{{ __('forms.profile.social-media.add') }}</button>
                                    <div class="menu">
                                        <button class="dropdown">
                                            <ul>
                                                <li><a href="#">Ir</a></li>
                                            </ul>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="adobe-product">
                                <div class="products">
                                    <img class="w-25" src="{{asset('assets/img/svg/github.svg')}}" alt="Linkedin">
                                    GitHub
                                </div>
                                <span class="status">
                                    <span class="status-circle red"></span>
                                    Sin Añadir
                                </span>
                                <div class="button-wrapper">
                                    <button class="content-button status-button">{{ __('forms.profile.social-media.add') }}</button>
                                    <div class="menu">
                                        <button class="dropdown">
                                            <ul>
                                                <li><a href="#">Ir</a></li>
                                            </ul>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="adobe-product">
                                <div class="products">
                                    <img class="w-25" src="{{asset('assets/img/svg/outlook.svg')}}" alt="Linkedin">
                                    Office-365
                                </div>
                                <span class="status">
                                    <span class="status-circle green"></span>
                                    Añadido</span>
                                <div class="button-wrapper">
                                    <button class="content-button status-button">{{ __('forms.profile.social-media.add') }}</button>
                                    <div class="menu">
                                        <button class="dropdown">
                                            <ul>
                                                <li><a href="#">Ir</a></li>
                                            </ul>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="adobe-product">
                                <div class="products">
                                    <img class="w-25" src="{{asset('assets/img/svg/youtube.svg')}}" alt="Linkedin">
                                    Youtube
                                </div>
                                <span class="status">
                                    <span class="status-circle green"></span>
                                    Añadido</span>
                                <div class="button-wrapper">
                                    <button class="content-button status-button">{{ __('forms.profile.social-media.add') }}</button>
                                    <div class="menu">
                                        <button class="dropdown">
                                            <ul>
                                                <li><a href="#">Ir</a></li>
                                            </ul>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="adobe-product">
                                <div class="products">
                                    <img class="w-25" src="{{asset('assets/img/svg/instagram.svg')}}" alt="Linkedin">
                                    Instagram
                                </div>
                                <span class="status">
                                    <span class="status-circle green"></span>
                                    Añadido</span>
                                <div class="button-wrapper">
                                    <button class="content-button status-button">{{ __('forms.profile.social-media.add') }}</button>
                                    <div class="menu">
                                        <button class="dropdown">
                                            <ul>
                                                <li><a href="#">Ir</a></li>
                                            </ul>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="adobe-product">
                                <div class="products">
                                    <img class="w-25" src="{{asset('assets/img/svg/x_logo.svg')}}" alt="Linkedin">
                                    X (Old Twitter)
                                </div>
                                <span class="status">
                                    <span class="status-circle green"></span>
                                    Añadido</span>
                                <div class="button-wrapper">
                                    <button class="content-button status-button"> {{ __('forms.profile.social-media.add') }}</button>
                                    <div class="menu">
                                        <button class="dropdown">
                                            <ul>
                                                <li><a href="#">Ir</a></li>
                                            </ul>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    {{--Experience Media Form--}}
                    <div class="content-section">
                        <div class="content-section-title d-flex flex-row align-items-center">
                            {{ __('forms.profile.experience') }}
                            <div class="app-card-buttons mt-0 ms-1">
                                <button class="content-button status-button"><i class="fa-solid fa-books-medical"></i></button>
                                <div class="menu"></div>
                            </div>
                        </div>
                        <div class="apps-card">
                            <div class="app-card minimized">
                                <span>
                                <img class="w-25" src="{{asset('assets/img/svg/linkedin.svg')}}" alt="Linkedin">
                                    Linkedin
                                </span>
                                <div class="app-card__subtext">Edit, master and create fully proffesional videos
                                </div>
                                <div class="app-card-buttons">
                                    <button type="button" class="content-button status-button">Update</button>
                                    <div class="menu"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Skills Media Form--}}
                    <div class="content-section">
                        <div class="content-section-title d-flex flex-row align-items-center">
                            {{ __('forms.profile.skills') }} 
                        </div>
                        <div class="apps-card">
                            <div class="app-card maximized">
                                <div class="tag-cointainer">
                                    <div class="title">
                                      <i class="fa-sharp fa-solid fa-trophy"></i>
                                      <h2>{{ __('forms.profile.skills.subtitle') }}</h2>
                                    </div>
                                    <div class="content">
                                      <p>{{ __('forms.profile.skills.content') }}</p>
                                      <ul><input type="text" class="form-control" spellcheck="false"></ul>
                                    </div>
                                    <div class="details">
                                      <p><span>10</span> {{ __('forms.profile.skills.tagCounter') }}</p>
                                      <button>{{ __('forms.profile.skills.tagButton') }}</button>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay-app"></div>
    </div>
</div>
@push('templateModal')
        {{--MODAL SOCIAL MEDIA FORM--}}
        <div id="modalSocialMedia" tabindex="-1" role="dialog" 
        aria-labelledby="modalSocialMediaLabel" class="pop-up">
            <div class="pop-up__title">
                <h4 id="modalSocialMediaTitle"></h4>
                <svg class="close" width="24" height="24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-x-circle">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M15 9l-6 6M9 9l6 6" />
                </svg>
            </div>
            <div class="pop-up__subtitle"> 
                <h6 id="modalSocialMediaBody"></h6>            
                <em>{{ __('forms.profile.social-media-modal.em') }}</em>
                <a target="__blanck" href="https://github.com/JpdzRamirez">
                    {{ __('forms.profile.social-media-modal.a') }}<i style="color:#F04A63" class="fa-solid fa-circle-heart"></i>
                </a>
            </div>
            <form>
                <div class="checkbox-wrapper">
                    <input type="checkbox" id="temrs" class="checkbox">
                    <label for="temrs">{{ __('forms.profile.social-media-modal.terms') }}</label>
                </div>
                <div class="checkbox-wrapper">
                    <input type="checkbox" id="marketing" class="checkbox">
                    <label for="marketing">{{ __('forms.profile.social-media-modal.marketing') }}</label>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="URL"
                            class="mb-0 label-required">{{ __('forms.profile.social-media-modal.URL') }}:</label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" id="URL"
                            name="URL"
                            placeholder="www.linkedin.com/in/jeremy-iván-pedraza-hernández"
                            value="">
                        <input type="text" hidden id="socialPromptInput"
                            name="socialPromptInput" value="">
                    </div>
                </div>
                <div class="content-button-wrapper">
                    <button type="button" id="submitModalSocial" class="content-button status-button">{{ __('forms.register.button-submit') }}</button>
                    <button type="button" class="content-button status-button open close">{{ __('forms.register.button-cancel') }}</button>
                </div>
            </form>
        </div>
@endpush
@push('templateScripts')
<script>
        document.addEventListener('receiveErrors', function(event) {
                // Obtén los errores del evento
                const errors = event.detail[0]; // Accedemos al primer (y único) objeto del arreglo

                // Limpiar cualquier error anterior
                clearErrors();

                // Iterar sobre los errores y asignar las clases y mensajes de error apropiados
                for (const field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        const errorMessages = errors[field]; // Array de mensajes de error                        
                        // Actualizamos dinámicamente cada input con errores
                        addErrorToField(field, errorMessages);
                    }
                }
        });
        // Función para agregar error a un campo específico
        function addErrorToField(field, errorMessages) {
            // Convertir el nombre del campo a su ID en el DOM
            const labelId = `label${capitalizeFirstLetter(field)}`;
            const inputId = `${field}`;
            // Agregar la clase 'is-invalid' al label y al input
            if(labelId!="labelPhone"){
                document.getElementById(labelId).classList.add('is-invalid');     
            }else if(labelId=="labelPhone"){
                document.getElementById("phone").classList.add('is-invalid');   
            }
            // Insertar el feedback debajo del input group
            let inputGroup = document.getElementById(`inputGroup${capitalizeFirstLetter(field)}`);
            let feedbackDiv = document.createElement('div');
            feedbackDiv.classList.add('invalid-feedback');
            feedbackDiv.innerText = errorMessages.join(', '); // Mostrar los errores concatenados
            inputGroup.appendChild(feedbackDiv);
        }
        // Función para limpiar los errores anteriores
        function clearErrors() {
            const invalidElements = document.querySelectorAll('.is-invalid');
            invalidElements.forEach(element => {
                element.classList.remove('is-invalid');
            });

            // Remover todos los divs de feedback
            const feedbackDivs = document.querySelectorAll('.invalid-feedback');
            feedbackDivs.forEach(feedbackDiv => feedbackDiv.remove());
        }

        // Función auxiliar para capitalizar la primera letra de un campo
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        $('button[data-toggle="modalSocialMedia"]').on("click", function() {
				// Obtener datos del botón
				let modalsocialPrompt = $(this).data('form-socialprompt');
				let modalTitle = $(this).data('form-title');
                let modalBody = $(this).data('form-body');
				// Actualizar el contenido del modal                
				$('#modalSocialMedia #modalSocialMediaTitle').text(modalTitle);
                $('#modalSocialMedia #modalSocialMediaBody').text(modalBody);
				$('#modalSocialMedia #socialPromptInput').val(modalsocialPrompt);
		});

        $('#submitModalSocial').on('click', function(event) {
            setTimeout(() => {                
                let form = $(this).closest(".pop-up").find("form");
                if(form)form.trigger('reset'); 
                $(".pop-up").removeClass("visible");
            }, 600);
        event.preventDefault(); // Evitar la recarga de la página
        // Obtener los valores de los inputs
        let url = $('#URL').val();
        let socialPrompt = $('#socialPromptInput').val();
        let terms = $('#temrs').is(':checked') ? 1 : 0;
        let marketing = $('#marketing').is(':checked') ? 1 : 0;
        let data={
            url: url,
            socialPrompt: socialPrompt,
            terms: terms,
            marketing: marketing
        }        
        // Despachar evento Livewire con los valores
        Livewire.dispatch('socialMediaSubmitted',{data:data});    
    });

</script> 
@endpush
