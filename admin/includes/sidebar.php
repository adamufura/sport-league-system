<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="index.php"><img class="logo-icon me-2" src="assets/images/logo.png" alt="logo" /><span class="logo-text">SLS Admin</span></a>
        </div>
        <!--//app-branding-->

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link active" href="index.php">
                        <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Overview</span> </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
  <li class="nav-item has-submenu">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
                        <span class="nav-icon">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <span class="mdi mdi-school"></span>
                        </span>
                        <span class="nav-link-text">Teams (Club)</span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg> </span>
                        <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item">
                                <a class="submenu-link" href="add_team.php">Add Team</a>
                            </li>
                            <li class="submenu-item">
                                <a class="submenu-link" href="manage_teams.php">Manage Teams</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--//nav-item-->
                <li class="nav-item has-submenu">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                        <span class="nav-icon">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <span class="mdi mdi-account-tie-outline mdi-px"></span>
                        </span>
                        <span class="nav-link-text">Players</span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg> </span>
                        <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item">
                                <a class="submenu-link" href="add_player.php">Add Player</a>
                            </li>
                            <li class="submenu-item">
                                <a class="submenu-link" href="manage_players.php">Manage Players</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--//nav-item-->
                <!--//nav-item-->
                    <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="fixtures.php">
                        <span class="nav-icon">
                            <span class="mdi mdi-football"></span>
                        </span>
                        <span class="nav-link-text">Fixtures</span> </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
                <!--//nav-item-->
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="contactus.php">
                        <span class="nav-icon">
                            <span class="mdi mdi-phone-outline"></span>
                        </span>
                        <span class="nav-link-text">Contacts</span> </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="settings.php">
                        <span class="nav-icon">
                            <span class="mdi mdi-cog-outline"></span>
                        </span>
                        <span class="nav-link-text">Settings</span> </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
            </ul>
            <!--//app-menu-->
        </nav>
        <!--//app-nav-->
        <div class="app-sidepanel-footer">
            <nav class="app-nav app-nav-footer">
                <ul class="app-menu footer-menu list-unstyled">
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link" href="logout.php">
                            <i class="mdi mdi-logout"></i>
                            <span class="nav-link-text">Log Out</span> </a>
                        <!--//nav-link-->
                    </li>
                    <!--//nav-item-->
                </ul>
                <!--//footer-menu-->
            </nav>
        </div>
        <!--//app-sidepanel-footer-->
    </div>
    <!--//sidepanel-inner-->
</div>