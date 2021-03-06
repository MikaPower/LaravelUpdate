@extends('layout')

@section('content')
<div class="row justify-content-center">
<h1>Pedidos</h1>
</div>

<div class="container" id="contem">
    <div class="row justify-content-center "id="teste">
        <div class="col">
            <form method="post" action="/orders" id="add_name">
                {{csrf_field()}}
                <div class="form-group" id="dynamic_field">
                    <label for="order">Numero Pedido</label>
                    <input type="text" class="form-control is-valid" id="order"
                           aria-describedby="emailHelp" name="order" placeholder="Pedido id" value="{{old('order')}}">
                </div>
        </div>

        <div class="col">
            <div class="form-group" id="testev1">
                <label for="title">Titulo</label>
                <input type="text" class="form-control is-valid" id="title" name="title" placeholder="Texto"  value="{{ old('title')}}" >
            </div>
        </div>
        <?php use App\User; ?>
        @hasrole('admin')
            <div class="col">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Fornecedor</label>
                    <select class="form-control" name="provider_id" id="exampleFormControlSelect1">
                       <?php
                       //BAD EXAMPLE, USE CONTROLLER MAYBE
                       $users = User::role('provider')->get();
                        ?>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        @endhasrole



       <!-- <div class="col-3">
            <button type="button" onclick="duplicate()" id="add" class="btn btn-success">Add More</button>
        </div>-->



    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    </form>


<script>
    var i = 0;
    var original = document.getElementById('teste');


    function duplicate() {
        Element.prototype.appendAfter = function (element) {
        element.parentNode.insertBefore(this, element.nextSibling);
    }, false;

        var clone = original.cloneNode(true); // "deep" clone
        clone.id = "duplicater" + ++i;
        // or clone.id = ""; if the divs don't need an ID
       clone.appendAfter(document.getElementById("teste"));
    }
</script>




@endsection
