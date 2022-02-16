<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <title>Apex memos&comments</title>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top">Apex memo&comments</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Contact section-->
        <section id="contact">
            <h1>これはあなたのメモ一覧です</h1>
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    @foreach ($memos as $memo)
                    <div class="col-lg-8">
                        <p class="lead">{{$memo->memo}}</p>
                    </div>
                    @endforeach
                    <div class="col-lg-8">
                        <form action="/memo" method="post">
                            @csrf
                            <p>新規メモ作成</p>
                            <textarea name="memo" cols="50" rows="4" class="w-full rounded-lg border-2 bg-gray-100 @error('comment') border-red-500 @enderror"></textarea>
                            <input type="submit" value="投稿">
                        </form>
                    </div>
                </div>
            </div>  
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>