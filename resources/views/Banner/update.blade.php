@extends('layouts/layoutmaster')
@section('title', 'Cài đặt')
@section('content')
    <h1>Banner</h1>
    <form action="{{ route('banner.update') }}" method="POST">
        @csrf
        @method('PUT')
        <img src="{{ asset('storage/' .$mainBanner->banner_url)}}" height="100" width="100"/>
        <input type="file" id="" name="file" placeholder="Enter location"><br><br>

        @foreach($subBanner as $subBanner) 
            <img src="{{ asset('storage/' .$subBanner->banner_url)}}" height="100" width="100"/>
            <input type="file" id="" name="file" placeholder="Enter location"><br><br>
        @endforeach
        <button type="submit">Save</button>
    </form>
@endsection
