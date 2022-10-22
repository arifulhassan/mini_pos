@extends('layout.main')


@section('main_content')



     @if ($errors->any())
     <div class="alert alert-danger">
        <ul>
           @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
           @endforeach
        </ul>
     </div>
     @endif

<!-- headline -->
     @if($mode == 'edit')
       <h2>Update <strong>{{ $user->name }} </strong>Information</h2>

    @else
       <h2>Add New User</h2>

    @endif

    <!-- <h2> {{ $headline }} </h2> -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">{{ $headline }}</h6>
        </div>
        <div class="card-body">

          <div class="row justify-content-md-center">
              <div class="col-md-6">

                @if($mode == 'edit')

                {!! Form::model($user,[ 'route' => ['users.update',$user->id], 'method' => 'put' ]) !!}

                  @else
                  {!! Form::open([ 'route' => 'users.store', 'method' => 'post' ]) !!}

              @endif


                <!-- <form method="POST" action="{{ url('users') }}"> -->
                       <!-- {!! Form::open([ 'url' => 'users', 'method' => 'post' ]) !!} -->

                  <!-- @csrf -->
                  <!-- <div class="form-group row">
                     <label for="name" class="col-sm-2 col-form-lable">Name</label>
                     <input type="name" class="form-control" id="name" placeholder="Enter Name">
                   </div> -->

                   <!-- <div class="form-group row">
                     <label for="name" class="col-sm-2 col-form-lable">User Group</label>
                     <div class="col-sm-10">
                       <select class="form-control" name="group">
                          <option value="">Select Group</option>

                                @foreach($groups as $key => $group)
                                  <option value="{{ $key }}"> {{ $group }} </option>
                                @endforeach

                       </select>
                    </div>
                   </div> -->


                   <div class="form-group row">
                     <label for="name" class="col-sm-2 col-form-lable">User Group <span class="text-danger">*<span> </label>
                     <div class="col-sm-10">
                     <!-- {{ Form::select('group', ['1' => 'Owner', '2' => 'Customer'], NULL, ['class' => 'form-control', 'id' => 'group', 'placeholder' => 'Enter Group'] ) }} -->
                     {{ Form::select('group_id', $groups, NULL, [ 'class' => 'form-control', 'id' => 'group', 'placeholder' => 'Enter Group' ]) }}


                    </div>
                  </div>

                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-lable">Name<span class="text-danger">*<span></label>
                      <div class="col-sm-10">
                      {{ Form::text('name', NULL, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter Name']) }}
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="name" class="col-sm-2 col-form-lable">Phone<span class="text-danger">*<span></label>
                     <div class="col-sm-10">
                     {{ Form::text('phone', NULL, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Enter Phone']) }}
                    </div>
                  </div>

                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-lable">Email</label>
                      <div class="col-sm-10">
                      {{ Form::text('email', NULL, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter Email']) }}
                     </div>
                   </div>


                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-lable">Address</label>
                        <div class="col-sm-10">
                        {{ Form::text('address', NULL, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Enter Address']) }}
                       </div>
                     </div>



                     <div class="mt-3">
                       <button type="submit" class="btn btn-primary">Submit</button>
                     </div>

                                  <!-- </form> -->
                                  {!! Form::close() !!}

                             </div>
                         </div>

              </div>
          </div>






@stop
