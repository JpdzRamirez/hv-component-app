<div>
    <div class="content-section">
        <div class="content-section-title d-flex flex-row align-items-center">
            {{ __('forms.profile.experience') }}
            <div class="app-card-buttons mt-0 ms-1">
                <button class="content-button status-button"  id="experienceAddButton"
                    data-toggle="modalExperience"
                    data-form-title="{{ __('forms.profile.experience-modal.defaultTitle') }}"
                    data-placeholder="{{now()->format('d-m-Y')}}">
                    <i class="fa-solid fa-books-medical"></i></button>
                <div class="menu experience">
                    <button class="dropdown">
                        <ul>
                            <li>
                                <a class="social-link" href="#">Eliminar experiencias</a>                                                                
                            </li>
                        </ul>
                    </button>
                </div>
            </div>
        </div>
        <div class="apps-card">
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
                    <button type="button" class="content-button status-button">Update</button>
                    <div class="menu"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('templateModal')
    <div id="modalExperience" tabindex="-1" role="dialog" aria-labelledby="modalExperienceLabel" style="max-height: 60%;" class="pop-up">
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
                <div class="input-group mb-3">
                        <label class="input-group-text" for="company_logo"><i class="fa-sharp-duotone fa-solid fa-photo-film"></i></label>
                        <input type="file" type="file" name="company_logo" 
                        accept=".jpg,.jpeg,.png" 
                        class="form-control" id="company_logo">
                </div>
            </div>
            <div class="mb-3">
                <label for="company"
                    class="mb-3 label-required">{{ __('forms.profile.experience-modal.labelCompany') }}:</label>
                <input required type="text" class="form-control" id="company" name="company"
                    placeholder="{{ __('forms.profile.experience-modal.inputCompany') }}" value="" />
            </div>
            <div class="mb-3">
                <label for="position"
                    class="mb-3 label-required">{{ __('forms.profile.experience-modal.labelPosition') }}:</label>
                <input required type="text" class="form-control" id="position" name="position"
                    placeholder="{{ __('forms.profile.experience-modal.inputPosition') }}" value="" />
            </div>
            <div class="mb-3">
                <label for="main_role"
                    class="mb-3 label-required">{{ __('forms.profile.experience-modal.labelMainRole') }}:</label>
                <input required type="text" class="form-control" id="main_role" name="main_role"
                    placeholder="{{ __('forms.profile.experience-modal.inputMainRole') }}" value="" />
            </div>
            <div class="mb-3">
                <label for="goals"
                    class="mb-3 label-required">{{ __('forms.profile.experience-modal.labelGoals') }}:</label>
                <textarea required type="text" class="form-control" id="goals" name="goals"
                    placeholder="{{ __('forms.profile.experience-modal.inputGoals') }}" value="" /></textarea>
            </div>
            <div class="mb-3">
                <span class="mb-3 form-label label-required">{{ __('forms.profile.experience-modal.labelWorking') }}:</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_working" id="workingYes" value="1" checked>
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
            <div class="mb-3" id="date">
                <label class="mb-3 form-label label-required" for="date">{{ __('forms.profile.experience-modal.labelDateStart') }}</label>
                <div class="container-datePicker input-group date" id="dateSingleInput">                    
                    <input type="text" name="start_date" id="start_date_single" class="form-control" placeholder="" value="">
                    <div class="input-group-addon input-group-text">  
                        <span class="glyphicon glyphicon-th"></span>                      
                        <span class="fa fa-calendar" id="fa-1"></span>
                    </div>                    
                </div>
            </div>
            <div class="row mb-3 pt-5" id="dateRange" style="display: none">
                <div class="container-datePicker px-1 px-sm-7 mx-auto">
                    <div class="flex-row d-flex justify-content-center">
                        <div class="col-lg-13 col-13 px-1">
                            <div class="input-group input-daterange gap-2">
                                <input type="text" id="start_date" placeholder="" class="form-control text-left mr-2">
                                <label class="ml-3 form-control-placeholder" id="start_date" for="start_date">{{ __('forms.profile.experience-modal.labelDateStart') }}</label>
                                <span class="fa fa-calendar" id="fa-1"></span>
                                <input type="text" id="end_date" placeholder="" class="form-control text-left ml-2">
                                <label class="ml-3 form-control-placeholder" id="end_date-label" for="end_date">{{ __('forms.profile.experience-modal.labelDateEnd') }}</label>
                                <span class="fa fa-calendar" id="fa-2"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <h3>{{ __('forms.profile.experience-modal.rankCompany-Title') }}</h3>
                <p>{{ __('forms.profile.experience-modal.rankCompany-Paragraf') }}</p>
                <label class="mb-3 form-label label-required" for="rank_company">{{ __('forms.profile.experience-modal.rankCompany-Label')}}</label>
                    <div class="starRankting">               
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
                        <input class="form-check-input" type="radio" name="rank_company" value="0" hidden checked>                        
                    </div>
            </div>
            <div class="mb-3">
                <label class="mb-3 form-label label-required" for="rank_enviroment">{{ __('forms.profile.experience-modal.rankEnviroment-Label')}}</label>
                    <div class="starRankting">               
                        <input class="form-check-input" type="radio" name="rank_enviroment" id="re5" value="5">
                        <label class="form-check-label" for="re5"></label>  
                        <input class="form-check-input" type="radio" name="rank_enviroment" id="re4" value="4">
                        <label class="form-check-label" for="re4"></label>                   
                        <input class="form-check-input" type="radio" name="rank_enviroment" id="re3" value="3">
                        <label class="form-check-label" for="re3"></label>                   
                        <input class="form-check-input" type="radio" name="rank_enviroment" id="re2" value="2">
                        <label class="form-check-label" for="re2"></label>                   
                        <input class="form-check-input" type="radio" name="rank_enviroment" id="re1" value="1">
                        <label class="form-check-label" for="re1"></label>                   
                        <input class="form-check-input" type="radio" name="rank_enviroment" value="0" hidden checked>                        
                    </div>
            </div>
            <div class="mb-3">
                <span class="mb-3 form-label label-required">{{ __('forms.profile.experience-modal.recommend') }}:</span>
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
            const dateRange=$("#dateRange");
            const date=$("#date");
            if (selectedValue === "1") {
                dateRange.hide();
                date.show();
            } else {
                dateRange.show();
                date.hide();
            }
        });
        $("#experienceAddButton").on('click',function(){            
            // Accede al elemento que disparó el evento (el input)           
            // Obtén el valor y datos desde el input            
            let modalTitle = $(this).data('form-title');
            let placeHolderDate = $(this).data('placeholder');
            let idSelector = $(this).data('toggle');
            // Actualizar el contenido del modal
            $('#modalExperience #modalExperienceTitle').text(modalTitle);
            $('#modalExperience #start_date_single').attr('placeholder', placeHolderDate);
            $('#modalExperience #start_date').attr('placeholder', placeHolderDate);
            $('#modalExperience #end_date').attr('placeholder', placeHolderDate);            
            // Mostrar el modal
            toggleVisibility(idSelector, 'show');
            }); 

        // Actualizar los valores del formulario de redes sociales
        $('#submitModalExperience').on('click', function(event) {

            event.preventDefault(); // Evitar la recarga de la página
            // Obtener los valores de los inputs
            let form = $(this).closest(".pop-up").find("form");
            let description = form.find('#description').val();
            // Despachar evento Livewire con los valores
            Livewire.dispatch('experienceSubmitted', {
                description: description
            });
            setTimeout(() => {
                let form = $(this).closest(".pop-up").find("form");
                if (form) form.trigger('reset');
                toggleVisibility("modalSkills", '');
                setTimeout(() => {
                    cleanFlashRegisters()
                }, 2000);
            }, 600);
        });
    </script>
@endpush
