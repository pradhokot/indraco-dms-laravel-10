@php
    $fromRole = request('from_role', request('role', 'departemen'));
    $fromDept = request('from_dept', request('dept', 'FAT [Finance, Accounting, and Tax]'));

    $roleLabels = [
        'admin' => ['title' => 'SUPER ADMIN', 'sub' => '[IT & Sistem Manajemen]'],
        'gudang' => ['title' => 'ADMIN GUDANG', 'sub' => '[Unit Penyimpanan & Arsip]'],
        'departemen' => ['title' => 'DEPARTEMEN', 'sub' => '[' . $fromDept . ']'],
    ];

    $activeInfo = $roleLabels[$fromRole] ?? $roleLabels['departemen'];
@endphp

@extends('layouts.auth')

@section('title', 'Login - INDRACO Document Management System')

@section('content')
<main
   class="card-login bg-body rounded border overflow-hidden shadow vstack position-absolute top-50 start-50 translate-middle z-1"
   style="width: 420px; max-height: calc(100% - 60px);">

   <header class="card-login-header p-3 text-center bg-primary-subtle bg-gradient border-bottom">
      <x-brand-logo size="lg" />
   </header><!-- end card login header -->

   <div class="card-login-body p-3 flex-grow-1 overflow-y-auto overflow-x-hidden">

      <div class="alert alert-success d-flex gap-2 align-items-baseline rounded-1">
         <i class="bi bi-info-circle-fill fs-5" aria-hidden="true"></i>
         <div>Anda berhasil keluar dari akun {{ $activeInfo['title'] }} {{ $activeInfo['sub'] }}.</div>
      </div>

      <form action="{{ url('/dashboard') }}" method="get" id="form-login" class="vstack row-gap-3">
         <div class="form-group">
            <label for="demo-user" class="small mb-1 fw-bold">Demo Akun (Pilih untuk Cepat Preview)</label>
            <div class="input-group">
               <span class="input-group-text rounded-start-1" aria-hidden="true">
                  <i class="bi bi-people-fill"></i>
               </span>
               <select name="role" id="demo-user" class="form-select rounded-end-1" onchange="handleDemoSelect(this)">
                  <option value="" disabled selected>-- Pilih Akun Demo --</option>
                  <optgroup label="1. Super Admin">
                     <option value="admin">Super Admin (IT / Master)</option>
                  </optgroup>
                  <optgroup label="2. Admin Gudang">
                     <option value="gudang">Admin Gudang (Warehouse)</option>
                  </optgroup>
                  <optgroup label="3. Departemen Internal">
                     <option value="departemen" data-dept="FAT [Finance, Accounting, and Tax]">FAT [Finance, Accounting, & Tax]</option>
                     <option value="departemen" data-dept="HCS [Human Capital Services]">HCS [Human Capital]</option>
                     <option value="departemen" data-dept="GA [General Affair]">GA [General Affair]</option>
                     <option value="departemen" data-dept="Logistik">Logistik</option>
                     <option value="departemen" data-dept="Marketing">Marketing</option>
                     <option value="departemen" data-dept="Purchasing">Purchasing</option>
                  </optgroup>
               </select>
            </div>
            <input type="hidden" name="dept" id="demo-dept" value="FAT [Finance, Accounting, and Tax]">
         </div><!-- end demo user -->

         <div class="form-group">
            <label for="username" class="small mb-1 fw-bold">Nama Pengguna (Username)</label>
            <div class="input-group">
               <span class="input-group-text rounded-start-1" aria-hidden="true">
                  <i class="bi bi-person-fill"></i>
               </span>
               <input type="text" name="username" id="username" class="form-control rounded-end-1"
                  placeholder="Username" autocomplete="username">
            </div>
         </div>

         <div class="form-group">
            <label for="password" class="small mb-1 fw-bold">Kata Sandi (Password)</label>
            <div class="input-group">
               <span class="input-group-text rounded-start-1" aria-hidden="true">
                  <i class="bi bi-lock-fill"></i>
               </span>
               <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                  autocomplete="current-password">
               <button class="btn border-secondary rounded-end-1" type="button" aria-label="Tampilkan kata sandi">
                  <i class="bi bi-eye-fill" aria-hidden="true"></i>
               </button>
            </div>
         </div>

         <div class="form-check">
            <input class="form-check-input rounded-0" type="checkbox" name="remember" value="1" id="save-input">
            <label class="form-check-label" for="save-input">Simpan Akun</label>
         </div>

         <button class="btn btn-primary w-100 rounded-1 btn-lg" type="submit">
            LOGIN <i class="bi bi-box-arrow-in-right" aria-hidden="true"></i>
         </button>

      </form><!-- end form login -->

   </div><!-- end card login body -->

   <div class="card-login-footer p-3 bg-body-tertiary border-top text-center small text-muted">
      &copy; {{ date('Y') }} PT. Indraco Global Indonesia <br> dikembangkan oleh Tim WEBDEV
   </div><!-- end card login footer -->

</main><!-- end card login -->

<script>
   function handleDemoSelect(select) {
      const selectedOption = select.options[select.selectedIndex];
      const dept = selectedOption.getAttribute('data-dept');
      if (dept) {
         document.getElementById('demo-dept').value = dept;
      }
      document.getElementById('username').value = select.value;
      document.getElementById('password').value = '********';
   }
</script>
@endsection
