@props([
    'size' => 'sm',
])

<div {{ $attributes->merge(['class' => 'btn-group btn-group-' . $size . ' border rounded-1 bg-body']) }}>
    <button class="btn" type="button" aria-label="Ubah tema" title="Ubah Tema" data-bs-theme-toggle>
        <i class="bi bi-moon-stars-fill" aria-hidden="true"></i>
    </button>
    <div class="vr"></div>
    <button class="btn" type="button" aria-label="Segarkan halaman" title="Segarkan Halaman" data-action="refresh">
        <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i>
    </button>
    <div class="vr"></div>
    <button class="btn" type="button" aria-label="Layar penuh" title="Layar Penuh [Fullscreen]" data-action="fullscreen">
        <i class="bi bi-fullscreen" aria-hidden="true"></i>
    </button>
</div>
