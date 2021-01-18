@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" />
@endsection

@section('style')

@endsection

@section('content')
    <h2 class="content-heading">{{$title}}</h2>

    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="block">
                <div class="block-content block-content-full">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="no_po">Kode PO</label>
                            <input type="text" class="form-control" name="no_po" value="{{\App\Casts\PoHelper::no_po()}}" id="no_po" readonly />
                        </div>
                        <div class="form-group">
                            <label for="po_date">Tanggal PO</label>
                            <input type="text" class="form-control date" value="{{date("Y-m-d")}}" name="po_date" id="po_date"  />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Lanjutkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

@endsection

@section('script')
    <script>
        $(document).ready(function (){
            $("#po_date").datepicker({
                format:"yyyy-mm-dd"
            });
        })
    </script>
@endsection

