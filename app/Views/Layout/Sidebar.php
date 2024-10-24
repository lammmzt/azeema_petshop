 <div class="quixnav">
     <div class="quixnav-scroll">
         <ul class="metismenu" id="menu">
             <li class="nav-label first">Menu utama</li>
             <li class="<?= ($menu_aktif == 'Dashboard') ? 'mm-active' : ''; ?>">
                 <a class="" href="<?= base_url('/'); ?>" aria-expanded="false"><i class="icon icon-home">
                     </i><span class="nav-text">Dashboard</span></a>
             </li>
             <li class="nav-label">Master Data</li>
             <li class="<?= ($menu_aktif == 'Barang' || $menu_aktif == 'Layanan') ? 'mm-active' : ''; ?>"><a
                     class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                         class="icon icon-app-store"></i><span class="nav-text">Master Data</span></a>
                 <ul aria-expanded="false"
                     class="<?= ($menu_aktif == 'Barang' || $menu_aktif == 'Layanan') ? 'mm-show' : ''; ?>">
                     <li><a class="<?= ($menu_aktif == 'Barang') ? 'mm-active' : ''; ?>"
                             href="<?= base_url('Barang'); ?>">Master Barang</a></li>
                     <li><a class="<?= ($menu_aktif == 'Layanan') ? 'mm-active' : ''; ?>"
                             href="<?= base_url('Layanan'); ?>">Master Layanan</a></li>
                 </ul>
             </li>
             <li class="nav-label">Master Admin</li>
             <li
                 class="<?= ($menu_aktif == 'transaksi_masuk' || $menu_aktif == 'transaksi_keluar') ? 'mm-active' : ''; ?>">
                 <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                         class="icon icon-credit-card"></i>
                     <span class="nav-text">Transaksi</span></a>
                 <ul aria-expanded="false"
                     class="<?= ($menu_aktif == 'transaksi_masuk' || $menu_aktif == 'transaksi_keluar') ? 'mm-show' : ''; ?>">
                     <li><a class="<?= ($menu_aktif == 'transaksi_masuk') ? 'mm-active' : ''; ?>"
                             href="<?= base_url('Transaksi/Masuk'); ?>">Transaksi Masuk</a></li>
                     <li><a class="<?= ($menu_aktif == 'transaksi_keluar') ? 'mm-active' : ''; ?>"
                             href="<?= base_url('Transaksi/Keluar'); ?>">Transaksi Keluar</a></li>
                 </ul>
             </li>
             <li class="<?= ($menu_aktif == 'Order') ? 'mm-active' : ''; ?>"><a href="<?= base_url('Order'); ?>"
                     aria-expanded="false"><i class="fa fa-shopping-cart"></i><span class="nav-text">Order</span></a>
             </li>
             <li class="<?= ($menu_aktif == 'Users') ? 'mm-active' : ''; ?>"><a href="<?= base_url('Users'); ?>"
                     aria-expanded="false"><i class="fa fa-user"></i><span class="nav-text">Users</span></a></li>

         </ul>
     </div>


 </div>