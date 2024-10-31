<div>
<!-- Modal con Alpine.js y Livewire -->
<div id="modalSkills" tabindex="-1" role="dialog" aria-labelledby="modalSkillsLabel" 
class="pop-up {{ $isOpen ? 'visible' : '' }}">
        
        <!-- Título del modal -->
        <div class="pop-up__title">
            <h4 id="modalSkillsTitle">{{ __('forms.profile.skills-modal.title') . strtoupper($formTitle) }}</h4>
            <svg @click="open = false" class="close cursor-pointer" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
        <form wire:submit="save">
            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="description" class="mb-0 label-required">{{ __('forms.profile.skills-modal.label') }}:</label>
                </div>
                <div class="col-sm-9 text-secondary">
                    <textarea required  type="text" class="form-control" id="description" name="description"
                    placeholder="{{ __('forms.profile.skills-modal.placeholder') }}" wire:model="description"
                    value="" ></textarea>                    
                </div>
            </div>
            <div class="content-button-wrapper d-flex flex-row justify-content-center gap-3">
                <button type="submit" id="submitModalSkills" class="content-button status-button">{{ __('forms.register.button-submit') }}</button>
                <button type="button" @click="open = false" class="content-button status-button open close">{{ __('forms.register.button-cancel') }}</button>
            </div>
        </form>
    
</div>
<div class="overlay-app {{ $isOpen ? 'is-active' : '' }}"></div>
</div>
