<div>
    <label class="label">
        <span class="label-text">{{ $attributes->get('label') }}</span>
    </label>
    <input type="{{ $attributes->get('type') ?? 'text' }}" {{ $attributes->merge(['class' => 'input input-bordered']) }}>
</div>
