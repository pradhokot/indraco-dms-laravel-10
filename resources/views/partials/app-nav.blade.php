@php
    $currentRole = $role ?? request('role', 'departemen');

    // Definisi menu navigasi per peran (Role-based Navigation)
    $allMenus = [
        [
            'id' => 'dashboard',
            'label' => 'beranda',
            'icon' => 'bi-house-fill',
            'route' => url('/dashboard?role=' . $currentRole),
            'roles' => ['admin', 'gudang', 'departemen'],
        ],
        [
            'id' => 'pengajuan-simpan',
            'label' => 'pengajuan simpan',
            'icon' => 'bi-box-arrow-in-down',
            'route' => '#',
            'roles' => ['admin', 'gudang', 'departemen'],
        ],
        [
            'id' => 'pengajuan-tarik',
            'label' => 'pengajuan tarik',
            'icon' => 'bi-box-arrow-up',
            'route' => '#',
            'roles' => ['admin', 'gudang', 'departemen'],
        ],
        [
            'id' => 'pengajuan-perpanjang',
            'label' => 'pengajuan perpanjang',
            'icon' => 'bi-calendar-plus',
            'route' => '#',
            'roles' => ['admin', 'gudang', 'departemen'],
        ],
        [
            'id' => 'pengajuan-pemusnahan',
            'label' => 'pengajuan pemusnahan',
            'icon' => 'bi-trash3',
            'route' => '#',
            'roles' => ['admin', 'gudang', 'departemen'],
        ],
        [
            'id' => 'inventaris',
            'label' => 'inventaris dokumen',
            'icon' => 'bi-archive',
            'roles' => ['admin', 'gudang', 'departemen'],
            'route' => '#',
        ],
        [
            'id' => 'log-riwayat',
            'label' => 'audit trail & log/ riwayat dokumen',
            'icon' => 'bi-clock-history',
            'roles' => ['admin', 'gudang', 'departemen'],
            'route' => '#',
        ],
        [
            'id' => 'denah-gudang',
            'label' => 'denah 2D gudang',
            'icon' => 'bi-grid-3x3',
            'roles' => ['admin', 'gudang'], // Khusus admin & admin gudang
            'route' => '#',
        ],
        [
            'id' => 'manajemen-akun',
            'label' => 'manajemen akun',
            'icon' => 'bi-people',
            'roles' => ['admin'], // Khusus super admin
            'route' => '#',
        ],
    ];

    $filteredMenus = array_filter($allMenus, fn($menu) => in_array($currentRole, $menu['roles']));
@endphp

<style>
   #app-nav .nav-link {
      color: color-mix(in srgb, currentColor 70%, transparent);

      &:hover,
      &:focus-within {
         background-color: var(--bs-primary-bg-subtle);
         color: color-mix(in srgb, currentColor 100%, transparent);
      }

      &.active {
         color: white;
      }
   }
</style>

<nav aria-label="navigasi utama" id="app-nav" class="bg-primary-subtle bg-gradient border-bottom shadow">
   <ul class="nav nav-pills flex-nowrap text-nowrap overflow-y-hidden overflow-x-auto text-capitalize fw-semibold">
      @foreach ($filteredMenus as $index => $item)
         <li class="nav-item border-end {{ $item['id'] === 'dashboard' ? 'position-sticky start-0 bg-primary-subtle bg-gradient z-1' : '' }}">
            <a href="{{ $item['route'] }}" class="nav-link rounded-0 {{ $index === 0 ? 'active' : '' }}" {{ $index === 0 ? 'aria-current="page"' : '' }}>
               @if (!empty($item['icon']))
                  <i class="bi {{ $item['icon'] }}" aria-hidden="true"></i>
               @endif
               <span class="{{ $item['id'] === 'dashboard' ? 'visually-hidden' : '' }}">{{ $item['label'] }}</span>
            </a>
         </li>
      @endforeach
   </ul>
</nav><!-- end app nav -->
