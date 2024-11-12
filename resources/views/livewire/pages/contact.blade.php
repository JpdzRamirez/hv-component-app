<div>
    <div class="content-wrapper" style="background-color: unset">
        <div class="content-section">
            <div class="content-section-title">
                {{__('general.contact-title')}}
            </div>
            <div class="apps-card">
                <div class="form-card">
                    <div class="card-body">
                        <div class="screen-body">
                            <div class="contact-body">
                                <div class="contact-body-image d-flex flex-column justify-content-between">
                                    <div class="contact-body-image-animation">
                                        <p>{{__('general.contact-services')}}:</p>
                                        <div class="animation">
                                            <div class="first"><div>{{__('general.contact-services-first')}}</div></div>
                                            <div class="second"><div>{{__('general.contact-services-second')}}</div></div>
                                            <div class="third"><div>{{__('general.contact-services-third')}}</div></div>
                                            <div class="fourth"><div>{{__('general.contact-services-fourth')}}</div></div>
                                          </div>
                                    </div>
                                    <img id="imageSize" src="{{asset('assets/img/fullLogo.png')}}" alt="JPDZSoftware">
                                    <div class="contact-body-phone"><p>👋</p> <span>{{__('general.contact-info')}}:  <a href="https://api.whatsapp.com/send/?phone=573177163494&text&type=phone_number&app_absent=0" target="_blank" >+57 317 7163 494</a></span></div>
                                </div>
                                <div class="contact-body-form">
                                    <div wire:loading>
                                        Cargando...
                                    </div>
                                    <form wire:submit="submitMail">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="name"
                                                    class="mb-0 label-required">{{__('forms.contact.form-name')}}:</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" placeholder="" value="">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="email"
                                                    class="mb-0 label-required">{{__('forms.contact.form-email')}}:</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" name="email" placeholder="youremail@email.com" value="">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="contact"
                                                    class="mb-0 label-required">{{__('forms.contact.form-number')}}:</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text"
                                                    class="form-control @error('contact') is-invalid @enderror"
                                                    id="contact" name="contact" placeholder="+57-3177163494" value="">
                                                @error('contact')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="message"
                                                    class="mb-0 label-required">{{__('forms.contact.form-message')}}:</label>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <textarea type="text"
                                                    class="form-control @error('message') is-invalid @enderror"
                                                    id="message" name="message" placeholder="{{__('forms.contact.form-msg-palceholder')}}" value=""></textarea>
                                                @error('message')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="content-button-wrapper submitButton d-flex flex-row justify-content-center gap-3">
                                            <button type="submit"
                                                class="content-button status-button">{{ __('forms.register.button-submit') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('templateScripts')
    <script>
        $("#imageSize").addClass('img-enlargable').click(function(){
            let src = $(this).attr('src');
            $('<div>').css({
                background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
                backgroundSize: 'contain',
                width:'100%', height:'100%',
                position:'fixed',
                zIndex:'10000',
                top:'0', left:'0',
                cursor: 'zoom-out'
            }).click(function(){
                $(this).remove();
            }).appendTo('body');
        });
    </script>
@endpush