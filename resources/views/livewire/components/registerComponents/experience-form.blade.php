<div>
    <div class="content-section">
        <div class="content-section-title d-flex flex-row align-items-center">
            {{ __('forms.profile.experience') }}
            <div class="app-card-buttons mt-0 ms-1">
                @if (!empty($experiences))
                    <button type="button" class="content-button status-button" id="experienceAddButton"
                        data-toggle="modalExperience"
                        data-form-title="{{ __('forms.profile.experience-modal.defaultTitle') }}"
                        data-placeholder="{{ now()->format('d-m-Y') }}">
                        <i class="fa-solid fa-books-medical"></i></button>
                    <div class="menu experience">
                        <button type="button" class="dropdown">
                            <ul>
                                <li>
                                    <a class="social-link" href="#">Eliminar experiencias</a>
                                </li>
                            </ul>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="apps-card {{ empty($experience) ? 'centered-row ' : '' }}">
            {{-- CARD START --}}
            @foreach ($experiences as $experience)
                <div class="app-card minimized">
                    <div class="experience gap-1">
                        <img class="w-25" src="{{ asset('assets/img/svg/linkedin.svg') }}" alt="Linkedin">
                        <div class="d-flex flex-column">
                            <div class="experience-position">Analista Programador</div>
                            <div class="experience-companny">Linkedin</div>
                            <div class="experience-serviceTime">Julio 2024 a Octubre 2024</div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="app-card__subtext">
                        Desarrolle aplicativos web y diseño de páginas web
                    </div>
                    <div class="app-card-buttons">
                        <button type="button"
                            class="content-button status-button">{{ __('forms.profile.experience.edit') }}</button>
                        <div class="menu"></div>
                    </div>
                </div>
            @endforeach
            {{-- CARD END --}}
            @if (empty($experiences))
                <div class="app-card minimized col">
                    <div class="container d-flex flex-column align-items-center">
                        <h3 style="text-align: center">{{ __('forms.profile.experience-firstExperience') }}</h3>
                        <i class="fa-solid fa-hand-back-point-down shake-vertical"
                            style="color:tan; font-size:2em;"></i>
                        <button type="button" class="content-button status-button" id="experienceAddButton"
                            data-toggle="modalExperience"
                            data-form-title="{{ __('forms.profile.experience-modal.defaultTitle') }}"
                            data-placeholder="{{ now()->format('d-m-Y') }}">
                            <i class="fa-solid fa-books-medical"></i></button>
                        <lottie-player src="{{ asset('assets/lottie/registerExperiences.json') }}"
                            background="transparent" speed="0.5" style="width: 12em;" loop nocontrols autoplay>
                        </lottie-player>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@push('templateModal')
    <div id="modalExperience" tabindex="-1" role="dialog" aria-labelledby="modalExperienceLabel" style="max-height: 60%;"
        class="pop-up">
        <!-- Título del modal -->
        <div class="pop-up__title">
            <h4 id="modalExperienceTitle"></h4>
            <svg class="close cursor-pointer" width="24" height="24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <path d="M15 9l-6 6M9 9l6 6" />
            </svg>
        </div>
        <!-- Subtítulo del modal -->
        <div class="pop-up__subtitle">
            <h6 id="modalExperienceBody">{{ __('forms.profile.experience-modal.defaultSubTitle') }}</h6>
            <em>{{ __('forms.profile.social-media-modal.em') }}</em>
            <a target="_blank" href="https://github.com/JpdzRamirez">
                {{ __('forms.profile.social-media-modal.a') }}
                <i style="color:#F04A63" class="fa-solid fa-circle-heart"></i>
            </a>
        </div>

        <!-- Formulario dentro del modal -->
        <form>
            <div class="mb-3">
                <label for="company_logo" 
                    class="mb-3 label-required">{{ __('forms.profile.experience-modal.labelCompany-logo') }}:</label>
                <div class="input-group mb-3" id="inputGroupCompany_logo">
                    <label class="input-group-text" for="company_logo"><i
                            class="fa-sharp-duotone fa-solid fa-photo-film"></i></label>
                    <input type="file" type="file" name="company_logo" id="company_logo" accept=".jpg,.jpeg,.png"
                        class="form-control" id="company_logo">
                </div>
            </div>
            <div class="mb-3" id="inputGroupCompany">
                <label for="company" id="labelCompany"
                    class="mb-3 label-required">{{ __('forms.profile.experience-modal.labelCompany') }}:</label>
                <input required type="text" class="form-control" id="company" name="company"
                    placeholder="{{ __('forms.profile.experience-modal.inputCompany') }}" value="" />
            </div>
            <div class="mb-3" id="inputGroupPosition">
                <label for="position" id="labelPosition"
                    class="mb-3 label-required">{{ __('forms.profile.experience-modal.labelPosition') }}:</label>
                <input required type="text" class="form-control" id="position" name="position"
                    placeholder="{{ __('forms.profile.experience-modal.inputPosition') }}" value="" />
            </div>
            <div class="mb-3" id="inputGroupMain_role">
                <label for="main_role" id="labelMain_role"
                    class="mb-3 label-required">{{ __('forms.profile.experience-modal.labelMainRole') }}:</label>
                <input required type="text" class="form-control" id="main_role" name="main_role"
                    placeholder="{{ __('forms.profile.experience-modal.inputMainRole') }}" value="" />
            </div>
            <div class="mb-3" id="inputGroupGoals">
                <label for="goals" id="labelGoals"
                    class="mb-3 label-required">{{ __('forms.profile.experience-modal.labelGoals') }}:</label>
                <textarea required type="text" class="form-control" id="goals" name="goals"
                    placeholder="{{ __('forms.profile.experience-modal.inputGoals') }}" value="" /></textarea>
            </div>
            <div class="mb-3" id="inputGroupStatus_working">
                <span 
                    class="mb-3 form-label label-required">{{ __('forms.profile.experience-modal.labelWorking') }}:</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_working" id="workingYes" value="1"
                        checked>
                    <label class="form-check-label" for="status_working">
                        {{ __('forms.profile.experience-modal.inputYes') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_working" id="workingNo" value="0">
                    <label class="form-check-label" for="status_working">
                        {{ __('forms.profile.experience-modal.inputNo') }}
                    </label>
                </div>
            </div>
            <div class="mb-3" id="date" >
                <label class="mb-3 form-label label-required" id="labelStartDateSingle"
                    for="date">{{ __('forms.profile.experience-modal.labelDateStart') }}</label>
                <div class="container-datePicker input-group date" id="dateSingleInput">
                    <input type="text" name="start_date" id="start_date_single" class="form-control" placeholder=""
                        value="">
                    <div class="input-group-addon input-group-text">
                        <span class="glyphicon glyphicon-th"></span>
                        <span class="fa fa-calendar" id="fa-1"></span>
                    </div>
                </div>
            </div>
            <div class="row mb-3 pt-5" id="dateRange" 
            style="display: none">
                <div class="container-datePicker px-1 px-sm-7 mx-auto" id="dateRangeInvalid">
                    <div class="flex-row d-flex justify-content-center">
                        <div class="col-lg-13 col-13 px-1">
                            <div class="input-group input-daterange gap-2" id="inputGroupEnd_date">
                                <input type="text" id="start_date_group" placeholder=""
                                    class="form-control text-left mr-2">
                                <label class="ml-3 form-control-placeholder" id="labelStartDateGroup"
                                    for="start_date">{{ __('forms.profile.experience-modal.labelDateStart') }}</label>
                                <span class="fa fa-calendar" id="fa-1"></span>
                                <input type="text" id="end_date" placeholder="" class="form-control text-left ml-2">
                                <label class="ml-3 form-control-placeholder" id="end_date-label"
                                    for="end_date">{{ __('forms.profile.experience-modal.labelDateEnd') }}</label>
                                <span class="fa fa-calendar" id="fa-2"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3" id="inputGroupRank_company">
                <h3>{{ __('forms.profile.experience-modal.rankCompany-Title') }}</h3>
                <p>{{ __('forms.profile.experience-modal.rankCompany-Paragraf') }}</p>
                <label class="mb-3 form-label label-required" 
                    for="rank_company">{{ __('forms.profile.experience-modal.rankCompany-Label') }}</label>
                <div class="starRankting" >
                    <input class="form-check-input" type="radio" name="rank_company" id="r5" value="5">
                    <label class="form-check-label" for="r5"></label>
                    <input class="form-check-input" type="radio" name="rank_company" id="r4" value="4">
                    <label class="form-check-label" for="r4"></label>
                    <input class="form-check-input" type="radio" name="rank_company" id="r3" value="3">
                    <label class="form-check-label" for="r3"></label>
                    <input class="form-check-input" type="radio" name="rank_company" id="r2" value="2">
                    <label class="form-check-label" for="r2"></label>
                    <input class="form-check-input" type="radio" name="rank_company" id="r1" value="1">
                    <label class="form-check-label" for="r1"></label>
                    <input class="form-check-input" type="radio" name="rank_company" id="r0" value="0"
                        hidden checked>
                </div>
            </div>
            <div class="mb-3" id="inputGroupRank_enviroment">
                <label class="mb-3 form-label label-required"
                    for="rank_enviroment">{{ __('forms.profile.experience-modal.rankEnviroment-Label') }}</label>
                <div class="starRankting"  >
                    <input class="form-check-input" type="radio" name="rank_enviroment" id="re5"
                        value="5">
                    <label class="form-check-label" for="re5"></label>
                    <input class="form-check-input" type="radio" name="rank_enviroment" id="re4"
                        value="4">
                    <label class="form-check-label" for="re4"></label>
                    <input class="form-check-input" type="radio" name="rank_enviroment" id="re3"
                        value="3">
                    <label class="form-check-label" for="re3"></label>
                    <input class="form-check-input" type="radio" name="rank_enviroment" id="re2"
                        value="2">
                    <label class="form-check-label" for="re2"></label>
                    <input class="form-check-input" type="radio" name="rank_enviroment" id="re1"
                        value="1">
                    <label class="form-check-label" for="re1"></label>
                    <input class="form-check-input" type="radio" name="rank_enviroment" id="re0" value="0"
                        hidden checked>
                </div>
            </div>
            <div class="mb-3" id="inputGroupRecommend">
                <span id="labelRecommend" class="mb-3 form-label label-required">{{ __('forms.profile.experience-modal.recommend') }}:</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="recommend" id="recommendYes" value="1">
                    <label class="form-check-label" for="recommendYes">
                        {{ __('forms.profile.experience-modal.inputYes') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="recommend" id="recommendNo" value="0">
                    <label class="form-check-label" for="recommendNo">
                        {{ __('forms.profile.experience-modal.inputNo') }}
                    </label>
                </div>
            </div>
            <div class="content-button-wrapper d-flex flex-row justify-content-center gap-3">
                <button type="button" id="submitModalExperience"
                    class="content-button status-button">{{ __('forms.register.button-submit') }}</button>
                <button type="button"
                    class="content-button status-button open close">{{ __('forms.register.button-cancel') }}</button>
            </div>
        </form>
    </div>
@endpush
@push('templateScripts')
    <script>
        document.addEventListener('experienceAdded', function(event) {
            // Obtener el valor de 'response' desde 'event.detail'
            let response = event.detail.response;
            
            if (response) {
                setTimeout(() => {
                let form = $(this).closest(".pop-up").find("form");
                if (form) form.trigger('reset');
                toggleVisibility("modalExperience", '');
                setTimeout(() => {
                    cleanFlashRegisters()
                }, 2000);
            }, 600);
            }

        });

        document.addEventListener('receiveErrorsExperience', function(event) {
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
        $('#dateSingleInput').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            calendarWeeks: true,
            clearBtn: true,
            disableTouchKeyboard: true
        });
        $('.input-daterange').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            calendarWeeks: true,
            clearBtn: true,
            disableTouchKeyboard: true
        });

        $('input[name="status_working"]').on('change', function() {
            const selectedValue = $('input[name="status_working"]:checked').val();
            const dateRange = $("#dateRange");
            const date = $("#date");
            if (selectedValue === "1") {
                dateRange.hide();
                date.show();
            } else {
                dateRange.show();
                date.hide();
            }
        });
        $('button[data-toggle="modalExperience"]').on('click', function() {
            //Limpiamos errores previos
            clearErrors();
            // Accede al elemento que disparó el evento (el input)           
            // Obtén el valor y datos desde el input            
            let modalTitle = $(this).data('form-title');
            let placeHolderDate = $(this).data('placeholder');
            let idSelector = $(this).data('toggle');
            // Actualizar el contenido del modal
            $('#modalExperience #modalExperienceTitle').text(modalTitle);
            $('#modalExperience #start_date_single').attr('placeholder', placeHolderDate);
            $('#modalExperience #start_date_group').attr('placeholder', placeHolderDate);
            $('#modalExperience #end_date').attr('placeholder', placeHolderDate);
            // Mostrar el modal
            toggleVisibility(idSelector, 'show');
        });

        // Actualizar los valores del formulario de redes sociales
        $('#submitModalExperience').on('click', function(event) {            
            // Evitar la recarga de la página
            event.preventDefault(); 
            // Obtener los valores de los inputs
            let form = $(this).closest(".pop-up").find("form");
            let company_logo = form.find('#company_logo').val();
            let company = form.find('#company').val();
            let position = form.find('#position').val();
            let main_role = form.find('#main_role').val();
            let goals = form.find('#goals').val();
            let status_working = form.find('input[name="status_working"]:checked').val();
            let start_date = '';
            let end_date = '';

            // Verifica el valor de status_working y selecciona las fechas apropiadas
            if (status_working) {
                start_date = form.find('#start_date_single').val();
            } else {
                start_date = form.find('#start_date').val();
                end_date = form.find('#end_date').val(); // Cambié aquí para usar el end_date
            }

            let rank_company = form.find('input[name="rank_company"]:checked').val();
            let rank_enviroment = form.find('input[name="rank_enviroment"]:checked').val();
            let recommend = form.find('input[name="recommend"]:checked').val();            
            let data = {
                company_logo: company_logo,
                company: company,
                position: position,
                main_role: main_role,
                goals: goals,
                status_working: status_working,
                start_date: start_date,
                end_date: end_date,
                rank_company: rank_company,
                rank_enviroment: rank_enviroment,
                recommend: recommend
            };            

            // Despachar evento Livewire con los valores
            Livewire.dispatch(
                'experienceSubmitted', {
                    data: data
                });

        });
    </script>
@endpush
