@extends('layouts.app')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset("/AdminLTE-2.4.15/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }} ">
@endsection

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Company</h3>
        <a class="btn btn-primary pull-right" href="javascript:void(0)" id="createNewCompany">Add Company</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped data-table" id="companies-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
<div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="companyForm" name="companyForm" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="company_id" id="company_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Company name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Company email" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Logo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="logo" name="logo" accept="image/x-png,image/jpg,image/jpeg">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Website</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="website" name="website" placeholder="Company website" value="" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset("/AdminLTE-2.4.15/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("/AdminLTE-2.4.15/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('companies.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'logo', name: 'logo',
                        render: function( data, type, full, meta ) {
                            if (data){
                                return "<img src=\"/img/" + data + "\" height=\"50\"/>";
                            } else {
                                return "Empty";
                            }
                        }
                    },
                    {data: 'website', name: 'website'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            
            $('#createNewCompany').click(function () {
                $('#saveBtn').val("create-company");
                $('#company_id').val('');
                $('#companyForm').trigger("reset");
                $('#modelHeading').html("Add Company");
                $('#ajaxModel').modal('show');
            });
            
            $('body').on('click', '.editCompany', function () {
            var company_id = $(this).data('id');
            $.get("{{ route('companies.index') }}" +'/' + company_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Company");
                $('#saveBtn').val("edit-company");
                $('#ajaxModel').modal('show');
                $('#company_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                //$('#logo').val(data.logo);
                $('#website').val(data.website);
            })
        });
            
            $('#saveBtn').click(function (e) {
                e.preventDefault();
            
                var form_data = new FormData($('#companyForm')[0]);

                $.ajax({
                    data: form_data,
                    url: "{{ route('companies.store') }}",
                    type: "POST",
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                
                        $('#companyForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);

                        if (data.status == 422) { // when status code is 422, it's a validation issue
                            $.each(data.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[name="'+i+'"]');
                                el.after($('<span class="error" style="color: red;"><strong>'+error[0]+'</strong></span>'));
                            });
                        }
                    }
                });
            });

            $('#ajaxModel').on('hidden.bs.modal', function () {
                $(".error").remove();
            });
            
            $('body').on('click', '.deleteCompany', function () {
            
                var company_id = $(this).data("id");

                if (confirm("Apakah yakin menghapus ?")) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('companies.store') }}"+'/'+company_id,
                        success: function (data) {
                            table.draw();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });
        </script>
@endsection