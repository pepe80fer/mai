<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('assets/img/profile.jpg') }}">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        Catica
                        <span class="user-level">Administrador</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ Route('home') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                    <span class="badge badge-count">5</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#collapseCategorias">
                    <i class="la la-tags"></i>
                    <p>Categorias</p>
                    <span class="caret"></span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseCategorias" aria-expanded="true" style="">
                    <ul class="collapseCategorias">
                        <li data-tag="categoriasglobales" class="nav-item {{ active('admin/categoriasglobales') }}">
                            <a href="{{ Route('categoriasglobales.index') }}">
                                <i class="la la-tag"></i>
                                <p>Globales</p>
                            </a>
                        </li>
                        <li data-tag="categorias" class="nav-item {{ active('admin/categorias') }}">
                            <a href="{{ Route('categorias.index') }}">
                                <i class="la la-tag"></i>
                                <span class="link-collapse">Específicas</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#collapseproductos">
                    <i class="la flaticon-open-box"></i>
                    <p>Productos</p>
                    <span class="caret"></span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseproductos" aria-expanded="true" style="">
                    <ul class="">
                        <li data-tag="tallas" class="nav-item {{ active('admin/tallas') }}">
                            <a href="{{ Route('tallas.index') }}">
                                <i class="la flaticon-shirts"></i>
                                <p>Tallas</p>
                            </a>
                        </li>
                        <li data-tag="referencias" class="nav-item {{ active('admin/referencias') }}">
                            <a href="{{ Route('referencias.index') }}">
                                <i class="la la-list-alt"></i>
                                <p>Referencias</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li data-tag="clientes" class="nav-item {{ active('admin/clientes') }}">
                <a href="{{ Route('clientes.index') }}">
                    <i class="la la-users"></i>
                    <p>Clientes</p>
                </a>
            </li>
            <li data-tag="proveedores" class="nav-item {{ active('admin/proveedores') }}">
                <a href="{{ Route('proveedores.index') }}">
                    <i class="la la-industry"></i>
                    <p>Proveedores</p>
                </a>
            </li>
            <li data-tag="obligaciones" class="nav-item {{ active('admin/obligaciones') }}">
                <a href="{{ Route('obligaciones.index') }}">
                    <i class="la la-money"></i>
                    <p>Obligaciones</p>
                </a>
            </li>
            <li data-tag="gastos" class="nav-item {{ active('admin/gastos') }}">
                <a href="{{ Route('gastos.index') }}">
                    <i class="la flaticon-coins"></i>
                    <p>Gastos</p>
                </a>
            </li>
            
            <li data-tag="pagar" class="nav-item {{ active('pagar') }}">
                <a href="{{ Route('pagar') }}">
                    <i class="la la-cc-visa"></i>
                    <p>Pagar</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="notifications.html">
                    <i class="la la-bell"></i>
                    <p>Notifications</p>
                    <span class="badge badge-success">3</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="typography.html">
                    <i class="la la-font"></i>
                    <p>Typography</p>
                    <span class="badge badge-danger">25</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="icons.html">
                    <i class="la la-fonticons"></i>
                    <p>Icons</p>
                </a>
            </li>
        </ul>
    </div>
</div>