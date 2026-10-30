<div class="container-fluid p-0">
   <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
      <div>
         <h1 class="h4 mb-1 fw-bold text-primary">Dashboard Super Admin</h1>
         <p class="text-muted small mb-0">Overview sistem manajemen arsip dan kendali seluruh departemen PT. Indraco Global Indonesia</p>
      </div>
      <span class="badge text-bg-primary px-3 py-2 rounded-1">Akses: Super Admin</span>
   </div>

   <!-- Metric Cards -->
   <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-primary-subtle text-primary rounded-1 fs-3">
                  <i class="bi bi-files"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Total Arsip Sistem</div>
                  <div class="fs-4 fw-bold">14,820</div>
                  <div class="small text-success"><i class="bi bi-arrow-up"></i> Seluruh Departemen</div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-warning-subtle text-warning rounded-1 fs-3">
                  <i class="bi bi-hourglass-split"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Pending Approval</div>
                  <div class="fs-4 fw-bold">18</div>
                  <div class="small text-warning">Menunggu persetujuan</div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-info-subtle text-info rounded-1 fs-3">
                  <i class="bi bi-building"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Departemen Aktif</div>
                  <div class="fs-4 fw-bold">12</div>
                  <div class="small text-info">FAT, HCS, Logistik, dll</div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-success-subtle text-success rounded-1 fs-3">
                  <i class="bi bi-person-check-fill"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Pengguna Terdaftar</div>
                  <div class="fs-4 fw-bold">85</div>
                  <div class="small text-success">Akun aktif</div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Overview Section -->
   <div class="row g-3">
      <div class="col-12 col-lg-8">
         <div class="card border rounded-1 shadow-sm h-100">
            <div class="card-header bg-body py-3 fw-bold border-bottom d-flex justify-content-between align-items-center">
               <span><i class="bi bi-activity"></i> Log Aktivitas Sistem Terbaru</span>
               <button class="btn btn-sm btn-outline-secondary">Lihat Semua</button>
            </div>
            <div class="card-body p-0">
               <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0 small">
                     <thead class="table-light">
                        <tr>
                           <th>Waktu</th>
                           <th>Pengguna</th>
                           <th>Departemen</th>
                           <th>Aktivitas</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>14:20 WIB</td>
                           <td>Budi Santoso</td>
                           <td>FAT</td>
                           <td>Pengajuan simpan 5 box arsip perpajakan</td>
                           <td><span class="badge text-bg-warning">Pending Gudang</span></td>
                        </tr>
                        <tr>
                           <td>13:45 WIB</td>
                           <td>Admin Gudang 01</td>
                           <td>Gudang</td>
                           <td>Penempatan Box #B-104 ke Rak A-02</td>
                           <td><span class="badge text-bg-success">Tersimpan</span></td>
                        </tr>
                        <tr>
                           <td>11:10 WIB</td>
                           <td>Siti Rahma</td>
                           <td>HCS</td>
                           <td>Pengajuan penarikan dokumen PKWT 2024</td>
                           <td><span class="badge text-bg-info">Diproses</span></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-lg-4">
         <div class="card border rounded-1 shadow-sm h-100">
            <div class="card-header bg-body py-3 fw-bold border-bottom">
               <i class="bi bi-lightning-charge"></i> Pintasan Khusus Admin
            </div>
            <div class="card-body vstack gap-2">
               <a href="#" class="btn btn-outline-primary text-start rounded-1 py-2 d-flex align-items-center gap-2">
                  <i class="bi bi-people-fill fs-5"></i>
                  <div>
                     <div class="fw-bold">Manajemen Akun Pengguna</div>
                     <div class="small text-muted">Tambah / kelola hak akses user</div>
                  </div>
               </a>
               <a href="#" class="btn btn-outline-secondary text-start rounded-1 py-2 d-flex align-items-center gap-2">
                  <i class="bi bi-shield-lock-fill fs-5"></i>
                  <div>
                     <div class="fw-bold">Audit Trail & Log Dokumen</div>
                     <div class="small text-muted">Pantau rekam jejak berkas</div>
                  </div>
               </a>
               <a href="#" class="btn btn-outline-danger text-start rounded-1 py-2 d-flex align-items-center gap-2">
                  <i class="bi bi-trash3-fill fs-5"></i>
                  <div>
                     <div class="fw-bold">Persetujuan Pemusnahan</div>
                     <div class="small text-muted">Verifikasi berkas kadaluarsa</div>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
