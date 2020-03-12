@extends('layouts.app')
@section('title','Edit Data program_studi')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Data jurusan</div>

                    <div class="card-body">
                        @include('validation_error')

                        {{ Form::model($jurusan,['url'=>'program_studi/'.$jurusan->kode_mk,'method'=>'PUT'])}}

                        @csrf

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Kode jurusan</label>
                            <div class="col-md-6">
                                {{ Form::text('kode_mk',null,['class'=>'form-control','placeholder'=>'Kode program_studi','readonly'=>''])}}
                            </div>
                        </div>

                        @include('program_studi.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">

                                {{ Form::submit('Simpan Data',['class'=>'btn btn-primary'])}}
                                <a href="/jurusan" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
