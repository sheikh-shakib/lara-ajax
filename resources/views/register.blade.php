<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- Scripts -->
     <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{ asset('js/parsley.min.js') }}"></script>
</head>
<body>
    <div class="container">
        <section style="margin-top: 60px">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">Register</div>
                        <div class="card-body">
                            <form id="form" method="POST" action="{{route('parsly.store')}}" >
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="form-label" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-trigger="keyup">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name" data-parsley-trigger="
                                    keyup">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="form-label" required>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" data-parsley-type="email" data-parsley-trigger="keyup">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="form-label" required>Password</label>
                                    <input type="password" name="password" class="form-control" id="pass" placeholder="Enter Password" data-parsley-length="[6,12]" data-parsley-trigger="keyup">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="form-label" required>Confirm Password</label>
                                    <input type="password" name="password" class="form-control cpassword" placeholder="Confirm Password" data-parsley-equalto="#pass" data-parsley-trigger="keyup">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="form-label" required>Enter phone</label>
                                    <input type="phone" name="phone" class="form-control" placeholder="Enter phone" data-parsley-pattern="[0-9]+$" data-parsley-trigger="keyup">
                                </div>
                                    <button type="submit" class="btn btn-secondary" id="addButton">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
         </div>
    </section>
    </div>
    <script>
         $('#form').parsley();
    </script>
</body>
</html>
