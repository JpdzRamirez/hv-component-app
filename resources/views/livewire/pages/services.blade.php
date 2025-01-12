<div>
    {{-- Tab containers sections --}}
    <div class="main-header">
        <div class="header-menu tabs">
            <input id="tab-1" type="radio" checked="checked" class="tab tab-selector" name="tab" />
            <label for="tab-1" class="tab tab-primary">
                <p>{{ __('dashboard.All-Apps') }}</p>
            </label>
            <input id="tab-2" type="radio" class="tab tab-selector" name="tab">
            <label for="tab-2" class="tab tab-primary">
                <p>{{ __('dashboard.WEB') }}</p>
            </label>
            <input id="tab-3" type="radio" class="tab tab-selector" name="tab" />
            <label for="tab-3" class="tab tab-primary">
                <p>{{ __('dashboard.Desktop') }}</p>
            </label>
            <input id="tab-4" type="radio" class="tab tab-selector" name="tab" />
            <label for="tab-4" class="tab tab-primary">
                <p>{{ __('dashboard.Mobile') }}</p>
            </label>
            <div class="tabsShadow"></div>
            <div class="glider"></div>
        </div>
    </div>
    {{-- Section MAIN Develop --}}
    <section class="item tabs-hidden" style="overflow:auto;" id="content-main">
        <div class="content-wrapper">
            <div class="test">
                <div id="header-img" class="content-wrapper-header">
                    <div class="content-wrapper-context">
                        <div class="content-text">
                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <div class="container-sm">
                                            <img src="{{ asset('assets/img/JpdzSoftwareLogo-1.png') }}"
                                                id="JPDZSoftware-logo-1" alt="JPDZSoftware-1">
                                            <img class="hidden" src="{{ asset('assets/img/JpdzSoftwareLogo-2.png') }}"
                                                id="JPDZSoftware-logo-2" alt="JPDZSoftware-2">
                                            <div class="blockquote-wrapper">
                                                <div class="blockquote">
                                                    <h2>
                                                        {{ __('dashboard.slogan') }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container d-flex flex-column align-items-center">
                                            <lottie-player style="filter:drop-shadow(2px 4px 6px black)"
                                                id="lottie-crm-1"
                                                src="{{ asset('assets/lottie/softwareDevelop-1.json') }}"
                                                background="transparent" speed="1"
                                                style="width: 300px; height: 300px;" loop nocontrols
                                                autoplay></lottie-player>
                                            <lottie-player class="hidden" style="filter:drop-shadow(2px 4px 6px black)"
                                                id="lottie-crm-2"
                                                src="{{ asset('assets/lottie/softwareDevelop-2.json') }}"
                                                background="transparent" speed="1"
                                                style="width: 300px; height: 300px;" loop nocontrols
                                                autoplay></lottie-player>
                                            <i>&mdash;{{ __('dashboard.CRM-Slogan') }}</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xxl-4 col-lg-6 col-12">
                                    <!-- Start Single Service -->
                                    <div class="single-service">
                                        <i class="fa-sharp fa-solid fa-server"></i>
                                        <a href="service-details.html">{{ __('dashboard.service-1.title') }}</a>
                                        <span class="info">
                                            <i class="fa-solid fa-circle-info tooltip-info"></i>
                                        </span>
                                        <div class="hint-content do--split-children">
                                            <ul>
                                                @foreach (__('dashboard.service-1.list') as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <span class="hint-line"></span>
                                        <p>{{ __('dashboard.service-1.paragraf') }}</p>
                                    </div>
                                    <!-- End Single Service -->
                                </div>
                                <div class="col-xxl-4 col-lg-6 col-12">
                                    <!-- Start Single Service -->
                                    <div class="single-service">
                                        <i class="fa-sharp-duotone fa-regular fa-network-wired"></i>
                                        <a href="service-details.html">{{ __('dashboard.service-2.title') }}</a>
                                        <span class="info">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </span>
                                        <div class="hint-content do--split-children">
                                            <ul>
                                                @foreach (__('dashboard.service-2.list') as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <span class="hint-line"></span>
                                        <p>{{ __('dashboard.service-2.paragraf') }}</p>
                                    </div>
                                    <!-- End Single Service -->
                                </div>
                                <div class="col-xxl-4 col-lg-6 col-12">
                                    <!-- Start Single Service -->
                                    <div class="single-service">
                                        <i class="fa-brands fa-cloudversify"></i>
                                        <a href="service-details.html">{{ __('dashboard.service-3.title') }}</a>
                                        <span class="info">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </span>
                                        <div class="hint-content do--split-children">
                                            <ul>
                                                @foreach (__('dashboard.service-3.list') as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <span class="hint-line"></span>
                                        <p>{{ __('dashboard.service-3.paragraf') }}</p>
                                    </div>
                                    <!-- End Single Service -->
                                </div>
                                <div class="col-xxl-4 col-lg-6 col-12">
                                    <!-- Start Single Service -->
                                    <div class="single-service">
                                        <i class="fa-sharp fa-regular fa-code"></i>
                                        <a href="service-details.html">{{ __('dashboard.service-4.title') }}</a>
                                        <span class="info">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </span>
                                        <div class="hint-content do--split-children">
                                            <ul>
                                                @foreach (__('dashboard.service-4.list') as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <span class="hint-line"></span>
                                        <p>{{ __('dashboard.service-4.paragraf') }}</p>
                                    </div>
                                    <!-- End Single Service -->
                                </div>
                                <div class="col-xxl-4 col-lg-6 col-12">
                                    <!-- Start Single Service -->
                                    <div class="single-service">
                                        <i class="fa-sharp fa-solid fa-ticket"></i>
                                        <a href="service-details.html">Servicios TI e ITIL</a>
                                        <span class="info">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </span>
                                        <div class="hint-content do--split-children">
                                            <ul>
                                                <li>Gestión de usuarios, incidentes y solicitudes mediante ITIL
                                                    Fundamentals.</li>
                                                <li>Mejora constante de la calidad de servicio de Servicios (CSI).</li>
                                                <li>Gestión de Proveedores y cumplimiento de acuerdos de nivel de
                                                    servicio (SLA).</li>
                                                <li>Control detallado de los activos tecnológicos de la organización.
                                                </li>
                                            </ul>
                                        </div>
                                        <span class="hint-line"></span>
                                    </div>
                                    <p>Administración de Inventario y Mesa de Ayuda</p>

                                    <!-- End Single Service -->
                                </div>
                                <div class="col-xxl-4 col-lg-6 col-12">
                                    <!-- Start Single Service -->
                                    <div class="single-service">
                                        <i class="fa-sharp fa-solid fa-computer-speaker"></i>
                                        <a href="service-details.html">Mantenimiento y Reparación de Hardware</a>
                                        <span class="info">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </span>
                                        <div class="hint-content do--split-children">
                                            <ul>
                                                <li>Diagnóstico, reparación y mantenimiento de computadores y sistemas
                                                    CCTV.</li>
                                                <li>Configuración y actualización de hardware especializado.</li>
                                                <li>Experiencia en impresoras multifuncionales y de consumo.</li>
                                            </ul>
                                        </div>
                                        <span class="hint-line"></span>

                                        <p>Mantenimiento de Hardware Empresarial</p>
                                    </div>
                                    <!-- End Single Service -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-section">
                    <div class="cardTools">
                        <h1>Herramientas de trabajo💪</h1>
                        <ul class="listTools">
                            <li class="itemTool" style="--accent-color:#172C73">
                                <div class="icon">
                                    <i class="fa-brands fa-php"></i>
                                    <div class="contentIcon">
                                        <div class="title">PHP</div>
                                        <div class="descr">
                                         <p class="text-wrap text-justify">Desarrollo dinámico desde v7 al v8.4 ampliamente soportado, ideal para todo tipo de aplicaciones web.</p>   
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#E56A9D">
                                <div class="icon">
                                    <img style="filter:invert(1);" src="{{asset('assets/img/PNG/livewire.png')}}" alt="Livewire">
                                    <div class="contentIcon">
                                        <div class="title">Livewire</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                                Implementación de reactividad con componentes para PHP, simplicidad, interacción directa con backend desde vistas.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#FF363C">
                                <div class="icon">
                                    <i class="fa-brands fa-laravel"></i>
                                    <div class="contentIcon">
                                        <div class="title">Laravel</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Rápido desarrollo de aplicaciones web y servicios API RESTFUL, Eloquent ORM, rutas, y seguridad.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#7A3398">
                                <div class="icon">
                                    <img  src="{{asset('assets/img/PNG/c.png')}}" alt="C#">
                                    <div class="contentIcon">
                                        <div class="title">C#</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Desarrollo versátil de aplicaciones .NET con rendimiento robusto
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#3A9BDC">
                                <div class="icon">
                                    <img  src="{{asset('assets/img/PNG/xamarin.png')}}" alt="C#">
                                    <div class="contentIcon">
                                        <div class="title">Xamarin</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Desarrollo de aplicaciones moviles multiplataforma, principalmente bajo Android.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#0009C8">
                                <div class="icon">
                                    <img  src="{{asset('assets/img/PNG/maui.png')}}" alt=".NETMaui">
                                    <div class="contentIcon">
                                        <div class="title">.NET MAUI</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Desarrollo de aplicaciones moviles modernas con UI nativo, sucesor de Xamarin.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#FF7816">
                                <div class="icon">
                                    <i class="fa-brands fa-html5"></i>
                                    <div class="contentIcon">
                                        <div class="title">HTML</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Maquetación de páginas WEB junto uso de frameworks como Tailwind y Bootstrap.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#f20071">
                                <div class="icon">
                                    <i class="fa-brands fa-sass"></i>
                                    <div class="contentIcon">
                                        <div class="title">SCSS & CSS3</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Personalización avanzada de experiencia de usuario, estilos responsivos y uso modular mediante preprocesadores de estilos.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#FBD709">
                                <div class="icon">
                                    <i class="fa-brands fa-js"></i>
                                    <div class="contentIcon">
                                        <div class="title">Javascript</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Desarrollo dinámico de scripting, interactividad de frontend cliente-servidor.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#196BAC">
                                <div class="icon">
                                    <img  src="{{asset('assets/img/PNG/jquery.png')}}" alt=".JQuery">
                                    <div class="contentIcon">
                                        <div class="title">JQuery</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Aplicación de libreria para el desarrollo de Selectores eficientes, animaciones y manipulacion del DOOM.
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#F0563A;">
                                <div class="icon">
                                    <img  src="{{asset('assets/img/PNG/git.png')}}" alt=".JQuery">
                                    <div class="contentIcon">
                                        <div class="title">Git</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Uso de sistema de control de versiones, uso de ramas para el desarrollo paralelo y en colaboración bajo metodologías de trabajo ágiles o tradicionales
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#994D7F">
                                <div class="icon">
                                    <i class="fa-brands fa-github"></i>
                                    <div class="contentIcon">
                                        <div class="title">Github & GitLab</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Manejo y uso de repositorios, integraciones CI/CD y trabajo colaborativo del código compartido.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#259FBF">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/mysqlcon.png')}}" alt="MYSQL">
                                    <div class="contentIcon">
                                        <div class="title">MYSQL</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Desarrollo escalable de consultas, vistas y procedimientos en base de datos relacionales, manejo de grandes volumenes de información y uso de herramientas como DBeaver, Heidy y phpmyadmin
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#FFBB0A">
                                <div class="icon">
                                    <i class="fa-solid fa-database"></i>
                                    <div class="contentIcon">
                                        <div class="title">SQL</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Desarrollo escalable de consultas, vistas y procedimientos en base de datos relacionales, manejo de grandes volumenes de información y uso de SMSS.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:linear-gradient(145deg, rgba(251,215,9,1) 30%, rgba(25,107,172,1) 60%);">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/python.png')}}" alt="Python">
                                    <div class="contentIcon">
                                        <div class="title">Python</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Desarrollo de algoritmos para análisis de datos por medio de librerías extensas para uso de IA
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#293036">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/terminal.png')}}" alt="Terminal & BASH">
                                    <div class="contentIcon">
                                        <div class="title">BASH & Terminal</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Scripts rápidos para manejo de servidores data, control de accesos, seguridad informatica y configuración de servidores.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#293036">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/windowsserver.png')}}" alt="Windos Server">
                                    <div class="contentIcon">
                                        <div class="title">Windows Server</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Configuración y despliege de servicios empresariales. Incluye el uso de herramientas como:
                                            </p>
                                            <ul style="sublist-tools">
                                                <li>Configuración de Active Directory (AD), GPO y ACL</li>
                                                <li>Administración de usuarios</li>
                                                <li>Configuración de servicios DNS & DCHP</li>
                                                <li>Configuración de servicios de red IIS</li>                                            
                                            </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#293036">
                                <div class="icon">
                                    <i class="fa-brands fa-linux"></i>
                                    <div class="contentIcon">
                                        <div class="title">Linux</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                            Configuración y manejo de distribuciones linux como:
                                            </p>
                                            <ul>
                                                <li>Ubuntu</li>
                                                <li>CentOS</li>
                                                <li>Debian</li>
                                                <li>RedHat</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:linear-gradient(90deg, rgba(240,86,58,1) 30%, rgba(145,212,100,1) 60%);">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/zentyal.png')}}" alt="Zentyal">
                                    <div class="contentIcon">
                                        <div class="title">Zentyal Servers</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                                Configuraciómn y administracion de Servidor todo en uno zentyal, incluye funciones como:
                                            </p>
                                            <ul>
                                                <li>Domain Controller and File Sharing</li>
                                                <li>LDAP Directory</li>
                                                <li>DNS Server</li>
                                                <li>DHCP Server</li>
                                                <li>Certification Authority (CA)</li>
                                                <li>VPN Server</li>
                                                <li>Firewall</li>
                                                <li>HTTP Proxy</li>
                                                <li>Mail Server</li>
                                                <li>Mail Filter</li>
                                                <li>PortFowarding</li>
                                                <li>IDS / IPS</li>
                                                <li>Network Configuration</li>
                                                <li>Backup</li>
                                              </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#08983F">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/nginx.png')}}" alt="Nginx">
                                    <div class="contentIcon">
                                        <div class="title">Nginx</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                                Configuración y despliege de servicios web, balanceo de carga y proxy inverso.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:linear-gradient(90deg, rgba(205,35,53,1) 30%, rgba(233,120,38,1) 60%);">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/apache.png')}}" alt="Apache Tomcat">
                                    <div class="contentIcon">
                                        <div class="title">Apache Tomcat</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                                Configuración y despliege de servicios web, balanceo de carga y vhost.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#08A3F1">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/glpi.png')}}" alt="Glpi Helpdesk">
                                    <div class="contentIcon">
                                        <div class="title">GLPI HelpDesk</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                                Configuración y administración de servicios de mesa de ayuda, inventario y gestión de activos incluye paraetrizacion de:
                                            </p>
                                            <ul>
                                                <li>Parametrización ITIL</li>
                                                <li>Acuerdos de Servicios (SLA)</li>
                                                <li>Reglas de escalamiento (OLA)</li>
                                                <li>Configuración de Agente de Inventario</li>
                                                <li>Personalización del Front-End Empresarial</li>
                                                <li>Plantillas de Tareas</li>
                                                <li>Plantillas de Notificaciones</li>
                                                <li>Configuracion de IMAP, OAUTH2 AZURE, SMTP para receptor de correos y notificaciones</li>
                                                <li>Configuración de Roles y Accesos</li>
                                                <li>Configuración de Entidades</li>
                                                <li>Configuración de Categorías ITIL</li>
                                                <li>Desarrollo de APIRESTFUL para despliege de aplicaciones MICRO</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#fff">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/office365.png')}}" alt="Nginx">
                                    <div class="contentIcon">
                                        <div class="title">Microsoft OFICE 365 Tenant</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                                Configuración y administración de servicios de Office 365 en la nube, incluye:
                                            </p>
                                            <ul>
                                                <li>Teams</li>
                                                <li>Sharepoint</li>
                                                <li>OneDrive</li>
                                                <li>Exchange Online</li>
                                                <li>Office Word, Excel, PowerPoint</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#fff">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/azure.png')}}" alt="Microsoft Azure">
                                    <div class="contentIcon">
                                        <div class="title">Microsoft Azure</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                                Configuración y administración de servicios IaaS en la nube de Microsoft ofreciendo soluciones integrales para infraestructura, desarrollo y administración de aplicaciones. 
                                                <br>
                                                Servicios destacados:
                                            </p>
                                            <ul>
                                                <li>Máquinas virtuales (VMware y Hyper-V)</li>
                                                <li>Firewall avanzado para seguridad de red</li>
                                                <li>Grupos de recursos compartidos</li>
                                                <li>Almacenamiento en la nube (Blob Storage, Disk Storage)</li>
                                                <li>Redes virtuales (VPN y ExpressRoute)</li>
                                                <li>Azure Active Directory</li>
                                                <li>Balanceadores de carga</li>
                                                <li>Base de datos administrada (SQL Database)</li>
                                                <li>Monitorización y análisis con Azure Monitor</li>
                                                <li>Automatización de tareas y gestión de identidades</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#fff">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/google_cloud.png')}}" alt="Google Cloud Platform">
                                    <div class="contentIcon">
                                        <div class="title">Google Cloud Platform</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                                Configuración y administración de servicios IaaS en la nube de Google para infraestructura, análisis de datos, desarrollo y más.
                                                <br>
                                                Servicios destacados:
                                            </p>
                                            <ul>
                                                <li>Máquinas virtuales con Compute Engine</li>
                                                <li>Almacenamiento escalable con Cloud Storage</li>
                                                <li>Kubernetes Engine para orquestación de contenedores</li>                                                                                               
                                                <li>VPC y Cloud VPN para redes virtuales seguras</li>
                                                <li>Gestión de identidades con IAM</li>                                                
                                                <li>Base de datos administrada (Cloud SQL, Firestore, Spanner)</li>
                                                <li>Monitorización y alertas con Cloud Monitoring</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#fff">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/aws.png')}}" alt="Amazon Web Services">
                                    <div class="contentIcon">
                                        <div class="title">Amazon Web Services</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                                Configuración y administración de servicios IaaS en la nube con soluciones robustas para empresas de cualquier tamaño. 
                                                <br>
                                                Servicios destacados:
                                            </p>
                                            <ul>
                                                <li>EC2 para máquinas virtuales escalables</li>
                                                <li>S3 para almacenamiento en la nube altamente duradero</li>
                                                <li>RDS y DynamoDB para bases de datos administradas</li>
                                                <li>Elastic Load Balancer para balanceo de carga</li>
                                                <li>CloudFront para entrega de contenido global</li>
                                                <li>VPC para redes privadas virtuales</li>
                                                <li>Lambda para computación sin servidor</li>                                                                                                                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#fff">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/cpanel.png')}}" alt="cPanel">
                                    <div class="contentIcon">
                                        <div class="title">cPanel</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                                Administración web de hosting y servidores haciendo labores como:
                                            </p>
                                            <ul>
                                                <li>Gestión de dominios y subdominios</li>
                                                <li>Configuración de cuentas de correo electrónico</li>
                                                <li>Gestión de bases de datos (MySQL)</li>
                                                <li>Administrador de archivos con acceso FTP</li>
                                                <li>Instalación rápida de aplicaciones con Softaculous</li>
                                                <li>Monitorización del uso de recursos (CPU, RAM, almacenamiento)</li>
                                                <li>Configuración de certificados SSL/TLS</li>
                                                <li>Gestión de DNS y zonas avanzadas</li>                                                
                                                <li>Backups automáticos y restauración</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="itemTool" style="--accent-color:#fff">
                                <div class="icon">
                                    <img src="{{asset('assets/img/PNG/postman.png')}}" alt="Postman">
                                    <div class="contentIcon">
                                        <div class="title">Postman</div>
                                        <div class="descr">
                                            <p class="text-wrap text-justify">
                                                Manejo de herramienta para probar y documentar APIs de manera eficiente.
                                            </p>
                                            <ul>
                                                <li>Diseño y prueba de solicitudes HTTP (GET, POST, PUT, DELETE, etc.)</li>                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
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
    <section class="item tabs-hidden" style="overflow:auto;" id="content-web">
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
    <section class="item tabs-hidden" style="overflow:auto;" id="content-desktop">
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
    <section class="item tabs-hidden" style="overflow:auto;" id="content-mobile">
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
@push('templateScripts')
    <script>
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
            } else if ($('#tab-4').is(':checked')) {
                $('#content-mobile').css({
                    opacity: 1,
                    visibility: 'visible'
                });
            }
        }
        document.addEventListener('sectionChanged', function(event) {
            setTimeout(() => {
                updateTabs();
            }, 1500);
        });
        // Manejar el cambio de estado de los radio buttons
        $(document).on('change', 'input[type="radio"]', function() {
            console.log("tab selected");
            updateTabs();
        });

        $(document).on('change', '.header-menu.tabs input', function() {
            $(this).next('label')[0].scrollIntoView({
                behavior: 'smooth',
                inline: 'center'
            });
        });
        $(document).ready(function() {
            // Inicializar el estado por defecto
            updateTabs();
        });
    </script>
@endpush
