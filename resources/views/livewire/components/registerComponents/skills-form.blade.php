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
                        @if (session()->has('error'))
                        <div class="alert alert-danger slide-out-top">
                            {{ session('error') }}
                        </div>
                        @endif
                    
                        <!-- Mostrar mensaje de éxito si existe -->
                        @if (session()->has('success'))
                            <div class="alert alert-success slide-out-top">
                                {{ session('success') }}
                            </div>
                        @endif
                        <p>{{ __('forms.profile.skills.content') }}</p>
                        <ul> 
                            @foreach ($skills as $index => $skill)
                                <li>
                                    {{$skill['name']}}
                                    <svg wire:click="removeSkill({{ $index }})"
                                        style="margin-rigth:0; with:24px;"
                                        class="close" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
                                        <circle cx="14" cy="6" r="5" />
                                        <path d="M16 4l-4 4m0-4l4 4" />
                                    </svg>                                 
                                </li>
                            @endforeach                      
                        </ul>                        
                        <input 
                            type="text" 
                            spellcheck="false"
                            maxlength="20"
                            placeholder="{{ __('forms.profile.skills.input.placeholder') }}"
                            wire:model="skill"
                            wire:keydown.enter="handleEnterTagg($event.target.value)"
                            class="form-control"
                        />
                    </div>
                    <div class="details">
                        <p><span>{{$tagCounter ." ". __('forms.profile.skills.tagCounter') }}</span></p>
                        <button>{{ __('forms.profile.skills.tagButton') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:components.modal.modalform />
</div>
