<button type="button"
        x-data
        @click="$store.theme.toggle()"
        class="p-2 rounded-full text-gray-400 hover:text-gray-700 hover:bg-gray-100 dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-700 transition"
        :aria-label="$store.theme.dark ? 'Switch to light mode' : 'Switch to dark mode'"
        :title="$store.theme.dark ? 'Light mode' : 'Dark mode'">
    <!-- Sun icon (shown when dark) -->
    <svg x-show="$store.theme.dark" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364 6.364l-1.414-1.414M6.343 6.343l-1.414-1.414m12.728 12.728l-1.414-1.414M6.343 17.657l-1.414-1.414M12 8a4 4 0 100 8 4 4 0 000-8z" />
    </svg>
    <!-- Moon icon (shown when light) -->
    <svg x-show="!$store.theme.dark" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
    </svg>
</button>