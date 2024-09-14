<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if (request()->getHost() === 'sipeka.acehtamiangkab.go.id')
        <title>Login- Sipeka</title>
    @elseif(request()->getHost() === 'sidarendu.acehtamiangkab.go.id')
        <title>Login- Sidarendu</title>
    @elseif(request()->getHost() === 'siperbakin.acehtamiangkab.go.id')
        <title>Login- Siperbakin</title>
    @elseif(request()->getHost() === 'sipenting.acehtamiangkab.go.id')
        <title>Login- Sipenting</title>
    @else
        <title>Login- Satu Layanan</title>
    @endif


    
    <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/main/app.css">
    <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/favicon.svg"
        type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/favicon.png"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('') }}storage/admin_template/mazer/assets/css/shared/iconly.css">


    <style>
        #gambarlogin {
            background-image: url(storage/sipeka_template/images/login.jpg);
            background-size: cover;
            background-position: center center;
            width: 100%;
            height: 100vh; /* Adjust the height as needed */
        }
    </style>
    
  
    



</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    {{-- <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('') }}storage/admin_template/mazer/assets/images/logo/logo.svg" alt="Logo"></a>
                    </div> --}}

                    @if (request()->getHost() === 'sipeka.acehtamiangkab.go.id')
                        <h5 class="text-center">SIPEKA</h5>
                        <h5 class="text-center">KABUPATEN ACEH TAMIANG</h5>
                    @elseif(request()->getHost() === 'sidarendu.acehtamiangkab.go.id')
                        <h5 class="text-center">SIDARENDU</h5>
                        <h5 class="text-center">KABUPATEN ACEH TAMIANG</h5>
                    @elseif(request()->getHost() === 'siperbakin.acehtamiangkab.go.id')
                        <h5 class="text-center">SIPERBAKIN</h5>
                        <h5 class="text-center">KABUPATEN ACEH TAMIANG</h5>
                    @elseif(request()->getHost() === 'sipenting.acehtamiangkab.go.id')
                        <h5 class="text-center">SIPENTING</h5>
                        <h5 class="text-center">KABUPATEN ACEH TAMIANG</h5>
                    @else
                        <h5 class="text-center">SATU LAYANAN</h5>
                        <h5 class="text-center">KABUPATEN ACEH TAMIANG</h5>
                    @endif

                    

                    <br>

                    {{-- <p class="auth-subtitle mb-5">Silahkan Login.</p> --}}
                    @if (session('success'))
                        <div class="alert alert-primary">
                            {{ session('success') }}
                        </div>
                    @endif

                    <br>

                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-sm"
                                placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>

                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                        </div>



                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-sm"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>

                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif

                        </div>


                        <button class="btn btn-primary btn-block btn-sm shadow-lg mt-3">Log in</button>
                    </form>
                </div>
            </div>


            <div class="col-lg-7 d-none d-lg-block">

                @if (request()->getHost() === 'sipeka.acehtamiangkab.go.id')
                    <div id="gambarlogin"
                        style="background-image: url(storage/sipeka_template/images/login.jpg);">
                    </div>
                @elseif(request()->getHost() === 'sidarendu.acehtamiangkab.go.id')
                    <div id="gambarlogin"
                        style="background-image: url(storage/sidarendu_template/img/login.jpg); ">
                    </div>
                @elseif(request()->getHost() === 'siperbakin.acehtamiangkab.go.id')
                    <div id="gambarlogin"
                        style="background-image: url(storage/siperbakin_template/images/login.jpg); ">
                    </div>
                @elseif(request()->getHost() === 'sipenting.acehtamiangkab.go.id')
                    <div id="gambarlogin"
                        style="background-image: url(storage/sipenting_template/img/login.jpg); ">
                    </div>
                @else
                    <div id="gambarlogin"
                        style="background-image: url(storage/admin_template/mazer/assets/images/login_super_admin.png);">
                    </div> 

                    <!-- <div id="auth-right"
                        style="background-image: url(storage/serdadu_template/img/login.jpg); background-size: cover; background-position: center;">
                    </div> -->
                @endif

            </div>

            {{-- Menampilkan cookie banner --}}
            @include('cookie-consent::index')

        </div>
    </div>




    {{-- Modal Halaman Splash --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <p>SELAMAT DATANG</p>
                    </div>
                    <img id="modalImage" src="" alt="Gambar Modal" style="max-width: 100%;">
                </div>
            </div>
        </div>
    </div>






    {{-- Javascript --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/bootstrap.js"></script>
    {{-- <script src="{{ asset('') }}storage/admin_template/mazer/assets/js/app.js"></script> --}}



    <script>
        // Fungsi untuk mendapatkan kutipan dari API
        // function getQuote() {
        //     var apiUrl = "https://quotes.rest/qod"; // URL API untuk mendapatkan kutipan hari ini

        //     // Permintaan JSONP ke API menggunakan jQuery
        //     $.ajax({
        //         url: apiUrl,
        //         dataType: 'jsonp',
        //         headers: {
        //             "X-TheySaidSo-Api-Secret": "DmJ3IbpCZVoKtSp1iZ9iuiFgQKbUkcjA2mhxPBXt"
        //         },
        //         success: function(response) {
        //             var quote = response.contents.quotes[0].quote;
        //             var author = response.contents.quotes[0].author;
        //             var imageUrl = response.contents.quotes[0].background;

        //             // Menampilkan kutipan dan pengarang di atas gambar modal
        //             $('#quoteText').text(quote);
        //             $('#quoteAuthor').text(author);

        //             // Mengganti gambar modal dengan gambar kutipan
        //             $('#modalImage').attr('src', imageUrl);

        //             // Menampilkan modal
        //             $('#myModal').modal('show');
        //         },
        //         error: function(xhr, status, error) {
        //             console.log(error);
        //         }
        //     });
        // }

        // // Panggil fungsi untuk mendapatkan kutipan saat halaman selesai dimuat
        // $(document).ready(function() {
        //     getQuote();
        // });






        // Fungsi untuk menampilkan modal setelah penundaan
        function showDelayedModal() {
            setTimeout(function() {
                var imageUrl =
                    "https://picsum.photos/800/600"; // Menghasilkan gambar acak dengan ukuran 800x600 piksel

                $('#modalImage').attr('src', imageUrl);
                $('#myModal').modal('show');

                // $('#myModal').modal({
                //     backdrop: true,
                //     keyboard: false
                // });

            }, 1000); // Waktu penundaan dalam milidetik (misalnya 5000 untuk 5 detik)
        }

        // Panggil fungsi untuk menampilkan modal setelah halaman selesai dimuat
        // $(document).ready(function() {
        //     showDelayedModal();
        // });
    </script>





</body>

</html>
