 <!--**********************************
      Sidebar start
  ***********************************-->
 <div class="dlabnav">
   <div class="dlabnav-scroll">
     <ul class="metismenu" id="menu">
       <li data-parent><!-- mm-active -->
         <a class="has-arrow" href="javascript:void()" aria-expanded="false">
           <i class="fa-solid fa-id-card"></i>
           <span class="nav-text">Tarjetas</span>
         </a>
         <ul aria-expanded="false">
           <li>
             <a href="<?= URL::to("/admin/proformas/view_registro") ?>" class="btnSidebar" id="registroSide">Registro</a>
           </li>
           <li>
             <a href="<?= URL::to("/admin/proformas/view_historial") ?>" class="btnSidebar" id="historialSide">Consultas</a>
           </li>
         </ul>
       </li>
       <?php if (SessionManager::get("userGlobal")["rol"] === "ADMINISTRADOR") : ?>
         <li data-parent><!-- mm-active -->
           <a class="has-arrow" href="javascript:void()" aria-expanded="false">
             <i class="fa-solid fa-user"></i>
             <span class="nav-text">Usuarios</span>
           </a>
           <ul aria-expanded="false">
             <li>
               <a href="<?= URL::to("/admin/usuarios/view_registro") ?>" class="btnSidebar" id="registroUsuariosSide">Registro</a>
             </li>
             <li>
               <a href="<?= URL::to("/admin/usuarios/view_historial") ?>" class="btnSidebar" id="historialUsuariosSide">Consultas</a>
             </li>
           </ul>
         </li>
       <?php endif ?>
     </ul>
   </div>
 </div>
 <!--**********************************
            Sidebar end
        ***********************************-->