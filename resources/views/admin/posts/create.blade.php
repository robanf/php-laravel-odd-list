@extends('layouts.app')
@section('content')

<div class="container">
@if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li> 
                    @endforeach
                </ul>
            </div>
        @endif

<form action="{{route('admin.posts.store')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="titolo" class="form-label">titolo</label>
      <input type="string" class="form-control" name="title" id="titolo" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="categorie">Scegli categoria</label>
        <select name="category_id" id="categorie">
        <option value="">--Seleziona una categoria--</option>
        @foreach($categories as $item)
            <option value="{{$item->id}}"@if($item->id == old('category_id'))
          selected
          @endif>{{$item->name}}</option>

        @endforeach

        </select>
    </div>
    <div class="mb-3">
        <label for="">Scegli tags</label>
        <div class="mb-3 d-flex">
            @foreach($tags as $tag)
            <div class="mx-2">
                <input type="checkbox" id="tag{{$loop->iteration}}" 
                @if(in_array($tag->id, old('tags',[])))
                    checked
                @endif
                name="tags[]" value="{{$tag->id}}">
                <label for="tag{{$loop->iteration}}">{{$tag->name}}</label>
            </div>    
    
            @endforeach
        </div>

        
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection