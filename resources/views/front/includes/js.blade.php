    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://kit.fontawesome.com/a7ac2e4b44.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('elearning/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('elearning/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('elearning/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('elearning/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('elearning/js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- <script>
      $(document).ready(function () {
          // Menambahkan event listener untuk mendeteksi scroll
          $(window).scroll(function () {
              // Mengambil nilai scroll dari atas halaman
              var scroll = $(window).scrollTop();

              // Menentukan aturan kapan kelas "d-none" dihilangkan
              if (scroll > 50) {
                  $(".navbar").removeClass("d-none");
              } else {
                  $(".navbar").addClass("d-none");
              }
          });
      });
  </script> --}}
  </body>

</html>