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
     <style>
         .btn-info,.btn-success {
             margin-top: 10px;
         }
         .form-section {
             padding-left: 15px;
             display: none;
         }
         .form-section.current {
             display: inherit;
         }
     </style>
</head>
<body>
    <div class="container">
        <section style="margin-top: 60px">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header text-white bg-info">Multi Step Form</div>
                        <div class="card-body">
                            <form id="form" method="POST" action="" >
                                @csrf
                                <div class="form-section">
                                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                    <input type="text" name="firstName" class="form-control" placeholder="Enter First Name" required>

                                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" placeholder="Enter Last Name" required>
                                </div>

                                <div class="form-section">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>

                                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                    <input type="phone" name="phone" class="form-control" placeholder="Enter Phone" required>
                                </div>

                                <div class="form-section">
                                    <label for="exampleFormControlInput1" class="form-label">Message</label>
                                    <textarea name="msg" id="" class="form-control" cols="20" rows="5" required></textarea>
                                </div>
                                <div class="form-navigation">
                                    <button type="button" class="btn btn-info float-left">Previous</button>
                                    <button type="button" class="btn btn-info float-right">Next</button>
                                    <button type="submit" class="btn btn-success float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
         </div>
    </section>
    </div>
</body>
</html>
