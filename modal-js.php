

            <div class="md-overlay"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
            <script type="text/javascript" src="assets/js/classie.js"></script>
            <script type="text/javascript" src="assets/js/modalEffects.js"></script>
            <script src="assets/js/cssParser.js"></script>
            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

            <script>
                $(".grow").click(function () {

                    $(".md-overlay").css("visibility", "visible");
                    $(".md-overlay").css("opacity", "1");


                });

                $(".md-overlay").click(function () {

                    $(".md-overlay").css("visibility", "hidden");
                    $(".md-overlay").css("opacity", "0");

                });

                $(".md-close").click(function () {
                    $(".md-overlay").css("visibility", "hidden");
                    $(".md-overlay").css("opacity", "0");

                });
            </script>
  