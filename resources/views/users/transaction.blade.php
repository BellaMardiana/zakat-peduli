@extends('users.templates.source')

@section ('content')
    <div class="container-fluid">
            <form action="{{route('transaction.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pilihan Donasi</h3>
                    </div>
                    <div class="panel-body">
                        <label>Nama Donasi :</label>
                        <select name="donation" id="" class="form-control">
                            @foreach ($donations as $donation)
                                <option value="{{ $donation->id }}">{{ $donation->nama_donasi }}</option>
                            @endforeach
                        </select>
                        <br>
                        <label>Program Donasi :</label>
                        <select name="program" id="" class="form-control">
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->nama_program }}</option>
                            @endforeach
                        </select>
                        <br>
                        <label>Nominal (Rp.) :</label>
                        <input type="number" class="form-control amount" name="nominal" placeholder="0" required="required" min="10000">
                        <span class="help-block">*Minimal 10000</span>
                        <br>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Profil Donatur</h3>
                    </div>
                    <div class="panel-body">
                        <label>Sapaan :</label>
                        <select class="form-control">
                            <option value="">Bapak</option>		
                            <option value="">Ibu</option>								
                        </select>
                        <br>
                        <label>Nama Lengkap :</label>
                        <input type="name" class="form-control" name="atas_nama" value required="required">
                        <br>
                        <label>Email :</label>
                        <input type="email" class="form-control" name="email" value required="required">
                        <br>
                        <label>Telepon / HP :</label>
                        <input type="number" class="form-control" name="telepon" value required="required">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel paanel success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Metode Pembayaran</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#banktransfer" aria-expanded="true">Transfer Bank</a>                                        
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#online" aria-expanded="false">Online Payment</a>                                        
                            </li>
                        </ul>
                    <div class="tab-content">
                        <div id="banktransfer" class="tab-pane fade  active in">
                            <div class="radio radio-metode-donasi">
                                <label>
                                    <input type="radio" class="" name="" value="" checked="checked">
                                    <img src="{{ asset('assets/img/logo-bca.png') }}"> 
                                </label>
                            </div>
                        </div>
        
                        <div id="online" class="tab-pane fade">
                            <div class="radio radio-metode-donasi">
                                <label>
                                    <input type="radio" class="" name="" value="" >
                                    <img src="{{ asset('assets/img/logo-cimb-clicks.png') }}"> 
                                </label>
                            </div>
                        </div>
                    </div>                                   
                </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-block btn-lg btn-warning" value="Donasi Sekarang">
                    </div>
                </div>
            </div>     
        </form>           
    </div>
</div>
@endsection