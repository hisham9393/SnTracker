@extends('adminPanel.app')
@section('head')

<link rel="stylesheet" href="{{asset('adminLinks/plugins/summernote/summernote-bs4.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('adminLinks/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('adminLinks/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{asset('adminLinks/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminLinks/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('adminLinks/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}" />


@endsection
@section('main-content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @include('multiauth::message')
        <div class="card-body">
            <form role="form" action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- <div class="card-body"> -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Invoice Number" class="col-sm-3 col-form-label">Invoice</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Invoice Number">
                                </div>
                            </div>

                            <div class="input-group date form-group row" id="reservationdate" data-target-input="nearest">
                                <label for="date" class="col-sm-3 col-form-label">Date</label>
                                <!-- <div class="col-sm-"> -->
                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <!-- </div> -->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Remarks">
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="date" class="col-sm-2 col-form-label">Product</label>

                                <div class="col-sm-10">
                                    <select class="form-control select2" data-placeholder="Select a Product" style="width: 100%;" name="tags[]">
                                        <option value=""></option>
                                        @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card-footer">
                        @permitTo('CreateSerialNumber')
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @endpermitTo
                        <a type="button" href="{{route('customer.index')}}" class="btn btn-warning">Back</a>
                    </div>
                </div>

            </form>
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Invoice#</th>
                        <th>Serial Number</th>
                        <th>Product</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>v</td>
                        <td>v</td>
                        <td>var</td>

                        <td>g</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- /.content -->

@endsection
@section('footer')
<!-- DataTables -->
<script src="{{asset('adminLinks/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            responsive: true,
            autoWidth: false,
        });
        $("#example2").DataTable({
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultTest').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });

    });
</script>

<!-- Select2 -->
<script src="{{asset('adminLinks/plugins/select2/js/select2.full.min.js')}}"></script>


<script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
<script>
    $(function() {
        CKEDITOR.replace('editor1');
        $(".textare").wysihtml5();
    })
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
<script>
    $('#title').change(function() {
        $('#slug').val(slug_generator($(this).val()));
    });

    function slug_generator(data) {

        const a = 'àáâäæãåāăąçćčđďèéêëēėęěğǵḧîïíīįìłḿñńǹňôöòóœøōõőṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;'
        const b = 'aaaaaaaaaacccddeeeeeeeegghiiiiiilmnnnnoooooooooprrsssssttuuuuuuuuuwxyyzzz------'
        const p = new RegExp(a.split('').join('|'), 'g')
        return data.toString().toLowerCase()
            .replace(/\s+/g, '-') // Replace spaces with -
            .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
            .replace(/&/g, '-and-') // Replace & with 'and'
            .replace(/[^\w\-]+/g, '') // Remove all non-word characters
            .replace(/\-\-+/g, '-') // Replace multiple - with single -
            .replace(/^-+/, '') // Trim - from start of text
            .replace(/-+$/, '') // Trim - from end of text
    }
</script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })



    })
</script>
<!-- Select2 -->
<script src="{{asset('adminLinks/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('adminLinks/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminLinks/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script>
    $(function() {
        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()

    })
</script>
@endsection