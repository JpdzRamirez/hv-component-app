<div>
    <div id="app" class="app">
        <header>
            <livewire:components.header />
        </header>
        <div class="wrapper">
            <div class="main-container">
                <div class="content-wrapper">
                    <div class="content-profile-header">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="jelly-card">
                                    <div class="card py-3 ">
                                        <form>
                                            <div class="row row-photo">
                                                <div
                                                    class="col-10 col-md-10 col-lg-3 jelly-bloc">
                                                    <div class="card-img card-pic slowfloat2s">
                                                        <img
                                                            src="https://dl.dropbox.com/s/u3j25jx9tkaruap/Webp.net-resizeimage.jpg?raw=1">
                                                    </div>
                                                    <div class='file file--upload'>
                                                        <label for='input-file'>
                                                            <i class="fa-solid fa-camera-retro"></i>{{ __('forms.register.label-photo') }}
                                                        </label>
                                                        <input id="input-file" name="input-file" type="file" accept=".jpg,.jpeg,.png" />
                                                      </div>                                           
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8 align-content-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title">
                                                            @if ($fullName)
                                                                {{ $fullnName }}
                                                            @else
                                                                {{ __('forms.register.model-full-name') }}
                                                            @endif
                                                        </h5>
                                                        <div class="line"></div>
                                                        <div class="col-sm-12">
                                                            <label
                                                                class="mb-0 label-required">{{ __('forms.register.label-full-name') }}
                                                            </label>
                                                        </div>
                                                        <div x-data="{ typing: false, description: '', fullText: @entangle('description'), index: 0 }" 
                                                        x-init="
                                                           $watch('fullText', (newText) => {
                                                               description = '';
                                                               index = 0;
                                                               typeText(newText);
                                                           });
                                                   
                                                           function typeText(text) {
                                                               if (index < text.length) {
                                                                   description += text[index];
                                                                   index++;
                                                                   setTimeout(() => typeText(text), 100); // Velocidad del efecto de escritura (100ms)
                                                               }
                                                           }
                                                       ">
                                                   
                                                       <!-- Textarea con eventos focus/blur -->
                                                       <div class="row mb-3">
                                                           <div class="col text-secondary">
                                                               <textarea class="form-control" aria-label="With textarea" 
                                                                         x-on:focus="typing = true" 
                                                                         x-on:blur="typing = false" 
                                                                         wire:model.debounce.500ms="description"></textarea>
                                                           </div>
                                                       </div>
                                                   
                                                       <!-- Párrafo con el texto que se muestra y cursor parpadeante si typing es true -->
                                                       <p :class="typing ? 'text-typing-with-cursor' : 'text-typing'" 
                                                          x-html="description + (typing ? '<span class=\'cursor\'></span>' : '')"></p>
                                                   </div>
                                                        <i class="fas fa-disease slowfloat3s"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <form>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="firstName"
                                                    class="mb-0 label-required">{{ __('forms.register.label-first-name') }}</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" id="firstName"
                                                    name="firstName"
                                                    placeholder="{{ __('forms.register.label-first-name') }}"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="lastName"
                                                    class="mb-0 label-required">{{ __('forms.register.label-last-name') }}</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" id="lastName"
                                                    name="lastName"
                                                    placeholder="{{ __('forms.register.label-last-name') }}"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label
                                                    class="mb-0 label-required">{{ __('forms.register.label-identification') }}</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="number" class="form-control" name="identification"
                                                    placeholder="C.C/T.I" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="email"
                                                    class="mb-0 label-required">{{ __('forms.register.label-email') }}</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="email" id="email" class="form-control" name="email"
                                                    placeholder="user@mail.com" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="email_confirm"
                                                    class="mb-0 label-required">{{ __('forms.register.label-email-confirm') }}</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="email" id="email_confirm" class="form-control"
                                                    name="email_confirm" placeholder="user@mail.com" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="phone"
                                                    class="mb-0 label-required">{{ __('forms.register.label-phone') }}</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" id="phone"class="form-control" name="phone"
                                                    value="(239) 816-9029">
                                            </div>
                                        </div>
                                        <livewire:components.location-selector />
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="address"
                                                    class="mb-0">{{ __('forms.register.label-address') }}</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" id="address" class="form-control"
                                                    name="address" value="Bay Area, San Francisco, CA">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="address_complement"
                                                    class="mb-0">{{ __('forms.register.label-address-complement') }}</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" id="address_complement" class="form-control"
                                                    name="address_complement"
                                                    placeholder="{{ __('forms.register.label-address-complement-placeholder') }}"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-card-buttons">
                                                <button type="submit"
                                                    class="content-button status-button">{{ __('forms.register.button-submit') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-section">
                        <div class="content-section-title">Apps in your plan</div>
                        <div class="apps-card">
                            <div class="app-card">
                                <span>
                                    <svg viewBox="0 0 512 512" style="border: 1px solid #a059a9">
                                        <path xmlns="http://www.w3.org/2000/svg"
                                            d="M480 0H32C14.368 0 0 14.368 0 32v448c0 17.664 14.368 32 32 32h448c17.664 0 32-14.336 32-32V32c0-17.632-14.336-32-32-32z"
                                            fill="#210027" data-original="#7b1fa2" />
                                        <g xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M192 64h-80c-8.832 0-16 7.168-16 16v352c0 8.832 7.168 16 16 16s16-7.168 16-16V256h64c52.928 0 96-43.072 96-96s-43.072-96-96-96zm0 160h-64V96h64c35.296 0 64 28.704 64 64s-28.704 64-64 64zM400 256h-32c-18.08 0-34.592 6.24-48 16.384V272c0-8.864-7.168-16-16-16s-16 7.136-16 16v160c0 8.832 7.168 16 16 16s16-7.168 16-16v-96c0-26.464 21.536-48 48-48h32c8.832 0 16-7.168 16-16s-7.168-16-16-16z"
                                                fill="#f6e7fa" data-original="#e1bee7" />
                                        </g>
                                    </svg>
                                    Premiere Pro
                                </span>
                                <div class="app-card__subtext">Edit, master and create fully proffesional videos
                                </div>
                                <div class="app-card-buttons">
                                    <button class="content-button status-button">Update</button>
                                    <div class="menu"></div>
                                </div>
                            </div>
                            <div class="app-card">
                                <span>
                                    <svg viewBox="0 0 52 52" style="border: 1px solid #c1316d">
                                        <g xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M40.824 52H11.176C5.003 52 0 46.997 0 40.824V11.176C0 5.003 5.003 0 11.176 0h29.649C46.997 0 52 5.003 52 11.176v29.649C52 46.997 46.997 52 40.824 52z"
                                                fill="#2f0015" data-original="#6f2b41" />
                                            <path
                                                d="M18.08 39H15.2V13.72l-2.64-.08V11h5.52v28zM27.68 19.4c1.173-.507 2.593-.761 4.26-.761s3.073.374 4.22 1.12V11h2.88v28c-2.293.32-4.414.48-6.36.48-1.947 0-3.707-.4-5.28-1.2-2.08-1.066-3.12-2.92-3.12-5.561v-7.56c0-2.799 1.133-4.719 3.4-5.759zm8.48 3.12c-1.387-.746-2.907-1.119-4.56-1.119-1.574 0-2.714.406-3.42 1.22-.707.813-1.06 1.847-1.06 3.1v7.12c0 1.227.44 2.188 1.32 2.88.96.719 2.146 1.079 3.56 1.079 1.413 0 2.8-.106 4.16-.319V22.52z"
                                                fill="#e1c1cf" data-original="#ff70bd" />
                                        </g>
                                    </svg>
                                    InDesign
                                </span>
                                <div class="app-card__subtext">Design and publish great projects & mockups</div>
                                <div class="app-card-buttons">
                                    <button class="content-button status-button">Update</button>
                                    <div class="menu"></div>
                                </div>
                            </div>
                            <div class="app-card">
                                <span>
                                    <svg viewBox="0 0 52 52" style="border: 1px solid #C75DEB">
                                        <g xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M40.824 52H11.176C5.003 52 0 46.997 0 40.824V11.176C0 5.003 5.003 0 11.176 0h29.649C46.997 0 52 5.003 52 11.176v29.649C52 46.997 46.997 52 40.824 52z"
                                                fill="#3a3375" data-original="#3a3375" />
                                            <path
                                                d="M27.44 39H24.2l-2.76-9.04h-8.32L10.48 39H7.36l8.24-28h3.32l8.52 28zm-6.72-12l-3.48-11.36L13.88 27h6.84zM31.48 33.48c0 2.267 1.333 3.399 4 3.399 1.653 0 3.466-.546 5.44-1.64L42 37.6c-2.054 1.254-4.2 1.881-6.44 1.881-4.64 0-6.96-1.946-6.96-5.841v-8.2c0-2.16.673-3.841 2.02-5.04 1.346-1.2 3.126-1.801 5.34-1.801s3.94.594 5.18 1.78c1.24 1.187 1.86 2.834 1.86 4.94V30.8l-11.52.6v2.08zm8.6-5.24v-3.08c0-1.413-.44-2.42-1.32-3.021-.88-.6-1.907-.899-3.08-.899-1.174 0-2.167.359-2.98 1.08-.814.72-1.22 1.773-1.22 3.16v3.199l8.6-.439z"
                                                fill="#e4d1eb" data-original="#e7adfb" />
                                        </g>
                                    </svg>
                                    After Effects
                                </span>
                                <div class="app-card__subtext">Industry Standart motion graphics & visual effects
                                </div>
                                <div class="app-card-buttons">
                                    <button class="content-button status-button">Update</button>
                                    <div class="menu"></div>
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

