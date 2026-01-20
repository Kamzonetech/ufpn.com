<div>
    <h4>Our Newsletter</h4>
    <p>Subscribe to our Newsletter and stay updated on the latest in technology, consulting, and digital
        transformation.!</p>
    <form wire:submit.prevent="subscribe" class="php-email-form">
        <div class="newsletter-form">
            <input type="email" wire:model="email" required>
            <input type="submit" value="Subscribe">
        </div>
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        @if ($success)
            <div x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 3000)"
                class="alert alert-success">
                {{ $success }}
            </div>
        @endif
        
    </form>
</div>