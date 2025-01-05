<div>
    <div id="app" class="app">
        <header>
            <livewire:components.header />
        </header>
        <div class="wrapper">

            <livewire:components.navbar />

            <div class="main-container">

                {{-- Tab containers sections --}}
                <div class="main-header">
                    <div class="header-menu tabs">
                        <input id="tab-1" type="radio" checked="checked" class="tab tab-selector" name="tab" />
                        <label for="tab-1" class="tab tab-primary">{{ __('dashboard.All-Apps') }}</label>
                        <input id="tab-2" type="radio" class="tab tab-selector" name="tab">
                        <label for="tab-2" class="tab tab-primary">{{ __('dashboard.WEB') }}</label>
                        <input id="tab-3" type="radio" class="tab tab-selector" name="tab" />
                        <label for="tab-3" class="tab tab-primary">{{ __('dashboard.Desktop') }}</label>
                        <input id="tab-4" type="radio" class="tab tab-selector" name="tab" />
                        <label for="tab-4" class="tab tab-primary">{{ __('dashboard.Mobile') }}</label>
                        <div class="tabsShadow"></div>
                        <div class="glider"></div>
                    </div>
                </div>
                {{-- Section MAIN Develop --}}
                <section class="item" style="overflow:auto;" id="content-main">
                    <div class="content-wrapper">
                        <div class="test">
                            <div id="header-img" class="content-wrapper-header">
                                <div class="content-wrapper-context">
                                    <div class="content-text">
                                        <div class="row mb-4">
                                            <div class="col-lg-12">
                                                <div class="section-title">
                                                    <div class="container-sm">
                                                        <img src="{{asset('assets/img/JpdzSoftwareLogo-1.png')}}" id="JPDZSoftware-logo-1" alt="JPDZSoftware-1">
                                                        <img class="hidden" src="{{asset('assets/img/JpdzSoftwareLogo-2.png')}}" id="JPDZSoftware-logo-2" alt="JPDZSoftware-2">
                                                        <div class="blockquote-wrapper">
                                                            <div class="blockquote">
                                                              <h2>
                                                                De la Capa Física al Desarrollo de Software
                                                               </h2>
                                                            </div>
                                                          </div>
                                                    </div>
                                                    <div class="container d-flex flex-column align-items-center">
                                                        <lottie-player style="filter:drop-shadow(2px 4px 6px black)" id="lottie-crm-1" src="{{asset('assets/lottie/softwareDevelop-1.json')}}" background="transparent"  speed="1"  style="width: 300px; height: 300px;" loop nocontrols autoplay></lottie-player>
                                                        <lottie-player class="hidden" style="filter:drop-shadow(2px 4px 6px black)" id="lottie-crm-2" src="{{asset('assets/lottie/softwareDevelop-2.json')}}" background="transparent"  speed="1"  style="width: 300px; height: 300px;" loop nocontrols autoplay></lottie-player>
                                                        <i>&mdash;Soluciones integrales para todas tus necesidades tecnológicas</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <!-- Start Single Service -->
                                                <div class="single-service">
                                                    <i class="fa-sharp fa-solid fa-server"></i>
                                                <div><a href="service-details.html">Administración de Servidores
                                                    </a>
                                                    <span class="info">
                                                        <i class="fa-solid fa-circle-info tooltip-info"></i>
                                                    </span>
                                                    <div class="hint-content do--split-children">
                                                        <ul>
                                                            <li>Hosting, Servidores y Office 365 Tenant: Configuración y gestión de servidores web, bases de datos y hosting (CPanel, WordPress, IIS).</li>
                                                            <li>Administración de Office 365 Tenant: Teams, OneDrive, Outlook y Excel.</li>
                                                            <li>Supervisión y mantenimiento de servidores en plataformas Windows Server, CentOS, Debian, Ubuntu Server y Zentyal.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                    <p>Hosting, CPanel, Servidores y Tenant Office 365</p>
                                                </div>
                                                <!-- End Single Service -->
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <!-- Start Single Service -->
                                                <div class="single-service">
                                                    <i class="fa-sharp-duotone fa-regular fa-network-wired"></i>
                                                    <div><a href="service-details.html">Networking</a>
                                                        <span class="info">
                                                            <i class="fa-solid fa-circle-info"></i>
                                                        </span>
                                                        <div class="hint-content do--split-children">
                                                            <ul>
                                                                <li>Configuración de VLAN, VPN, DNS, NAT, subnetting, proxy, firewall, DHCP y WLAN.</li>
                                                                <li>Instalación y mantenimiento de infraestructura de red: switches, enrutadores y servidores.</li>
                                                                <li>Diseño y optimización de redes corporativas.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>Administración y configuración de redes empresariales</p>
                                                </div>
                                                <!-- End Single Service -->
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <!-- Start Single Service -->
                                                <div class="single-service">
                                                    <i class="fa-brands fa-cloudversify"></i>
                                                    <div><a href="service-details.html">Cloud Administration</a>
                                                        <span class="info">
                                                            <i class="fa-solid fa-circle-info"></i>
                                                        </span>
                                                        <div class="hint-content do--split-children">
                                                            <ul>
                                                                <li>Configuración y mantenimiento de servicios en la nube:</li>
                                                                <li>Implementación de servicios de almacenamiento en la nube: VM, redes, bases de datos SQL, Kubernetes, buckets y firewalls.</li>
                                                                <li>Administración de entornos virtuales: Hyper-V, VMware y NGINX.</li>
                                                                <li>Administración de servicios de correo electrónico en la nube: G Suite, Outlook y Zoho Mail.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>Google Cloud Platform, Amazon Web Services y Microsoft Azure.</p>
                                                </div>
                                                <!-- End Single Service -->
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <!-- Start Single Service -->
                                                <div class="single-service">
                                                    <i class="fa-sharp fa-regular fa-code"></i>
                                                    <div><a href="service-details.html">Desarrollo de Software</a>
                                                        <span class="info">
                                                            <i class="fa-solid fa-circle-info"></i>
                                                        </span>
                                                        <div class="hint-content do--split-children">
                                                            <p>Diseño moderno de interfaces para aplicaciones web con HTML, JavaScript, CSS-SCSS y frameworks modernos.
                                                                Optimización de procesos técnicos y automatización de tareas administrativas y contables.
                                                                Desarrollo de servicios web API RESTful con documentación herramientas como Postman y Swagger
                                                                Aplicación de principios SOLID y CLEAN Code en proyectos escalables y eficientes</p>
                                                          </div>
                                                    </div>
                                                    <p>Desarrollo web Full Stack con tecnologías como PHP, Laravel & Livewire</p>
                                                </div>
                                                <!-- End Single Service -->
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <!-- Start Single Service -->
                                                <div class="single-service">
                                                    <i class="fa-sharp fa-solid fa-ticket"></i>
                                                    <div><a href="service-details.html">Servicios TI e ITIL</a>
                                                        <span class="info">
                                                            <i class="fa-solid fa-circle-info"></i>
                                                        </span>
                                                        <div class="hint-content do--split-children">
                                                            <ul>
                                                                <li>Gestión de usuarios, de incidentes y solicitudes mediante ITIL Fundamentals.</li>
                                                                <li>Mejora constante de la calidad de servicio de Servicios (CSI).</li>
                                                                <li>Gestión de Proveedores y cumplimiento de acuerdos de nivel de servicio (SLA).</li>
                                                                <li>Control detallado de los activos tecnológicos de la organización.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>Administración de Inventario y Mesa de Ayuda</p>
                                                </div>
                                                <!-- End Single Service -->
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <!-- Start Single Service -->
                                                <div class="single-service">
                                                    <i class="fa-sharp fa-solid fa-computer-speaker"></i>
                                                    <div><a href="service-details.html">Mantenimiento y Reparación de Hardware</a>
                                                        <span class="info">
                                                            <i class="fa-solid fa-circle-info"></i>
                                                        </span>
                                                        <div class="hint-content do--split-children">
                                                            <ul>
                                                                <li>Diagnóstico, reparación y mantenimiento de computadores y sistemas CCTV.</li>
                                                                <li>Configuración y actualización de hardware especializado.</li>
                                                                <li>Experiencia en impresoras multifuncionales y de consumo.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>Mantenimiento de Hardware Empresarial</p>
                                                </div>
                                                <!-- End Single Service -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-section">
                                <div class="content-section-title">Installed</div>
                                <ul>
                                    <li class="adobe-product">
                                        <div class="products">
                                            <svg viewBox="0 0 52 52" style="border:1px solid #3291b8">
                                                <g xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M40.824 52H11.176C5.003 52 0 46.997 0 40.824V11.176C0 5.003 5.003 0 11.176 0h29.649C46.997 0 52 5.003 52 11.176v29.649C52 46.997 46.997 52 40.824 52z"
                                                        fill="#061e26" data-original="#393687" />
                                                    <path
                                                        d="M12.16 39H9.28V11h9.64c2.613 0 4.553.813 5.82 2.44 1.266 1.626 1.9 3.76 1.9 6.399 0 .934-.027 1.74-.08 2.42-.054.681-.22 1.534-.5 2.561-.28 1.026-.66 1.866-1.14 2.52-.48.654-1.213 1.227-2.2 1.72-.987.494-2.16.74-3.52.74h-7.04V39zm0-12h6.68c.96 0 1.773-.187 2.44-.56.666-.374 1.153-.773 1.46-1.2.306-.427.546-1.04.72-1.84.173-.801.267-1.4.28-1.801.013-.399.02-.973.02-1.72 0-4.053-1.694-6.08-5.08-6.08h-6.52V27zM29.48 33.92l2.8-.12c.106.987.6 1.754 1.48 2.3.88.547 1.893.82 3.04.82s2.14-.26 2.98-.78c.84-.52 1.26-1.266 1.26-2.239s-.36-1.747-1.08-2.32c-.72-.573-1.6-1.026-2.64-1.36-1.04-.333-2.086-.686-3.14-1.06a7.36 7.36 0 01-2.78-1.76c-.987-.934-1.48-2.073-1.48-3.42s.54-2.601 1.62-3.761 2.833-1.739 5.26-1.739c.854 0 1.653.1 2.4.3.746.2 1.28.394 1.6.58l.48.279-.92 2.521c-.854-.666-1.974-1-3.36-1-1.387 0-2.42.26-3.1.78-.68.52-1.02 1.18-1.02 1.979 0 .88.426 1.574 1.28 2.08.853.507 1.813.934 2.88 1.28 1.066.347 2.126.733 3.18 1.16 1.053.427 1.946 1.094 2.68 2s1.1 2.106 1.1 3.6c0 1.494-.6 2.794-1.8 3.9-1.2 1.106-2.954 1.66-5.26 1.66-2.307 0-4.114-.547-5.42-1.64-1.307-1.093-1.987-2.44-2.04-4.04z"
                                                        fill="#c1dbe6" data-original="#89d3ff" />
                                                </g>
                                            </svg>
                                            Photoshop
                                        </div>
                                        <span class="status">
                                            <span class="status-circle green"></span>
                                            Updated</span>
                                        <div class="button-wrapper">
                                            <button class="content-button status-button open">Open</button>
                                            <div class="menu">
                                                <button class="dropdown">
                                                    <ul>
                                                        <li><a href="#">Go to Discover</a></li>
                                                        <li><a href="#">Learn more</a></li>
                                                        <li><a href="#">Uninstall</a></li>
                                                    </ul>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="adobe-product">
                                        <div class="products">
                                            <svg viewBox="0 0 52 52" style="border:1px solid #b65a0b">
                                                <g xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M40.824 52H11.176C5.003 52 0 46.997 0 40.824V11.176C0 5.003 5.003 0 11.176 0h29.649C46.997 0 52 5.003 52 11.176v29.649C52 46.997 46.997 52 40.824 52z"
                                                        fill="#261400" data-original="#6d4c13" />
                                                    <path
                                                        d="M30.68 39h-3.24l-2.76-9.04h-8.32L13.72 39H10.6l8.24-28h3.32l8.52 28zm-6.72-12l-3.48-11.36L17.12 27h6.84zM37.479 12.24c0 .453-.16.84-.48 1.16-.32.319-.7.479-1.14.479-.44 0-.827-.166-1.16-.5-.334-.333-.5-.713-.5-1.14s.166-.807.5-1.141c.333-.333.72-.5 1.16-.5.44 0 .82.16 1.14.48.321.322.48.709.48 1.162zM37.24 39h-2.88V18.96h2.88V39z"
                                                        fill="#e6d2c0" data-original="#ffbd2e" />
                                                </g>
                                            </svg>
                                            Illustrator
                                        </div>

                                        <span class="status">
                                            <span class="status-circle"></span>
                                            Update Available</span>
                                        <div class="button-wrapper">
                                            <button class="content-button status-button">Update this app</button>
                                            <div class="pop-up">
                                                <div class="pop-up__title">Update This App
                                                    <svg class="close" width="24" height="24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-x-circle">
                                                        <circle cx="12" cy="12" r="10" />
                                                        <path d="M15 9l-6 6M9 9l6 6" />
                                                    </svg>
                                                </div>
                                                <div class="pop-up__subtitle">Adjust your selections for advanced
                                                    options
                                                    as desired before continuing. <a href="#">Learn more</a>
                                                </div>
                                                <div class="checkbox-wrapper">
                                                    <input type="checkbox" id="check1" class="checkbox">
                                                    <label for="check1">Import previous settings and
                                                        preferences</label>
                                                </div>
                                                <div class="checkbox-wrapper">
                                                    <input type="checkbox" id="check2" class="checkbox">
                                                    <label for="check2">Remove old versions</label>
                                                </div>
                                                <div class="content-button-wrapper">
                                                    <button
                                                        class="content-button status-button open close">Cancel</button>
                                                    <button class="content-button status-button">Continue</button>
                                                </div>
                                            </div>
                                            <div class="menu">
                                                <button class="dropdown">
                                                    <ul>
                                                        <li><a href="#">Go to Discover</a></li>
                                                        <li><a href="#">Learn more</a></li>
                                                        <li><a href="#">Uninstall</a></li>
                                                    </ul>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="adobe-product">
                                        <div class="products">
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
                                        </div>
                                        <span class="status">
                                            <span class="status-circle green"></span>
                                            Updated</span>
                                        <div class="button-wrapper">
                                            <button class="content-button status-button open">Open</button>
                                            <div class="menu">
                                                <button class="dropdown">
                                                    <ul>
                                                        <li><a href="#">Go to Discover</a></li>
                                                        <li><a href="#">Learn more</a></li>
                                                        <li><a href="#">Uninstall</a></li>
                                                    </ul>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="adobe-product">
                                        <div class="products">
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
                                        </div>
                                        <span class="status">
                                            <span class="status-circle green"></span>
                                            Updated</span>
                                        <div class="button-wrapper">
                                            <button class="content-button status-button open">Open</button>
                                            <div class="menu">
                                                <button class="dropdown">
                                                    <ul>
                                                        <li><a href="#">Go to Discover</a></li>
                                                        <li><a href="#">Learn more</a></li>
                                                        <li><a href="#">Uninstall</a></li>
                                                    </ul>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="adobe-product">
                                        <div class="products">
                                            <svg viewBox="0 0 52 52" style="border: 1px solid #C75DEB">
                                                <g xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M40.824 52H11.176C5.003 52 0 46.997 0 40.824V11.176C0 5.003 5.003 0 11.176 0h29.649C46.997 0 52 5.003 52 11.176v29.649C52 46.997 46.997 52 40.824 52z"
                                                        fill="#3a3375" data-original="#3a3375" />
                                                    <path
                                                        d="M27.44 39H24.2l-2.76-9.04h-8.32L10.48 39H7.36l8.24-28h3.32l8.52 28zm-6.72-12l-3.48-11.36L13.88 27h6.84zM31.48 33.48c0 2.267 1.333 3.399 4 3.399 1.653 0 3.466-.546 5.44-1.64L42 37.6c-2.054 1.254-4.2 1.881-6.44 1.881-4.64 0-6.96-1.946-6.96-5.841v-8.2c0-2.16.673-3.841 2.02-5.04 1.346-1.2 3.126-1.801 5.34-1.801s3.94.594 5.18 1.78c1.24 1.187 1.86 2.834 1.86 4.94V30.8l-11.52.6v2.08zm8.6-5.24v-3.08c0-1.413-.44-2.42-1.32-3.021-.88-.6-1.907-.899-3.08-.899-1.174 0-2.167.359-2.98 1.08-.814.72-1.22 1.773-1.22 3.16v3.199l8.6-.439z"
                                                        height: 100%; width: 100%; fill="#e4d1eb"
                                                        data-original="#e7adfb" />
                                                </g>
                                            </svg>
                                            After Effects
                                        </div>
                                        <span class="status">
                                            <span class="status-circle green"></span>
                                            Updated</span>
                                        <div class="button-wrapper">
                                            <button class="content-button status-button open">Open</button>
                                            <div class="menu">
                                                <button class="dropdown">
                                                    <ul>
                                                        <li><a href="#">Go to Discover</a></li>
                                                        <li><a href="#">Learn more</a></li>
                                                        <li><a href="#">Uninstall</a></li>
                                                    </ul>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
                                        <div class="app-card__subtext">Edit, master and create fully proffesional
                                            videos
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
                                        <div class="app-card__subtext">Design and publish great projects & mockups
                                        </div>
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
                                        <div class="app-card__subtext">Industry Standart motion graphics & visual
                                            effects
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
                </section>
                {{-- END Section MAIN Develop --}}

                {{-- Section WEB Develop --}}
                <section class="item" style="overflow:auto;" id="content-web">
                    <div class="content-wrapper">
                        <div class="content-wrapper-header">
                            <div class="content-wrapper-context">

                            </div>
                        </div>
                        <div class="content-section">
                            <div class="content-section-title">Installed</div>

                        </div>
                    </div>
                </section>
                {{-- END Section WEB Develop --}}

                {{-- Section Desktop Develop --}}
                <section class="item" style="overflow:auto;" id="content-desktop">
                    <div class="content-wrapper">
                        <div class="content-wrapper-header">
                            <div class="content-wrapper-context">

                            </div>
                        </div>
                        <div class="content-section">
                            <div class="content-section-title">Installed</div>

                        </div>
                    </div>
                </section>
                {{-- END Section Desktop Develop --}}

                {{-- Section Android Develop --}}
                <section class="item" style="overflow:auto;" id="content-mobile">
                    <div class="content-wrapper">
                        <div class="content-wrapper-header">
                            <div class="content-wrapper-context">

                            </div>
                        </div>
                        <div class="content-section">
                            <div class="content-section-title">Installed</div>

                        </div>
                    </div>
                </section>
                {{-- END Section Android Develop --}}

            </div>
        </div>
        <div class="overlay-app"></div>
    </div>
</div>
@push('templateScripts')
    <script>
        $(document).ready(function() {
            // Función para mostrar y ocultar tabs según el seleccionado
            function updateTabs() {
                // Ocultar todos los sections
                $('#content-main, #content-web, #content-desktop, #content-mobile').css({
                    opacity: 0,
                    visibility: 'hidden'
                });

                // Mostrar el section correspondiente al tab seleccionado
                if ($('#tab-1').is(':checked')) {
                    $('#content-main').css({
                        opacity: 1,
                        visibility: 'visible'
                    });
                } else if ($('#tab-2').is(':checked')) {
                    $('#content-web').css({
                        opacity: 1,
                        visibility: 'visible'
                    });
                } else if ($('#tab-3').is(':checked')) {
                    $('#content-desktop').css({
                        opacity: 1,
                        visibility: 'visible'
                    });
                }else if ($('#tab-4').is(':checked')) {
                    $('#content-mobile').css({
                        opacity: 1,
                        visibility: 'visible'
                    });
                }
            }

            // Inicializar el estado por defecto
            updateTabs();

            // Manejar el cambio de estado de los radio buttons
            $('input[type="radio"]').on('change', function() {
                updateTabs();
            });
        });
    </script>
@endpush
