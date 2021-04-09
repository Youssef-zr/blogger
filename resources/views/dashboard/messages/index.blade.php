@extends('dashboard.layouts.master')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

<style>
	div.dataTables_wrapper {
        direction: rtl;
    }
 
    /* Ensure that the demo table scrolls */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 95%;
        margin: 0 auto;
    }
</style>
@endpush

@section('braidcrump')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
    لوحة تحكم المدير
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{adminurl('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active"> <i class="fa fa-envelope"></i> {{$title}}</li>
    </ol>
    </section>
@endsection

@section('content')

<div class="box">

    <div class="box-header">
        <h3>{{$title}}</h3>
    </div>
    <div class="box-body">
	<!-- row -->
	<div class="row">
		<div class="col-xl-12">
			<div class="card mg-b-20">
				<div class="card-body">
						<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
							<div class="row">
								<div class="col-sm-12">
									<div class="table-responsive">
										<table id="example" class="stripe row-border order-column" style="width:100%">
											<thead>
												<tr role="row">
													<th> # </th>
													<th> الاسم </th>
													<th> البريد </th>
													<th>  الموضوع </th>
													<th>  الحالة </th>
													<th> التحكم </th>
												</tr>
											</thead>
											<tbody>
												@foreach ($messages as $item)
													<tr class="{{ $item->status == 0 ? 'bg-secondary':'' }}">
														<td>{{$item->id}}</td>
														<td><label class="badge label-warning">{{$item->name}}</label></td>
														<td>{{$item->email}}</td>
														<td>{{$item->subject}}</td>
														<td>
                                                            @if ($item->status==0)
                                                                <label class="badge label-danger">غير مقروئة</label>
                                                            @else
                                                                <label class="badge label-success">مقروئة</label>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{ adminUrl('contact/'.$item->id.'/edit') }}" class="btn btn-info btn-sm" title='استعراض'  data-toggle="tooltip" ><i class="fa fa-eye"></i></a>
                                                                <a href="#" class="btn btn-danger btn-sm delete" data-id="{{$item->id}}"  title='حذف' data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	<!-- row closed -->
	</div>
	<!-- Container closed -->
    </div>
</div>
{{-- modal delete record --}}

<!-- The Modal -->
<div class="modal text-right" id="myModal" style="overflow: hidden">
    <div class="modal-dialog modal-sm" style="display:flex;justify-content:center;align-items:center;height:100%;overflow:hidden">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
            <button type="button" class="close float-left hide-modal"><i class="fa fa-times-circle"></i></button>
            <h4 class="modal-title">حذف عنصر ؟</h4>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <h3 class="mb2 text-center" style="color:#f39c12"><i class="fa fa-exclamation-triangle fa-3x"></i></h3>
            هل تريد حذف هذا العنصر من السجلات ؟
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer" style="text-align: center !important">
            <form action="" data-url="{{adminUrl('contact')}}" method="post" style="display: none" id="form-delete">
                @csrf
                @method('delete')
            </form>
            <button type="button" class="btn btn-danger hide-modal">الغاء</button>
            <button type="button" class="btn btn-primary btn-confirm">تأكيد</button>
        </div>
  
      </div>
    </div>
</div>

@endsection

@push('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/plug-ins/1.10.22/i18n/Arabic.json"></script>
	<script>
		$(document).ready( function () {
			$('#example').DataTable({
				direction: "rtl",
				"order": [[ 0, 'desc' ]],
				"aLengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],
				"oLanguage": {"sUrl": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Arabic.json"}
			});

            // hide modal
            $('.hide-modal').click(function(){
                $('#myModal').slideUp(500);
            })
            // delete record
            $('.delete').click(function(){
                $('#myModal').slideDown(500);
               let id= parseInt($(this).data('id')),
                  form = $('#form-delete');
                   form.attr('action',form.data('url')+'/'+id);
               
            });

            // close modal cliking in overlay only
            $('#myModal').on('click',function(e){
                e.target.id=="myModal" ?$('#myModal').slideUp(500) : 'break';
            });

            // confirm btn submit form 
            $('.btn-confirm').click(function(){
                $('#form-delete').submit();
            })


		} );
	</script>
@endpush

@push('css')
    <style>
        .bg-secondary,.bg-secondary .sorting_1{
            background: #ddd!important;
        }
    </style>
@endpush