@extends("layouts.template")


@section("value")
<div class="row">
        @if(Gate::allows("is-admin"))
            <div class="col-md-5 container mt-2">
                <h3 class="text text-primary">Nouveau Utilisateur</h3>
                <form action="{{route('store.users')}}" method="post" class=" p-3 border border-dark">
                    @csrf
                    <div class="form-group">
                        <label for="">Username:</label>
                        <input type="text" id="" class="form-control" name="name" value="{{@old('name')}}">
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="email"  id="" class="form-control" name="email" value="{{@old('email')}}">
                        @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="container row">
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password"  id="" class="form-control col-md-12" name="password">
                            @error('password')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password Confirm:</label>
                            <input type="password"  id="" class="form-control col-md-12 ml-3" name="password_confirmation">
                            @error('password')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label for="">Role:</label>
                            <select name="role" id="" class="form-control mb-2 col-md-12">
                                <option value=""></option>
                                <option value="3">Admin</option>
                                <option value="2">Caissier</option>
                                <option value="1">Simple</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Register">
                    </div>
                </form>
            </div>
            <div class="col-md-6 mt-3">
                <h2 class="text text-primary">Utilsateur Disponibles</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td @if ($user->role == "3")
                                    class="text text-primary"
                                @elseif ($user->role == "2")
                                    class="text text-success"
                                @else
                                    class="text text-danger"
                                @endif>{{$user->role==3 ? "Admin" : (($user->role==2) ? "Caissier" : "Simple")}}</td>
                            <td>
                                {{-- <button class="btn btn-primary" wire:model="sseletItem({{$user->id}})">Modifier</button> --}}
                                <button class="btn btn-danger">Desactiver</button>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="container col-md-4">
                <h2 class="text text-primary">Modifier Mon Profil</h2>
                @if (Session::has("message"))
                    <div class="alert alert-success">
                        {{Session::get("message")}}
                    </div>
                @endif
                <form action="{{route("users.edit",Auth::user()->id)}}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="" class="text text-primary">Username:</label>
                        <input type="text" name="name" id="" class="form-control border border-dark" value={{Auth::user()->name}}>
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text text-primary">Email:</label>
                        <input type="email" name="email" id="" class="form-control border border-dark" value={{Auth::user()->email}}>
                        @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                   
                    <div class="form-group">
                        <label for="" class="text text-primary">New Password:</label>
                        <input type="password" name="password" id="" class="form-control border border-dark">
                        <input type="hidden" name="role" id="" class="form-control border border-dark" value="{{Auth::user()->role}}">
                        @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                  
                    <div class="form-group">
                        <button class="btn btn-success">Modifier</button>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
