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
<div class="container">
    <aside>
        <div class="profile">
            <div class="top">
                <div class="profile-photo">
                    <img src="./images/profile-1.jpg" alt="">
                </div>
                <div class="info">
                    <p>Bienvenue, {{ $user->nom }} </p>
                    <small class="text-muted">{{ $user->matricule }}</small>
                </div>
            </div>
            <div class="about">
                <a href="{{ route('updatePSW.fourmateur', ['id' => $user->id]) }}">
                    <h5>Update Password</h5>
                </a>
            </div>
            {{--
                    <div class="about">
                    <h5>DOB</h5>
                    <p>29-Feb-2020</p>
                    <h5>Contact</h5>
                    <p>1234567890</p>
                    <h5>Email</h5>
                    <p>unknown@gmail.com</p>
                    <h5>Address</h5>
                    <p>Ghost town Road, New York, America</p>
                </div>  --}}

        </div>
    </aside>

    <main>
        <div class="timetable" id="timetable">
            <div>
                <span id="prevDay">&lt;</span>
                <h2>Avencement</h2>
                <span id="nextDay">&gt;</span>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Room No.</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </main>

    <div class="right">
        <div class="announcements">
            <h2>Announcements</h2>
            <div class="updates">
                <div class="message">
                    <p> <b>Academic</b> Summer training internship with Live Projects.</p>
                    <small class="text-muted">2 Minutes Ago</small>
                </div>
                <div class="message">
                    <p> <b>Co-curricular</b> Global internship oportunity by Student organization.</p>
                    <small class="text-muted">10 Minutes Ago</small>
                </div>
                <div class="message">
                    <p> <b>Examination</b> Instructions for Mid Term Examination.</p>
                    <small class="text-muted">Yesterday</small>
                </div>
            </div>
        </div>

        

    </div>
</div>


<script src="{{ asset('style/fourmateurDshboard/app.js') }}"></script>
