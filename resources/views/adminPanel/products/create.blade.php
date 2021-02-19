@extends('adminPanel.app')

@section('main-content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @include('multiauth::message')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Customer Creation</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a href="#" class="dropdown-item swalDefaultWarning">Setup</a>
                                    <a href="#" class="dropdown-item swalDefaultTest">Another action</a>
                                    <a href="#" class="dropdown-item toastrDefaultWarning">Something else here</a>
                                    <!-- <a class="dropdown-divider"></a> -->
                                    <a href="#" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <!-- data-card-widget="remove" -->

                            <button type="button" class="btn btn-tool">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">



                            <div class="card card-primary col-lg-12">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>
                                <form role="form" action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="title">Code</label>
                                                    <input type="text" class="form-control" name="code" id="title" value="{{old('code')}}" placeholder="Enter Code" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="subtitle">Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Enter Name" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="slug">Slug</label>
                                                    <input type="text" class="form-control" readonly name="slug" id="slug" value="{{old('slug')}}" placeholder="Slug" />
                                                </div>
                                            </div>
                                            <div class=" col-lg-6">
                                                <div class="form-group">
                                                    <label for="image">File input</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="form-control-file" id="image" name="image">
                                                            <a href=""><img src="" alt="Blog Image" width="250" /></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="status" value="1" id="status" />
                                                    <label class="form-check-label" for="status">Active</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-outline">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            Write Post Body
                                                            <!-- <small>Simple and fast</small> -->
                                                        </h3>
                                                        <!-- tools box -->
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                <i class="fas fa-minus"></i></button>
                                                        </div>
                                                        <!-- /. tools -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body pad">
                                                        <div class="mb-3">
                                                            <textarea id="editor1" name="body" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                        </div>
                                        <div class="card-footer">
                                            @permitTo('CreateCustomer')
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            @endpermitTo
                                            <a type="button" href="{{route('customer.index')}}" class="btn btn-warning">Back</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- /.card -->



                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

@endsection
@section('footer')
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
<script src="/vendor/plugins/select2/js/select2.full.min.js"></script>


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
@endsection