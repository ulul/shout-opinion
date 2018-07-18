@extends('layouts.app')

@section('header')
    @include('layouts.partials.header')
@endsection

@section('nav')
    @include('layouts.partials.nav')
@endsection

@section('content')
<div class="row">
            <div class="col-sm-6">
                <div style="margin-bottom: 12rem"></div>
                <!--special mark for article-->
                <h6 class="mr-auto">FUTURE HUMAN</h6>
                <!--Main title of article-->
                <h1 class="font-weight-bold mr-auto">How Different Will Humans Be in a Century?</h1>
                <!--Short synopsis-->
                <h6 class="mr-auto">A little or a lot, depending where you’re coming from.</h6>
                <img src="user.jpeg" id="WriterImg" alt="Writer Image Before Article">
                <p id="UserFirst"> by
                    <a href="https://medium.com/@alexvikmanis">Alex Vikmanis</a>
                </p>
            </div>
            <div class="col-sm-6">
                <div style="margin-bottom: 5rem"></div>
                <img src="postimage.png" alt="Main Image for post">Illustration by Kouzou Sakai</img>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <p id="para1">When confronted with my own future in five or ten years, I’m overwhelmed with trying to picture where I’ll
                    be or what I’ll look like (after all, I just randomly shaved my head last week). When confronted with
                    the question of what humanity will look like in 100 years, I go completely blank. That’s why we asked
                    several artists last week, and several more this week, to dream up their idea of a Future Human for Medium’s
                    latest monthly magazine.</p>
                <p>Their lively and imaginative portraits pushed the boundaries of transportation, fashion, and technology.
                    We’ll be publishing more entries over the next two weeks of July. You can find the first entry right
                    here.
                </p>
                <p>Humans themselves are stronger because they implant machines into their bodies, so they are not limited physically.
                    They use smart masks to connect with other humans and the cloud simultaneously.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <img src="user.jpeg" id="WriterImg" alt="Main Image for post">
                <a> by </a>
                <a href="#">Writer</a>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 1cm">
            <div class="col-md-4">
                <a href="/w3images/lights.jpg">
                    <img src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2016/07/28/12/quran-getty-0.jpeg" class="thumbnail"
                        alt="Lights" style="width:100%">
                    <div class="caption">
                        <p>Lorem ipsum...</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="/w3images/nature.jpg">
                    <img src="https://ardan7779.web.id/wp-content/uploads/2018/03/Al-Quran-1.jpg" class="thumbnail" alt="Nature" style="width:100%">
                    <div class="caption">
                        <p>Lorem ipsum...</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="/w3images/fjords.jpg">
                    <img src="https://cdn.vox-cdn.com/thumbor/th5YNVqlkHqkz03Va5RPOXZQRhA=/0x0:2040x1360/1200x800/filters:focal(857x517:1183x843)/cdn.vox-cdn.com/uploads/chorus_image/image/57358643/jbareham_170504_1691_0020.0.0.jpg"
                        class="thumbnail" alt="Fjords" style="width:100%">
                    <div class="caption">
                        <p>Lorem ipsum...</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row" style="background-color: black">
            <div class="col-4"><p style="color: white">Discover Medium</p>
            <p style="color: grey">Welcome to a place where words matter. On Medium, smart voices and original ideas take center stage — with no ads in sight.</p>
            </div>
            <div class="col-4"><p style="color: white">Discover Medium</p>
                <p style="color: grey">Welcome to a place where words matter. On Medium, smart voices and original ideas take center stage — with no ads in sight.</p></div>
            <div class="col-4"><p style="color: white">Discover Medium</p>
                <p style="color: grey">Welcome to a place where words matter. On Medium, smart voices and original ideas take center stage — with no ads in sight.</p></div>
        </div>
@endsection