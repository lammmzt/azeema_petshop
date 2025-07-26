<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

use App\Filters\filterAdmin;
use App\Filters\filterKasir;
use App\Filters\filterOwner;
use App\Filters\Middleware;
use App\Filters\filterUser;
class Filters extends BaseFilters
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, class-string|list<class-string>>
     *
     * [filter_name => classname]
     * or [filter_name => [classname1, classname2, ...]]
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'filterAdmin'   => filterAdmin::class,
        'Middleware'    => Middleware::class,
        'filterUser'    => filterUser::class,
        'filterKasir'   => filterKasir::class,
        'filterOwner'  => filterOwner::class,
    ];

    /**
     * List of special required filters.
     *
     * The filters listed here are special. They are applied before and after
     * other kinds of filters, and always applied even if a route does not exist.
     *
     * Filters set by default provide framework functionality. If removed,
     * those functions will no longer work.
     *
     * @see https://codeigniter.com/user_guide/incoming/filters.html#provided-filters
     *
     * @var array{before: list<string>, after: list<string>}
     */
    public array $required = [
        'before' => [
            'forcehttps', // Force Global Secure Requests
            'pagecache',  // Web Page Caching
        ],
        'after' => [
            'pagecache',   // Web Page Caching
            'performance', // Performance Metrics
            'toolbar',     // Debug Toolbar
        ],
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, list<string>>
     */
    public array $globals = [
         'before' => [
            'Middleware' => ['except' => ['Auth','Auth/*', 'LandingPage',]],
        ],
        'after' => [
            'filterAdmin' => ['except' => [ 
                '/', 'Auth/logout','Auth/login','Auth/Register','Barang', 'Barang/*', 'Dashboard', 'Dashboard/*',
                'Home', 'Home/*', 'Layanan', 'Layanan/*', 'TipeBarang', 'TipeBarang/*', 'Transaksi/Masuk','Transaksi/tambah_transaksi_masuk', 'Transaksi/simpan_transaksi_masuk', 'Laporan/Transaksi', 'Laporan/StokBarang', 'Laporan/cetak_transaksi/*', 'Laporan/cetak_stok_barang', 'Laporan/cetak_stok_barang/*'
            ]],
            'filterKasir' => ['except' => [ 
                '/', 'Auth/logout','Auth/login','Auth/Register', 'Dashboard', 'Dashboard/*',
                'Home', 'Home/*', 'Order', 'Order/*', 'Transaksi/Keluar','Transaksi/tambah_transaksi_keluar', 'Transaksi/simpan_transaksi_keluar',  'Transaksi/print_struk', 'Transaksi/print_struk/*', 'Users', 'Users/reset_password', 'Users/Update', 'Users/Simpan', 'Laporan/Transaksi', 'Laporan/Orderan', 'Laporan/cetak_transaksi/*', 'Laporan/cetak_orderan/*', 'LandingPage/saveCheckout',
            ]],
            'filterOwner' => ['except' => [ 
                '/', 'Auth/logout','Auth/login','Auth/Register','Barang', 'Barang/*', 'Dashboard', 'Dashboard/*',
                'Home', 'Home/*', 'Layanan', 'Layanan/*', 'TipeBarang', 'TipeBarang/*', 'Users', 'Users/*', 'Laporan/', 'Laporan/*'
            ]],
            'filterUser' => ['except' => ['Auth/logout',
                'LandingPage', 'LandingPage/*', 
            ]],

        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'POST' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     *
     * @var array<string, list<string>>
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array<string, array<string, list<string>>>
     */
    public array $filters = [];
}