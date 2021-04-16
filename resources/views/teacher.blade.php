<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Teachers
                        <!-- Button trigger modal -->
                        <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#teachermodal">
                            Add Teacher
                        </button>
                        <button type="button" style="float: right" id="deleteAllselected" class="btn btn-danger mr-2">
                            Delete Selected
                        </button>

                        </div>
                        <div class="card-body">
                            <table class="table" id="teacherTable">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkAll"></th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Institute</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr id="tId{{$teacher->id}}">
                                            <td><input type="checkbox"  name="ids" class="checkcls" value="{{$teacher->id}}"></td>
                                            <td>{{$teacher->name}}</td>
                                            <td>{{$teacher->title}}</td>
                                            <td>{{$teacher->institute}}</td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="editTeacher({{$teacher->id}})" class="btn btn-info">Edit</a>
                                                <a href="javascript:void(0)" onclick="deleteTeacher({{$teacher->id}})" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  Insert Teacher Modal -->
                <div class="modal fade" id="teachermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                            <div class="modal-body">
                                <form id="studentForm" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter name " id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter title" id="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="form-label">Institute</label>
                                        <input type="text" name="institute" class="form-control" placeholder="Enter institute" id="institute">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" id="addButton">Add</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                    </div>
                </div>
                        <!-- Edit Teacher Modal -->
                    <div class="modal fade" id="teacherEditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Teacher</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                                <div class="modal-body">
                                    <form id="teacherEditForm" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter name" id="name2">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter title" id="title2">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">Institute</label>
                                            <input type="text" name="institute" class="form-control" placeholder="Enter institute" id="institute2">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" id="addButton">Add</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

 {{-- insert --}}
 <script>
     $('#studentForm').submit(function(e) {
         e.preventDefault();
         let name=$("#name").val();
         let title=$("#title").val();
         let institute=$("#institute").val();
         let _token=$("input[name=_token]").val();

         $.ajax({
             url:"{{route('teacher.add')}}",
             type:"POST",
             data:{
                 name:name,
                 title:title,
                 institute:institute,
                 _token:_token,
             },
             success:function(response){
                  $('#teacherTable tbody').prepend('<tr><td>'+ +'</td><td>'+ response.name +'</td><td>'+ response.title +'</td><td>'+ response.institute +'</td></tr>');
                  $('#studentForm')[0].reset();
                  $('#teachermodal').modal('hide');
             },
             error:function(response){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                });
             }
         });
     });
 </script>

 {{-- update --}}
 <script>
     function editTeacher(id) {
         $.get('/teacher/'+id,function(teacher){
            $('#id').val(teacher.id);
            $('#name2').val(teacher.name);
            $('#title2').val(teacher.title);
            $('#institute2').val(teacher.institute);
            $('#teacherEditmodal').modal('toggle')
         });
     }

     $('#teacherEditForm').submit(function (e) {
         e.preventDefault();
         let id = $('#id').val();
         let name = $('#name2').val();
         let title = $('#title2').val();
         let institute = $('#institute2').val();
         let _token = $('input[name=_token]').val();

         $.ajax({
             url : "{{route('student.update')}}",
             type : "PUT",
             data:{
                 id:id,
                 name:name,
                 title:title,
                 institute:institute,
                 _token:_token
             },
             success:function(response){
                $('#tId'+response.id+ 'td:nth-child(1)').text(response.name);
                $('#tId'+response.id+ 'td:nth-child(2)').text(response.title);
                $('#tId'+response.id+ 'td:nth-child(3)').text(response.institute);
                $('#teacherEditmodal').modal('toggle');
                $('#teacherEditForm')[0].reset();
             }
         });
     })
 </script>

 {{-- delete  --}}
<script>
    function deleteTeacher(id) {
        if (confirm('Do you realy want to delete the teacher')) {
            $.ajax({
                type:"DELETE" ,
                url: "/delete-teacher/"+id,
                data: {
                    _token:$("input[name=_token]").val()
                },
                success: function (response) {
                    $("#tId"+id).remove();
                }
            });
        }
    }
</script>

 {{-- delete multitple record --}}
 <script>
     $(function(e) {
        $("#checkAll").click(function () {
           $('.checkcls').prop('checked',$(this).prop('checked'));
        });
        $("#deleteAllselected").click(function (e) {
            e.preventDefault();
            var allIds =[];
            $("input:checkbox[name=ids]:checked").each(function () {
                allIds.push($(this).val());

                $.ajax({
                    type: "DELETE",
                    url: "{{route('select.delete')}}",
                    data: {
                        _token: $('input[name_token]').val(),
                        ids:allIds,
                    },
                    success: function (response) {
                        $.each(allIds, function (key, val) {
                             $("#tId"+val()).remove();
                        });
                    }
                });

            });
        });
     });
 </script>

</body>
</html>
