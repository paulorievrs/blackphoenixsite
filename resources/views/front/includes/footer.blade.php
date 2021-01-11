
<script src="assets/js/app.js"></script>

<script>
    $('.ajaxifyPage').click(
        $('.sidebar-menu').find('active').removeClass('active'),
        $(this).addClass('active')
    );
</script>
</body>
</html>
@yield('footer')
