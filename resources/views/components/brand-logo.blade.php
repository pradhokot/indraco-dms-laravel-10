@props([
    'size' => 'sm', // 'sm' for header, 'lg' for login/card
    'lightSrc' => asset('assets/images/logo_indraco.png'),
    'darkSrc' => asset('assets/images/logo_indraco_invert.png'),
])

@if ($size === 'lg')
    <div {{ $attributes->merge(['class' => 'text-center']) }}>
        <img src="{{ $lightSrc }}"
             data-img-theme-light="{{ $lightSrc }}"
             data-img-theme-dark="{{ $darkSrc }}"
             alt="Logo INDRACO"
             class="w-100 h-auto mb-1"
             style="max-width: 210px;">
        <h1 class="fs-6 mb-0">DMS [Document Management System]</h1>
    </div>
@else
    <div {{ $attributes->merge(['class' => 'd-flex align-items-center gap-2']) }}>
        <img src="{{ $lightSrc }}"
             data-img-theme-light="{{ $lightSrc }}"
             data-img-theme-dark="{{ $darkSrc }}"
             alt="Logo INDRACO"
             class="w-100 h-auto"
             style="max-width: 125px;">
        <div>
            <span class="fs-5 fw-bold d-xxl-none">DMS</span>
            <span class="small d-none d-xxl-inline text-muted">Document Management System</span>
        </div>
    </div>
@endif
