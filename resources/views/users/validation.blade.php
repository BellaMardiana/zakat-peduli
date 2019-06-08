@extends('users.templates.source')

@section ('content')

<div class="container-fluid">

    <div class="row">
        <h3>Data Pembayaran Donasi</h3>
        <div class="col-md-12" style="background:white">
            <div class="row">
                <table class="table table-hover table-striped">
                    <thead> 
                        <tr>
                            <th>ID</th>
                            <th>NAMA DONASI</th>
                            <th>PROGRAM DONASI</th>
                            <th>ATAS NAMA</th>
                            <th>NOMINAL</th>
                            <th>TANGGAL DONASI</th>
                            <th>BUKTI BAYAR</th>
                            <th>STATUS</th>            
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <td>{{$transaction->id}}</td>
                            <td>{{$transaction->donation_id}}</td>
                            <td>{{$transaction->program_id}}</td>
                            <td>{{$transaction->atas_nama}}</td>
                            <td>{{$transaction->nominal}}</td>
                            <td>{{$transaction->created_at}}</td>
                            <td><img src="{{asset($transaction->image)}}" height="100px" alt=""</td>
                            <td></td>
                            <td><a href="{{ route('transaction.edit',$transaction) }}" data-toggle="modal" data-target="#upload" class="btn btn-warning">UPLOAD</a></td>
                        </tr>   
                        @endforeach                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="upload">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Upload Bukti Pembayaran</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('transaction.update') }}" enctype="multipart/form-data"> 
                    <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"><br>
                    <input type="hidden" name="id_transaction" id="id_transaction">
                    <input type="submit" name="submit" value="Kirim" class="btn btn-success" style="float:left;margin-right:10px">          
                    @csrf   
                    {{method_field('PUT')}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

