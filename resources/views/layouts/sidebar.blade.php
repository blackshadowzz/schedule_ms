<aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
       <img src="/assets/images/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
       <span class="brand-text font-weight-light">Employee MS</span>
     </a>
 
     <!-- Sidebar -->
     <div class="sidebar">
       <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
           <img src="/assets/images/admin.jpg" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
           <a href="" class="d-block">{{ Auth::user()->name }}</a>
         </div>
       </div>
 
 
       <!-- Sidebar Menu -->
       <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
           <li class="nav-item">
             <a href="/home" class="nav-link">
               <i class="nav-icon bi bi-grid-1x2-fill"></i>
               <p class="">
                 Dashboard
                 <i class=""></i>
               </p>
             </a>
 
           </li>
           <li class="nav-item">
             <a href="/employees" class="nav-link">
               <i class="nav-icon bi bi-people-fill"></i>
               <p>
                 Employee
                 <span class="right badge badge-danger"></span>
               </p>
             </a>
           </li>
         </ul>
       </nav>
       <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
</aside>