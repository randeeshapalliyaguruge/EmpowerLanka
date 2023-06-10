<button {{ $attributes->merge(['type' => 'submit', 'class' => 'font-medium text-red-600 hover:underline']) }}>
    {{ $slot }}
</button>
