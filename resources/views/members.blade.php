@extends('layouts.app')

@section('content')

    <div class="content-container">

        <div class="panel panel-body">

            <h1 class="text-center">Member Directory</h1>

            <div class="col-lg-12">
                @foreach($members as $member)
                    <div class="member-listing well col-lg-6">
                        <div class="pull-left member-profile-photo">
                            <img src="{{$member->photo ? '/images/users/' .
                            $member->photo->path  : '/img/IWP-Logo-Medium.gif'}}" alt="">
                        </div>

                        <h3>
                            <strong>{{$member->first_name . ' ' . $member->last_name}}</strong>

                        </h3>

                        <h3 class="pull-left">{{$member->role->name}}</h3>

                        @if(Auth::user())
                            <a class="btn btn-primary pull-right" href="{{route('member.profile',$member->id)}}">View</a>
                        @endif
                    </div>
                @endforeach

            </div>
            <div class="col-lg-12">
                <div class="text-center">
                    {{$members->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection