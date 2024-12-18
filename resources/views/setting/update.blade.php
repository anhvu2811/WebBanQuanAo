@extends('layouts/layoutmaster')
@section('title', 'Cài đặt')
@section('content')
    <h1>Setting</h1>
    <form action="{{ route('setting.update') }}" method="POST">
        @csrf
        @method('PUT')
        <label for="location">Địa chỉ:</label><br>
        <input type="text" id="location" name="location" placeholder="Enter location" value="{{ $setting->location ?? '' }}" required><br><br>

        <label for="hotline">Hotline:</label><br>
        <input type="text" id="hotline" name="hotline" placeholder="Enter hotline" value="{{ $setting->hotline ?? '' }}" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" placeholder="Enter email" value="{{ $setting->email ?? '' }}" required><br><br>
        
        <label for="logo">Logo:</label>
        @if($setting->logo)
            <img src="{{ asset('storage/' . $setting->logo )}}"/> <br>
        @endif
            No logo yet<br>
        <input type="file" id="logo" name="logo" placeholder="Enter logo" ><br><br>

        <label for="time_active">Thời gian hoạt động:</label><br>
        <input type="text" id="time_active" name="time_active" placeholder="Enter time active" value="{{ $setting->time_active ?? '' }}" required><br><br>

        <label for="site_name">Tên trang web:</label><br>
        <input type="text" id="site_name" name="site_name" placeholder="Enter site name" value="{{ $setting->site_name ?? '' }}" required><br><br>

        <label for="site_description">Mô tả trang web:</label><br>
        <input type="text" id="site_description" name="site_description" placeholder="Enter site description" value="{{ $setting->site_description ?? '' }}" required><br><br>

        <button type="submit">Save</button>
    </form>
@endsection
