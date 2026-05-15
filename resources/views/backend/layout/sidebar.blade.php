 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
         <div class="sidebar-brand-icon">
             <i class="fas fa-shield-alt"></i>
         </div>
         <div class="sidebar-brand-text mx-3">NDPC Admin</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item  {{ Route::is('dashboard.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('dashboard.index') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">
     <li class="nav-item {{ Route::is('menu.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('menu.index') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Menu</span></a>
     </li>
     @can('Banner-View')
         <li class="nav-item {{ Route::is('banner.*') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('banner.index') }}">
                 <i class="fas fa-fw fa-chart-area"></i>
                 <span>Banner</span></a>
         </li>
     @endcan
     <li class="nav-item {{ Route::is('about.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('about.index') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>About Us</span></a>
     </li>
     <li class="nav-item {{ Route::is('mvg.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('mvg.index') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>M V G</span></a>
     </li>
     <li class="nav-item {{ Route::is('darkbanner.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('darkbanner.index') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Dark Banner</span></a>
     </li>
     <li class="nav-item {{ Route::is('blog.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('blog.index') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Blogs</span></a>
     </li>
     <li class="nav-item {{ Route::is('company_goals.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('company_goals.index') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Company Goals</span></a>
     </li>
     <li class="nav-item {{ Route::is('testimonials.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('testimonials.index') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Testimonials</span></a>
     </li>
     <li class="nav-item {{ Route::is('employee-quarters.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('employee-quarters.index') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Employee Quarters</span></a>
     </li>
     <li class="nav-item {{ Route::is('ourProduct.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('ourProduct.index') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Our Product</span></a>
     </li>
     <li class="nav-item {{ Route::is('services.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('services.index') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Services offer</span></a>
     </li>
     <li class="nav-item {{ Route::is('features.*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('features.index') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Features offer</span></a>
     </li>
 

     <li class="nav-item {{ Route::is('recruitment-results.*') || Route::is('vacancy.*') ? 'active' : '' }}">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVacancy"
             aria-expanded="true" aria-controls="collapseVacancy">
             <i class="fas fa-fw fa-cog"></i>
             <span>Vacancy & Recruitment</span></a>
         </a>
         <div id="collapseVacancy" class="collapse" aria-labelledby="headingVacancy" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('recruitment-results.index') }}">Recruitment Results</a>
                 <a class="collapse-item" href="{{ route('vacancy.index') }}">Vacancy</a>
             </div>
         </div>
     </li>
     
     <li class="nav-item {{ Route::is('notices.*') || Route::is('report.*') ? 'active' : '' }}">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNotice"
             aria-expanded="true" aria-controls="collapseNotice">
             <i class="fas fa-fw fa-cog"></i>
             <span>Notices</span></a>
         </a>
         <div id="collapseNotice" class="collapse" aria-labelledby="headingNotice" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('notices.index') }}">Our Notices</a>
                 <a class="collapse-item" href="{{ route('report.index') }}">Reports Download</a>
             </div>
         </div>
     </li>
     <li
         class="nav-item {{ Route::is('technology-solution-categories.*') || Route::is('technology-solution-items.*') ? 'active' : '' }}">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTs"
             aria-expanded="true" aria-controls="collapseTs">
             <i class="fas fa-fw fa-cog"></i>
             <span>Technology Solutions</span></a>
         </a>
         <div id="collapseTs" class="collapse" aria-labelledby="headingTs" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">

                 <a class="collapse-item" href="{{ route('technology-solution-categories.index') }}">Category</a>
                 <a class="collapse-item" href="{{ route('technology-solution-items.index') }}">Items</a>
             </div>
         </div>
     </li>

     <li class="nav-item {{ Route::is('galleries.*') || Route::is('albums.*') ? 'active' : '' }}">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAG"
             aria-expanded="true" aria-controls="collapseAG">
             <i class="fas fa-fw fa-cog"></i>
             <span>Gallery</span></a>
         </a>
         <div id="collapseAG" class="collapse" aria-labelledby="headingAG" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">

                 <a class="collapse-item" href="{{ route('albums.index') }}">Album</a>
                 <a class="collapse-item" href="{{ route('galleries.index') }}">Gallery</a>
             </div>
         </div>
     </li>
     <li class="nav-item {{ Route::is('boardOfDirectors.*') || Route::is('leadingTeams.*') ? 'active' : '' }}">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeam"
             aria-expanded="true" aria-controls="collapseTeam">
             <i class="fas fa-fw fa-cog"></i>
             <span>Team Member</span></a>
         </a>
         <div id="collapseTeam" class="collapse" aria-labelledby="headingTeam" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">

                 <a class="collapse-item" href="{{ route('leadingTeams.index') }}">Leading Team</a>
                 <a class="collapse-item" href="{{ route('boardOfDirectors.index') }}">Board of Director</a>
             </div>
         </div>
     </li>
     <li class="nav-item {{ Route::is('roles.*') || Route::is('users.*') ? 'active' : '' }}">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles"
             aria-expanded="true" aria-controls="collapseRoles">
             <i class="fas fa-fw fa-cog"></i>
             <span>User Management</span></a>
         </a>
         <div id="collapseRoles" class="collapse" aria-labelledby="headingRoles" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">

                 <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
                 <a class="collapse-item" href="{{ route('users.index') }}">User</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>



 </ul>
