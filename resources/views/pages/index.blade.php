@extends('layouts.app')

@section('content')
    <!---cover---->
    <div id='cover' class='white-text'>
        <h1 class='text-center'>{{$title}}</h1>
            <p class='text-center'>this is the home page</p>
        <div class='text-center'>
            <a href="{{ route('register') }}"><button type='button' class='btn signUp'>Join A Team</button></a>
            <a href="{{ route('register') }}"><button type='button' class='btn signUp'>Post A Project</button></a>
        </div>
    </div>

    <!--------------------------------- how it works ---------------->
    <div id='about' class='container'>
        <div class='about orange-text'>
            <h2 class='text-center heading'>
                HOW IT WORKS?
            </h2>
            <div class='row'>
                <div class='col col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center'>
                    <p class='placeholder'>
                        img-holder
                    </p>
                </div>
                <div class='col col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center'>
                    <h1>lorem ipsum dolor </h1>
                    <p class='text'>
                            lorem ipsum dolor sit amet, consecteur adisci
                            ng elit. Proin tincidunt, eros et varius finibus, a
                            nte diam semper mi, sed interdum est ex in ip
                            sum. Nam...
                    </p>
                </div>
            </div>
            <div class='row'>
                <div class='col col-lg-6 col-md-6 col-sm-6 text-center'>
                    <h1>lorem ipsum dolor </h1>
                    <p class='text'>
                            lorem ipsum dolor sit amet, consecteur adisci
                            ng elit. Proin tincidunt, eros et varius finibus, a
                            nte diam semper mi, sed interdum est ex in ip
                            sum. Nam...
                    </p>
                </div>
                <div class='col col-lg-6 col-md-6 col-sm-6 text-center'>
                    <p class='placeholder'>
                            img-holder
                    </p>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-6 col-md-6 col-sm-6 text-center'>
                    <p class='placeholder'>
                        img-holder
                    </p>
                </div>
                <div class='col col-lg-6 col-md-6 col-sm-6 text-center'>
                    <h1>lorem ipsum dolor </h1>
                    <p class='text'>
                            lorem ipsum dolor sit amet, consecteur adisci
                            ng elit. Proin tincidunt, eros et varius finibus, a
                            nte diam semper mi, sed interdum est ex in ip
                            sum. Nam...
                    </p>
                </div>
            </div>
        </div>
    </div>
<a href='/#id' >click</a>

    <!-------------------------------- end of how it works ---------------->

    <!----------------------------------- footer ---------------->
    <footer class='fooStyle'>
        <div class='container'>
        <div class='row'>
            <div class='col-lg-6 col-md-6 col-sm-6'>
                <div class='fooNav'>
                    <h2>Navigation</h2>
                    <ul class='footerNav'>
                        <li><a class='' href="/feed">Feed</a></li>
                        <li><a class='' href="/browse">Browse</a></li>
                        <li><a class='' href="/#about">About Us</a></li>
                        <li><a class='' href="/#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class='col-lg-6 col-md-6 col-sm-6 offset-4'>
                <div id='contact' class='contactUs'>
                    <h1>This is the contact section</h1>
                </div>
            </div>
        </div>
        </div>

    <footer>
    <!-------------------------------- end of footer ---------------->
@endsection