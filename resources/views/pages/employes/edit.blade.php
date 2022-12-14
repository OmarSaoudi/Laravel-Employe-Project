@extends('layouts.master')

@section('title')
    Edit Employe
@stop

@section('css')
<style>
    .radio-item input[type="radio"]{visibility : hidden;width:20px;height:20px;margin: 0 5px 0px 5px;padding: 0;cursor: pointer;}
    .radio-item input[type="radio"]:before{position : relative;margin: 4px -25px -4px 0;display: inline-block;visibility : visible;width:20px;height:20px;border-radius: 10px;border: 2px inset rgb(150,150,150,0.75);background: radial-gradient(ellipse at top left, rgb(255,255,255) 0%,rgb(250,250,250), 5%,rgb(230,230,230) 95%, rgb(225,255,255) 100%);content: '';cursor: pointer;}
    .radio-item input[type="radio"]:checked:after{position : relative;top:  0;left: 9px;display: inline-block;border-radius: 6px; visibility : visible;width:12px;height:12px;background: radial-gradient(ellipse at top left, rgb(240,255,220) 0%,rgb(225,250,100), 5%,rgb(75,75,0) 95%, rgb(25,100,0) 100%);content: '';cursor: pointer;}
    .radio-item input[type="radio"].true:checked:after{background: radial-gradient(ellipse at top left, rgb(240,255,220) 0%,rgb(225,250,100), 5%,rgb(75,75,0) 95%, rgb(25,100,0) 100%);}
    .radio-item input[type="radio"].false:checked:after{background: radial-gradient(ellipse at top left, rgb(255,255,255) 0%,rgb(250,250,250), 5%,rgb(230,230,230) 95%, rgb(225,255,255) 100%);}
    .radio-item label{display: inline-block;margin: 0;padding: 0;line-height: 25px;height:25px;cursor: pointer;}
</style>
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Employes
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="{{ route('employes.index') }}">Employes</a></li>
       <li class="active">Edit Employe</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Edit Employe</h3>
          </div>
            <div class="box-body">
                    <form action="{{ route('employes.update','test') }}" method="POST">
                       @csrf
                       {{ method_field('PATCH') }}

                       {{-- 1 --}}
                       <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Name Arabic</label>
                              <input type="hidden" value="{{ $employes->id }}" name="id">
                              <input type="text" name="name" value="{{ $employes->getTranslation('name', 'ar') }}" class="form-control" required>
                              <span class="help-block with-errors"></span>
                           </div>
                         </div>
                         <div class="col-md-6">
                           <div class="form-group">
                              <label>Name English</label>
                              <input type="text" name="name_en" value="{{ $employes->getTranslation('name', 'en') }}" class="form-control" required>
                              <span class="help-block with-errors"></span>
                           </div>
                         </div>
                     </div>
                     {{-- End 1 --}}

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="email" name="email" value="{{ $employes->email }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="password" name="password" class="form-control" value="{{ $employes->password }}" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                              </div>
                        </div>
                        {{-- End 2 --}}

                        {{-- 3 --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Genders</label>
                                   <select name="gender_id" class="form-control" required>
                                      <option value="" selected disabled>Select Gender</option>
                                      @foreach ($genders as $gender)
                                          <option value="{{ $gender->id }}" {{ $employes->gender_id == $gender->id ? 'selected' : '' }}>{{ $gender->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Nationalities</label>
                                   <select name="nationalitie_id" class="form-control" required>
                                      <option value="" selected disabled>Select Nationalitie</option>
                                      @foreach ($nationalities as $nationalitie)
                                          <option value="{{ $nationalitie->id }}" {{ $employes->nationalitie_id == $nationalitie->id ? 'selected' : '' }}>{{ $nationalitie->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                     <label>Bloods</label>
                                     <select name="blood_id" class="form-control" required>
                                       <option value="" selected disabled>Select Blood</option>
                                       @foreach ($bloods as $blood)
                                          <option value="{{ $blood->id }}" {{ $employes->blood_id == $blood->id ? 'selected' : '' }}>{{ $blood->name }}</option>
                                       @endforeach
                                     </select>
                                     <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Specializations</label>
                                   <select name="specialization_id" class="form-control" required>
                                      <option value="" selected disabled>Select Specialization</option>
                                      @foreach ($specializations as $specialization)
                                          <option value="{{ $specialization->id }}" {{ $employes->specialization_id == $specialization->id ? 'selected' : '' }}>{{ $specialization->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 3 --}}

                        {{-- 4 --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>Date of Birth</label>
                                  <input type="date" name="date_birth" value="{{ $employes->date_birth }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" class="form-control" value="{{ $employes->address }}" name="address" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>Joining Date</label>
                                  <input type="date" class="form-control" name="joining_date" value="{{ $employes->joining_date }}" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Status</label>
                                   <br>
                                   <span class="radio-item">
                                   <input type="radio" name="status" value="A" {{ $employes->status == 'A' ? 'checked' : '' }}> &nbsp;Active &nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="radio" name="status" value="I" {{ $employes->status == 'I' ? 'checked' : '' }}> &nbsp;Inactive
                                   </span>
                                </div>
                            </div>
                        </div>
                        {{-- End 4 --}}

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('employes.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')

@endsection
