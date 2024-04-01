<a {{ $attributes->merge(["href" => route("users.create"), 'class' => 'px-4 py-2 bg-red-600 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
