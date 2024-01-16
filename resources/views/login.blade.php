<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <div class="card">
        <div class="title">
            <form action="{{ url('proses_login')}}" method="post">
                {{ csrf_field() }}  
                
                @if ($errors = Session::get('alert-gagal'))
                <div class="alert alert-danger">
                    {{ $errors }}
                </div>
                @endif

                <h2>Login Account</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="mb-3 row text-center">
                        <label for="username" class="col-sm-2 col-form-label"><i class="bi bi-person-fill" style="font-size: 20px; color: #6B728E;"></i></label>
                        <div class="col-sm-10">
                            <input type="text" class="input" name="username" id="username" placeholder="username">
                        </div>
                    </div>
                    <div class="mb-3 row text-center">
                        <label for="password" class="col-sm-2 col-form-label"><i class="bi bi-lock " style="font-size: 20px; color: #6B728E;"></i></i></label>
                        <div class="col-sm-10">
                            <input type="password" class="input" name="password" id="password" placeholder="password">
                        </div>
                    </div>
                    <button type="submit" class="mt-3 btn-kirim">Login</button>
            </form>
            
            <div class="row">
                <div class="column">
                    <p>Daftar akun? <a href="{{ url('/registerpelajar') }}">Daftar!</a></p>
                </div>
                <div class="column">
                    <p>Tertarik menjadi pengajar? <a href="{{ url('/registerpengajar') }}">Tertarik!</a></p>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>