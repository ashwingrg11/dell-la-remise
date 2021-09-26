<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        ! function (t) {
            "use strict";
            t("#sidebarToggle, #sidebarToggleTop").on("click", function (o) {
                t("body").toggleClass("sidebar-toggled"), t(".sidebar").toggleClass("toggled"), t(".sidebar").hasClass("toggled") && t(".sidebar .collapse").collapse("hide")
            }), t(window).resize(function () {
                t(window).width() < 768 && t(".sidebar .collapse").collapse("hide")
            }), t("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel", function (o) {
                if (768 < t(window).width()) {
                    var e = o.originalEvent,
                        l = e.wheelDelta || -e.detail;
                    this.scrollTop += 30 * (l < 0 ? 1 : -1), o.preventDefault()
                }
            })
        }(jQuery);
    });

</script>
@yield('page-js')
</div>
</body>

</html>