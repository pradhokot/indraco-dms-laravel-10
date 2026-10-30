@php
    $currentRole = $role ?? request('role', 'departemen');
    $deptName = $department ?? request('dept', 'FAT [Finance, Accounting, and Tax]');

    $roleLabels = [
        'admin' => ['title' => 'SUPER ADMIN', 'sub' => 'IT & Sistem Manajemen'],
        'gudang' => ['title' => 'ADMIN GUDANG', 'sub' => 'Unit Penyimpanan & Arsip'],
        'departemen' => ['title' => 'DEPARTEMEN', 'sub' => $deptName],
    ];

    $activeInfo = $roleLabels[$currentRole] ?? $roleLabels['departemen'];
@endphp

<header class="app-header py-2 bg-primary-subtle border-bottom">
   <div class="app-header-container container-fluid d-grid column-gap-3 align-items-center"
      style="grid-template-columns: auto 1fr auto;">
      
      <x-brand-logo size="sm" />

      <div>
         <div class="dropdown mx-auto" style="max-width: 480px;">
            <label for="app-search" class="visually-hidden">pencarian dokumen</label>
            <form role="search" aria-label="Pencarian dokumen" class="input-group" data-bs-toggle="dropdown"
               data-bs-target="#dropdown-search">
               <span class="input-group-text rounded-start-1">
                  <i class="bi bi-search" aria-hidden="true"></i>
               </span>
               <input type="search" name="app-search" id="app-search" class="form-control rounded-end-1"
                  placeholder="Cari Dokumen (Ketik nomor / nama arsip)...">
            </form>
            <div id="dropdown-search" class="dropdown-menu w-100 rounded-1 shadow p-3">
               <div class="small text-muted mb-2"><i class="bi bi-clock-history"></i> Pencarian Terakhir:</div>
               <div class="list-group list-group-flush small">
                  <a href="#" class="list-group-item list-group-item-action py-1 px-2 border-0">INV/2026/09/FAT-001</a>
                  <a href="#" class="list-group-item list-group-item-action py-1 px-2 border-0">Arsip Pajak Tahunan 2025</a>
               </div>
            </div>
         </div><!-- end search dropdown -->
      </div>

      <div class="d-flex align-items-center gap-2">

         <!-- Role & Department Identifier -->
         <div class="text-end lh-1">
            <div class="fw-bold text-uppercase text-primary">{{ $activeInfo['title'] }}</div>
            <div class="small d-none d-xxl-inline text-capitalize text-body-secondary">{{ $activeInfo['sub'] }}</div>
         </div>

         <div class="vr"></div>

         <!-- Reusable Utility Buttons (Theme, Refresh, Fullscreen) -->
         <x-utility-buttons size="sm" />

         <a href="{{ url('/login') }}" class="btn btn-danger rounded-1 btn-sm" title="Keluar Akun">
            <i class="bi bi-box-arrow-right" aria-hidden="true"></i> LOGOUT
         </a>

      </div>
   </div><!-- end app header container -->
</header><!-- end app header -->
