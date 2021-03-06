@extends('layouts.app')
@section('title','Input Data program_studi')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Input Data Program Studi</div>

                    <div class="card-body">

{{--                        @include('validation_error')--}}

                        {{ Form::open(['url'=>'program_studi'])}}

                        @csrf

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Kode Program Studi</label>
                            <div class="col-md-3">
                                {{ Form::text('PS_Kode_Prodi',null,['class'=>'form-control','placeholder'=>'Kode program studi'])}}
                            </div>
                        </div>

                        @include('program_studi.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">

                                {{ Form::submit('Simpan Data',['class'=>'btn btn-primary'])}}
                                <a href="/Program Studi" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
