<div class="br-header-right">
        <nav class="nav">
       
      

          <!-- opcion usuario -->
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down">{{ Auth::User()->name }}</span>
              <img src="https://via.placeholder.com/500" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>

            
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="tx-center">
                <a href=""><img src="https://via.placeholder.com/500" class="wd-80 rounded-circle" alt=""></a>
                <h6 class="logged-fullname"></h6>
                <p>{{ Auth::User()->email }}</p>
              </div>
              <hr>
              {{-- <div class="tx-center">
                <span class="profile-earning-label">Earnings After Taxes</span>
                <h3 class="profile-earning-amount">$13,230 <i class="icon ion-ios-arrow-thin-up tx-success"></i></h3>
                <span class="profile-earning-text">Based on list price.</span>
              </div> --}}
              <hr>
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person"></i> Editar Perfil</a></li>
                {{-- <li><a href=""><i class="icon ion-ios-gear"></i> Configuracion</a></li>
                <li><a href=""><i class="icon ion-ios-download"></i> Descargas</a></li>
                <li><a href=""><i class="icon ion-ios-star"></i> Favoritos</a></li>
                <li><a href=""><i class="icon ion-ios-folder"></i> Collecciones</a></li> --}}
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Cerrar Sesion</a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                 </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>

      </div><!-- br-header-right -->