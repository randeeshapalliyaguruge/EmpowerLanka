<button {{ $attributes->merge(['type' => 'submit', 'class' => 'font-medium text-blue-600 hover:underline']) }}>
    {{ $slot }}
</button>
