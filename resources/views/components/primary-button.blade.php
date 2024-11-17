<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full bg-[#4F46E5] text-white py-3 px-5 rounded-full']) }}>
    <span>{{ $slot }}</span>
    <img class="ml-2 inline" src="images/goIcon.svg" alt="Go" />
</button>
