 <div class="quixnav">
     <div class="quixnav-scroll">
         <ul class="metismenu" id="menu">
             <li class="nav-label first">Menu utama</li>
             <li class="<?= ($menu_aktif == 'Dashboard') ? 'mm-active' : ''; ?>">
                 <a class="" href="<?= base_url('/'); ?>" aria-expanded="false"><i class="icon icon-home">
                     </i><span class="nav-text">Dashboard</span></a>
             </li>
             <?php 
             if (session()->get('role') == '2' || session()->get('role') == '1') :
             ?>
             <li class="nav-label">Master Data</li>
             <!-- <li class="<?= ($menu_aktif == 'Barang' || $menu_aktif == 'Layanan') ? 'mm-active' : ''; ?>"><a
                     class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                         class="icon icon-app-store"></i><span class="nav-text">Master Data</span></a>
                 <ul aria-expanded="false"
                     class="<?= ($menu_aktif == 'Barang' || $menu_aktif == 'Layanan') ? 'mm-show' : ''; ?>">
                     <li><a class="<?= ($menu_aktif == 'Barang') ? 'mm-active' : ''; ?>"
                             href="<?= base_url('Barang'); ?>">Master Barang</a></li>
                     <li><a class="<?= ($menu_aktif == 'Layanan') ? 'mm-active' : ''; ?>"
                             href="<?= base_url('Layanan'); ?>">Master Layanan</a></li>
                 </ul>
             </li> -->
             <li class="<?= ($menu_aktif == 'Barang') ? 'mm-active' : ''; ?>">
                 <a class="" href="<?= base_url('Barang'); ?>" aria-expanded="false"><i
                         class="icon icon-single-copy-06">
                     </i><span class="nav-text">Master Data Barang</span></a>
             </li>
             <li class="<?= ($menu_aktif == 'Layanan') ? 'mm-active' : ''; ?>">
                 <a class="" href="<?= base_url('Layanan'); ?>" aria-expanded="false"><i class="icon icon-app-store">
                     </i><span class="nav-text">Master Data Layanan</span></a>
             </li>
             <?php
                endif; 
                if( session()->get('role') == '2') :
            ?>
             <li class="nav-label">Transaksi</li>
             <li
                 class="<?= ($menu_aktif == 'transaksi_masuk' || $menu_aktif == 'transaksi_keluar') ? 'mm-active' : ''; ?>">
                 <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                         class="icon icon-credit-card"></i>
                     <span class="nav-text">Transaksi</span></a>
                 <ul aria-expanded="false"
                     class="<?= ($menu_aktif == 'transaksi_masuk' || $menu_aktif == 'transaksi_keluar') ? 'mm-show' : ''; ?>">
                     <li><a class="<?= ($menu_aktif == 'transaksi_masuk') ? 'mm-active' : ''; ?>"
                             href="<?= base_url('Transaksi/Masuk'); ?>">Transaksi Masuk</a></li>

                 </ul>
             </li>
             <?php 
                endif; 
                if (session()->get('role') == '4') :
             ?>
             <li class="nav-label">Master</li>
             <li
                 class="<?= ($menu_aktif == 'transaksi_masuk' || $menu_aktif == 'transaksi_keluar') ? 'mm-active' : ''; ?>">
                 <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                         class="icon icon-credit-card"></i>
                     <span class="nav-text">Transaksi</span></a>
                 <ul aria-expanded="false"
                     class="<?= ($menu_aktif == 'transaksi_masuk' || $menu_aktif == 'transaksi_keluar') ? 'mm-show' : ''; ?>">

                     <li><a class="<?= ($menu_aktif == 'transaksi_keluar') ? 'mm-active' : ''; ?>"
                             href="<?= base_url('Transaksi/Keluar'); ?>">Transaksi Keluar</a></li>
                 </ul>
             </li>
             <li class="<?= ($menu_aktif == 'Order' || $menu_aktif == 'Tambah Orderan') ? 'mm-active' : ''; ?>"><a
                     href="<?= base_url('Order'); ?>" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span
                         class="nav-text">Pemesanan</span></a>
             </li>
             <li class="<?= ($menu_aktif == 'Users') ? 'mm-active' : ''; ?>"><a href="<?= base_url('Users'); ?>"
                     aria-expanded="false"><i class="fa fa-user"></i><span class="nav-text">Users</span></a></li>
             <?php
                endif; 
                if (session()->get('role') == '1') :
            ?>
             <li class="<?= ($menu_aktif == 'Users') ? 'mm-active' : ''; ?>"><a href="<?= base_url('Users'); ?>"
                     aria-expanded="false"><i class="fa fa-user"></i><span class="nav-text">Users</span></a></li>
             <?php 
                endif; 
                if (session()->get('role') == '1') :
            ?>
             <li class="nav-label">Master Laporan</li>
             <li
                 class="<?= ($menu_aktif == 'laporan_transaksi' || $menu_aktif == 'laporan_orderan') ? 'mm-active' : ''; ?>">
                 <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-chart-bar-33">

                     </i><span class="nav-text">Laporan</span></a>
                 <ul aria-expanded="false"
                     class="<?= ($menu_aktif == 'laporan_transaksi' || $menu_aktif == 'laporan_orderan') ? 'mm-show' : ''; ?>">
                     <li><a class="<?= ($menu_aktif == 'laporan_transaksi') ? 'mm-active' : ''; ?>"
                             href="<?= base_url('Laporan/Transaksi'); ?>">Laporan Transaksi</a></li>
                     <li><a class="<?= ($menu_aktif == 'laporan_orderan') ? 'mm-active' : ''; ?>"
                             href="<?= base_url('Laporan/Orderan'); ?>">Laporan Pemesanan</a></li>
                 </ul>
             </li>
             <?php 
                endif; 
            ?>
         </ul>
     </div>


 </div>