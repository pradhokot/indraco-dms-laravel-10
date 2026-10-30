@php
    $deptName = $department ?? request('dept', 'FAT [Finance, Accounting, and Tax]');
@endphp

<div class="container-fluid p-0">
   <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
      <div>
         <h1 class="h4 mb-1 fw-bold text-dark">Dashboard Arsip Departemen</h1>
         <p class="text-muted small mb-0">Pengelolaan berkas, pengajuan simpan/tarik, dan pemantauan masa retensi departemen <span class="fw-bold text-primary">{{ $deptName }}</span></p>
      </div>
      <span class="badge text-bg-secondary px-3 py-2 rounded-1">Akses: Departemen</span>
   </div>

   <!-- Metric Cards Departemen -->
   <div class="row g-3 mb-4">
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-primary-subtle text-primary rounded-1 fs-3">
                  <i class="bi bi-folder-check"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Dokumen Tersimpan</div>
                  <div class="fs-4 fw-bold">1,420</div>
                  <div class="small text-muted">Di gudang pusat</div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-info-subtle text-info rounded-1 fs-3">
                  <i class="bi bi-clock-history"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Pengajuan Berjalan</div>
                  <div class="fs-4 fw-bold">3 Berkas</div>
                  <div class="small text-info">2 Simpan, 1 Tarik</div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-warning-subtle text-warning rounded-1 fs-3">
                  <i class="bi bi-file-earmark-arrow-up"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Sedang Dipinjam</div>
                  <div class="fs-4 fw-bold">7 Berkas</div>
                  <div class="small text-warning">Di meja kerja staf</div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
         <div class="card shadow-sm border rounded-1 h-100">
            <div class="card-body d-flex align-items-center gap-3">
               <div class="p-3 bg-danger-subtle text-danger rounded-1 fs-3">
                  <i class="bi bi-calendar-x"></i>
               </div>
               <div>
                  <div class="text-muted small fw-semibold">Mendekati Retensi</div>
                  <div class="fs-4 fw-bold">12 Berkas</div>
                  <div class="small text-danger">Bisa diajukan musnah</div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Action Buttons and Table -->
   <div class="row g-3">
      <div class="col-12 col-lg-8">
         <div class="card border rounded-1 shadow-sm h-100">
            <div class="card-header bg-body py-3 fw-bold border-bottom d-flex justify-content-between align-items-center">
               <span><i class="bi bi-journal-text"></i> Berkas Terakhir yang Diajukan</span>
               <a href="#" class="btn btn-sm btn-outline-secondary">Inventaris Lengkap</a>
            </div>
            <div class="card-body p-0">
               <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0 small">
                     <thead class="table-light">
                        <tr>
                           <th>Kode / No. Dokumen</th>
                           <th>Judul Berkas</th>
                           <th>Tanggal Simpan</th>
                           <th>Retensi Sampai</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="fw-bold">FAT-PJK-2025-001</td>
                           <td>Laporan Pajak Masa PPh 21 Th 2025</td>
                           <td>12 Jan 2026</td>
                           <td>12 Jan 2031</td>
                           <td><span class="badge text-bg-success">Tersimpan di Gudang</span></td>
                        </tr>
                        <tr>
                           <td class="fw-bold">FAT-INV-2026-089</td>
                           <td>Faktur Penjualan Wilayah Barat Q1</td>
                           <td>20 Feb 2026</td>
                           <td>20 Feb 2036</td>
                           <td><span class="badge text-bg-warning">Menunggu Kirim Fisik</span></td>
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
               <i class="bi bi-plus-circle"></i> Aksi Cepat Departemen
            </div>
            <div class="card-body vstack gap-2">
               <a href="#" class="btn btn-primary text-start rounded-1 py-2 d-flex align-items-center gap-2">
                  <i class="bi bi-box-arrow-in-down fs-5"></i>
                  <div>
                     <div class="fw-bold">Form Pengajuan Simpan</div>
                     <div class="small text-white-50">Kirim arsip baru ke gudang</div>
                  </div>
               </a>
               <a href="#" class="btn btn-outline-secondary text-start rounded-1 py-2 d-flex align-items-center gap-2">
                  <i class="bi bi-box-arrow-up fs-5"></i>
                  <div>
                     <div class="fw-bold">Form Pengajuan Tarik</div>
                     <div class="small text-muted">Pinjam arsip dari gudang</div>
                  </div>
               </a>
               <a href="#" class="btn btn-outline-secondary text-start rounded-1 py-2 d-flex align-items-center gap-2">
                  <i class="bi bi-calendar-plus fs-5"></i>
                  <div>
                     <div class="fw-bold">Pengajuan Perpanjang</div>
                     <div class="small text-muted">Perpanjang masa simpan berkas</div>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
