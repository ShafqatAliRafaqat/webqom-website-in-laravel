<?php if ($enquiry instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
<?php $per_page=$enquiry->perPage(); ?>
<?php else: ?>
<?php $per_page=10; ?>
<?php endif ?>
<?php $page = 'enquiry';
$breadcrumbs=[
        array('url'=>url('/admin/services/enquiry/list'),'name'=>'Services'),
        array('url'=>url('/admin/services/enquiry/list'),'name'=>'Services Enquiry - Listing'),

];
?>
@extends('layouts.admin_layout')

@section('title','Admin | Service EnquiryListing')
@section('content')
@section('page_header','Services')

<div class="page-content">
    <div class="row">
        <!-- end col-md-6 -->
        <div class="col-lg-12">
            @if ( session('flash_message')  )
                <div class="alert alert-success">
                    {{ session('flash_message') }}
                </div>
            @endif
            <div class="portlet">
                <div class="portlet-header">
                    <div class="caption">Add Enquiry</div>&nbsp;

                </div>
                <div class="portlet-body">
                  <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                      <form action=" {{ asset(route('enquires-create')) }}" method="POST">
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="POST">

                          <div class="form-group">
                              <label for="service">Service:</label>
                              <input type="text" class="form-control" id="service"  name="service" value="{{ $enquiry->service or ''}}">
                          </div>
                          <div class="form-group">
                              <label for="name">Name:</label>
                              <input type="text" class="form-control" id="name"  name="name" value="{{ $enquiry->name or ''}}">
                          </div>
                          <div class="form-group">
                              <label for="email">Email:</label>
                              <input type="email" class="form-control" id="email"  name="email" value="{{ $enquiry->email or ''}}">
                          </div>
                          <div class="form-group">
                              <label for="company">Company:</label>
                              <input type="text" class="form-control" id="company"  name="company" value="{{ $enquiry->company or ''}}">
                          </div>
                          <div class="form-group">
                              <label for="phone">Phone:</label>
                              <input type="text" class="form-control" id="phone"  name="phone" value="{{ $enquiry->phone or ''}}">
                          </div>
                          <div class="form-group">
                              <label for="website">Website:</label>
                              <input type="text" class="form-control" id="website"  name="website" value="{{ $enquiry->website or ''}}">
                          </div>
                          <div class="form-group">
                              <label for="message">Message:</label>
                              <textarea name="message" class="form-control" id="message"  name="message">{{ $enquiry->message or ''}}</textarea>
                          </div>
                          <input type="submit" value="Add" class="btn btn-common">
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <!-- end portlet -->
        </div>
        <!-- end col-lg-12 -->
    </div>
    <!-- end row -->
</div>

<div id="confirm" class="modal hide fade">
    <div class="modal-body">
        Are you sure?
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
    </div>
</div>

<!--Modal delete selected items start-->
<div aria-hidden="true" aria-labelledby="modal-login-label" class="modal fade" id="modal-delete-selected" role="dialog"
     tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    ×
                </button>
                <h4 class="modal-title" id="modal-login-label4">
                    <a href="">
                        <i class="fa fa-exclamation-triangle">
                        </i>
                    </a>
                    Are you sure you want to delete the selected
                    <span id="count-seleted">
                    </span>
                    item(s)?
                </h4>
            </div>
            <div class="modal-body" id="delete-selected-body">
                <div id="delete-selected-body-information">
                </div>
                <p class="alert alert-danger" id="selected_zero" style="display:none">
                    Please select at least one client for delete
                </p>
                <div class="form-actions" id="delete-selected-buttons">
                    <div class="col-md-offset-4 col-md-8">
                        <button class="btn btn-red" id="delete_bulk" type="button">
                            Yes
                            <i class="fa fa-check">
                            </i>
                        </button>
                        <a class="btn btn-green" data-dismiss="modal" href="#">
                            No
                            <i class="fa fa-times-circle">
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal delete selected items end -->
<!--Modal delete all items start-->
<div aria-hidden="true" aria-labelledby="modal-login-label" class="modal fade" id="modal-delete-all" role="dialog"
     tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    ×
                </button>
                <h4 class="modal-title" id="modal-login-label4">
                    <a href="">
                        <i class="fa fa-exclamation-triangle">
                        </i>
                    </a>
                    Are you sure you want to delete all items?
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-actions">
                    <div class="col-md-offset-4 col-md-8">
                        <a class="btn btn-red" href="javascript:void" onclick="delete_all()">
                            Yes
                            <i class="fa fa-check">
                            </i>
                        </a>
                        <a class="btn btn-green" data-dismiss="modal" href="#">
                            No
                            <i class="fa fa-times-circle">
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal delete all items end -->


@endsection
@section('custom_scripts')
    <link type="text/css" rel="stylesheet"
          href="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-switch/css/bootstrap-switch.css">
    <script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <link type="text/css" rel="stylesheet"
          href="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-datepicker/css/datepicker.css">
    <script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <script type="text/javascript">
        $('#clients_list').DataTable({
            "bPaginate": false,
            "bInfo": false,
            "bFilter": false,
            "buttons": [
                 'csv'
            ],
            "columnDefs": [
                { "width": "3px", "targets": 0 },
                { "width": "3px", "targets": 1 },
                { "width": "50px", "targets": 2 },
                { "width": "45px", "targets": 3 },
                { "width": "170px", "targets": 4 },

                { "width": "85px", "targets": 5 },
                { "width": "70px", "targets": 6 },
                { "width": "90px", "targets": 7 },
                { "width": "100", "targets": 8 },
                { "width": "20px", "targets": 9 }
            ],
            fixedColumns: true
        });

        function per_page_change() {
            per_page = $("#per_page_select").find(":selected").val();
            window.location.href = base_url + "/admin/services/enquiry/list/" + per_page;
        }

        function open_modal_delete_selected() {
            $('#delete-selected-body-information').html("");
            $("#modal-delete-selected").modal('show');

            var selected = $('input[name="id[]"]:checked').length;
            var id = $("input[name='id[]']:checked").map(function () {
                return this.value;
            }).get();
            console.log("id =" + id);
            if (selected < 1) {
                $('#selected_zero').show()
                $('#delete-selected-buttons').hide()
            } else {
                /*get seleccted users details*/
                $.ajax({
                    url: base_url + '/admin/services/enquiry/get_enquiry_details',
                    type: 'POST',
                    data: {'_token': csrf_token, 'id': id},
                }).done(function (response) {
                    console.log(response);
                    for (var i = 0; i < response.length; i++) {
                        $('#delete-selected-body-information').prepend('<p>' + '<strong>#' + response[i].id + '</strong>:<span>' + response[i].name + '<span ><strong >Company:</strong>' + response[i].email + '</span>' + '</p>');
                    }
                }).fail(function () {
                    console.log("error");
                }).always(function () {
                    $('#selected_zero').hide()
                    $('#delete-selected-buttons').show();
                    $('#count-seleted').html(selected);
                });
                /*End*/
            }
        }

        function delete_all() {
            $.ajax({
                url: base_url + '/admin/services/enquiry/delete_all',
                type: 'POST',
                data: {'_token': csrf_token},
            }).done(function () {
                location.reload();
            }).fail(function () {
                console.log("error");
            }).always(function () {
                console.log("complete");
            });
        }

        $(document).on('click', '#delete_bulk', function (event) {
            var selected = $('input[name="id[]"]:checked').length;
            var id = $("input[name='id[]']:checked").map(function () {
                return this.value;
            }).get();

            event.preventDefault();
            if (selected < 1) {
                $('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
            } else {

                $('#delete_bulk').attr("disabled", true);
                $.ajax({
                            url: base_url + '/admin/services/enquiry/delete_by_id',
                            type: 'POST',
                            data: {'_token': csrf_token, 'id': id},
                        })
                        .done(function () {
                            location.reload();
                        })
                        .fail(function () {
                            $('#modal-delete-selected').modal('hide');
                            alert("Error: no client was selected to delete");
                        })
                        .always(function () {
                            $('#delete_bulk').attr("disabled", false);
                        });
            }

        });
    </script>
@endsection
