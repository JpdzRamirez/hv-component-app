<div>    
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
                    <div class="content" id="tagContent">
                        <p>{{ __('forms.profile.skills.content') }}</p>
                        <ul>
                            @foreach ($skills as $index => $skill)
                                <li
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="<b>Descripción:</b>{{$skill['description']}}">
                                    {{ $skill['name'] }}
                                    <svg wire:click="removeSkill({{ $index }})"
                                        style="margin-rigth:0; with:24px;" class="close" width="12" height="12"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-x-circle">
                                        <circle cx="14" cy="6" r="5" />
                                        <path d="M16 4l-4 4m0-4l4 4" />
                                    </svg>
                                </li>
                            @endforeach
                        </ul>
                        <input type="text" spellcheck="false" maxlength="20" data-toggle="modalSkills"
                            data-form-title="{{ __('forms.profile.skills-modal.title') }}"
                            placeholder="{{ __('forms.profile.skills.input.placeholder') }}" wire:model="skill"
                            onkeydown="descritionModal(event)" class="form-control" />
                    </div>
                    <div class="details">
                        <p><span>{{ $tagCounter . ' ' . __('forms.profile.skills.tagCounter') }}</span></p>
                        <button wire:click="clearSkills">{{ __('forms.profile.skills.tagButton') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('templateModal')
    <div id="modalSkills" tabindex="-1" role="dialog" aria-labelledby="modalSkillsLabel" class="pop-up">
        <!-- Título del modal -->
        <div class="pop-up__title">
            <h4 id="modalSkillsTitle"></h4>
            <svg class="close cursor-pointer" width="24" height="24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <path d="M15 9l-6 6M9 9l6 6" />
            </svg>
        </div>
        <!-- Subtítulo del modal -->
        <div class="pop-up__subtitle">
            <h6 id="modalSkillsBody">{{ __('forms.profile.skills') }}</h6>
            <em>{{ __('forms.profile.social-media-modal.em') }}</em>
            <a target="_blank" href="https://github.com/JpdzRamirez">
                {{ __('forms.profile.social-media-modal.a') }}
                <i style="color:#F04A63" class="fa-solid fa-circle-heart"></i>
            </a>
        </div>

        <!-- Formulario dentro del modal -->
        <form>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="description"
                        class="mb-0 label-required">{{ __('forms.profile.skills-modal.label') }}:</label>
                </div>
                <div class="col-sm-9 text-secondary">
                    <textarea required type="text" class="form-control" id="description" name="description"
                        placeholder="{{ __('forms.profile.skills-modal.placeholder') }}" wire:model="description" value=""></textarea>
                </div>
            </div>
            <div class="content-button-wrapper d-flex flex-row justify-content-center gap-3">
                <button type="button" id="submitModalSkills"
                    class="content-button status-button">{{ __('forms.register.button-submit') }}</button>
                <button type="button"
                    class="content-button status-button open close">{{ __('forms.register.button-cancel') }}</button>
            </div>
        </form>

    </div>
@endpush
@push('templateScripts')
    <script>
        function descritionModal(event) {
            if (event.key === "Enter") {
                // Evita la acción por defecto del Enter
                event.preventDefault();
                // Accede al elemento que disparó el evento (el input)
                let target = event.target;
                // Obtén el valor y datos desde el input
                let description = target.value.toUpperCase();
                let modalTitle = $(target).data('form-title');
                modalTitle += " " + description;
                let idSelector = $(target).data('toggle');
                // Actualizar el contenido del modal
                $('#modalSkills #modalSkillsTitle').text(modalTitle);
                // Mostrar el modal
                toggleVisibility(idSelector, 'show');
            }
        };

        // Actualizar los valores del formulario de redes sociales
        $('#submitModalSkills').on('click', function(event) {

            event.preventDefault(); // Evitar la recarga de la página
            // Obtener los valores de los inputs
            let form = $(this).closest(".pop-up").find("form");
            let description = form.find('#description').val();
            // Despachar evento Livewire con los valores
            Livewire.dispatch('skillSubmitted', {
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
