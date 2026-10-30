<div class="container-fluid p-0">
   <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
      <div>
         <h1 class="h4 mb-1 fw-bold text-success">Dashboard Operasional Gudang</h1>
         <p class="text-muted small mb-0">Pengelolaan penyimpanan fisik arsip, kapasitas rak gudang, dan pergerakan box dokumen</p>
      </div>
      <span class="badge text-bg-success px-3 py-2 rounded-1">Akses: Admin Gudang</span>
   </div>

   <!-- Metric Cards Gudang -->
   <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-primary-subtle text-primary rounded-1 fs-3">
                  <i class="bi bi-box-arrow-in-down"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Antrean Simpan</div>
                  <div class="fs-4 fw-bold">6 Permintaan</div>
                  <div class="small text-warning">Perlu alokasi rak</div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-danger-subtle text-danger rounded-1 fs-3">
                  <i class="bi bi-box-arrow-up"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Antrean Tarik</div>
                  <div class="fs-4 fw-bold">4 Permintaan</div>
                  <div class="small text-danger">Segera disiapkan</div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-info-subtle text-info rounded-1 fs-3">
                  <i class="bi bi-grid-3x3-gap-fill"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Kapasitas Rak</div>
                  <div class="fs-4 fw-bold">78% Terisi</div>
                  <div class="small text-muted">312 / 400 Slot</div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-secondary-subtle text-secondary rounded-1 fs-3">
                  <i class="bi bi-fire"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Jatuh Tempo Retensi</div>
                  <div class="fs-4 fw-bold">25 Box</div>
                  <div class="small text-danger">Siap verifikasi musnah</div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Gudang Action & Denah Shortcut -->
   <div class="row g-3">
      <div class="col-12 col-lg-8">
         <div class="card border rounded-1 shadow-sm h-100">
            <div class="card-header bg-body py-3 fw-bold border-bottom d-flex justify-content-between align-items-center">
               <span><i class="bi bi-inboxes"></i> Antrean Pekerjaan Fisik Gudang</span>
               <button class="btn btn-sm btn-outline-secondary">Proses Semua</button>
            </div>
            <div class="card-body p-0">
               <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0 small">
                     <thead class="table-light">
                        <tr>
                           <th>No. Tiket</th>
                           <th>Departemen</th>
                           <th>Jenis Pekerjaan</th>
                           <th>Lokasi Target</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="fw-bold">REQ-SMP-2026-088</td>
                           <td>FAT</td>
                           <td><span class="badge text-bg-primary">Simpan 3 Box</span></td>
                           <td>Rak B - Lantai 2</td>
                           <td><button class="btn btn-sm btn-success py-0">Konfirmasi Taruh</button></td>
                        </tr>
                        <tr>
                           <td class="fw-bold">REQ-TRK-2026-041</td>
                           <td>Marketing</td>
                           <td><span class="badge text-bg-warning">Tarik Berkas Kontrak</span></td>
                           <td>Rak A - Slot 14</td>
                           <td><button class="btn btn-sm btn-primary py-0">Ambil Berkas</button></td>
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
               <i class="bi bi-grid-3x3"></i> Denah 2D Gudang
            </div>
            <div class="card-body text-center p-4">
               <i class="bi bi-diagram-3 fs-1 text-success mb-2 d-block"></i>
               <h6 class="fw-bold mb-1">Visualisasi Denah Gudang Fisik</h6>
               <p class="small text-muted mb-3">Lihat dan atur penempatan box dokumen pada rak gudang secara interaktif.</p>
               <a href="#" class="btn btn-success btn-sm rounded-1 w-100">
                  <i class="bi bi-geo-alt-fill"></i> Buka Denah 2D Gudang
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
