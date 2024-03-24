
   <header>
    <div class="logo" title="University Management System">

        <h2>I<span class="danger">S</span>GI</h2>
    </div>
    <div class="navbar">
        <a href="index.html" class="active">
            <span class="material-icons-sharp">home</span>
            <h3>Home</h3>
        </a>
        <a href="{{ route('emploi.fourmateur') }}">
            <span class="material-icons-sharp">today</span>


        </a>

        <a href="#">
            <span class="material-icons-sharp">grid_view</span>
            <h3>Profile</h3>
        </a>

        <a href="#" onclick="document.getElementById('logoutForm').submit();">
            <span class="material-icons-sharp">logout</span>
            <h3>Logout</h3>
        </a>

        <form style="display: none" id="logoutForm" method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger">Déconnexion</button>
        </form>




    </div>
    <div id="profile-btn">
        <span class="material-icons-sharp">person</span>
    </div>
    <div class="theme-toggler">
        <span class="material-icons-sharp active">light_mode</span>
        <span class="material-icons-sharp">dark_mode</span>
    </div>

</header>

    <div class="change-password-container">
        <form action="">
            <h2>Create new password</h2>
            <p class="text-muted">Your new password must be different from previous used passwords.</p>
            <div class="box">
                <p class="text-muted">Current Password</p>
                <input type="password" id="currentpass">
            </div>
            <div class="box">
                <p class="text-muted">New Password</p>
                <input type="password" id="newpass">
            </div>
            <div class="box">
                <p class="text-muted">Confirm Password</p>
                <input type="password" id="confirmpass">
            </div>
            <div class="button">
                <input type="submit" value="Save" class="btn">
                <a href="index.html" class="text-muted">Cancel</a>
            </div>
            <a href="#"><p>Forget password?</p></a>
        </form>    
    </div>


<script src="{{ asset('style/fourmateurDshboard/app.js') }}"></script>
