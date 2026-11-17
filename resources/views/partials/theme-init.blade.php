<script>
    (function () {
        const stored = localStorage.getItem('theme');
        const dark = stored
            ? stored === 'dark'
            : window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (dark) document.documentElement.classList.add('dark');
    })();
</script>