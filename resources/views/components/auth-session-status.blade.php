@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-sm font-semibold text-leaf-dark']) }}>
        {{ $status }}
    </div>
@endif
