<aside class="control-sidebar control-sidebar-dark">

    <div class="card-body box-profile">
        <div class="text-center">
            <img src="{{asset('images/user1-128x128.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
        </div>
        <h3 class="profile-username text-center">
            <a href="#" class="d-block ellipis">{{ userFullName() }}</a>
        </h3>
        <p class="text-muted text-center">{{getRolesName()}}</p>
        <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item"> 
             <a href="#" class="d-flex align-items-center">
                <i class="fa fa-lock pr-2"></i>Mot de passe
             </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="d-flex align-items-center">
                <i class="fa fa-user pr-2"></i>Mon Profile
             </a>
        </li> 
        <a class="btn btn-primary btn-block" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
        </div>
</aside>
