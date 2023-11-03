@extends('layouts.app')
@section('body_content')




<div class="container pt-5">

<h5><i class="bi bi-pencil-square"></i> About Us</h5>
<hr/>
<nav class="my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active"> About</li>
    </ol>
</nav>
    
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($contacts as $demo)   
            <tr>
                <td> {{$demo->name}} </td>
                <td>{{$demo->email}}</td>
                <td>{{$demo->subject}}</td>
                <td>{{$demo->message}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{$contacts->links()}}


</div>


@endsection