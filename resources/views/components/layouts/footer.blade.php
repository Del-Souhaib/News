<link rel="stylesheet" href="{{asset('css/footer.css')}}">

<footer class="pt-5 pb-5 pl-sm-3 pr-sm-3 pl-md-4 pr-md-4 pl-lg-5 pr-lg-5">
    <div class="container-fluid">
        <div class="row    ">
            <div class="col-lg-2 col-md-3 col-sm-4 col-6   mb-3">
                <a href="{{url('/News/recentnews')}}">اخر الاخبار</a><br>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6  mb-3">
                <a href="{{url('/News/mostviews')}}">الاكتر مشاهدة</a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                <a href="{{url('/News/morocco')}}">المغرب</a><br>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                <a href="{{url('/News/world')}}">العالم</a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                <a href="{{url('/News/politic')}}">سياسة</a><br>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                <a href="{{url('/News/tech')}}">تقنية</a><br>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                <a href="{{url('/News/sport')}}">رياضة</a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                <a href="{{url('News/art')}}">فن ومشاهير</a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                <a href="{{url('News/health')}}">صحة</a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                <p class="contact" data-toggle="modal" data-target="#contactmodal">تواصل معنا</p><br>
            </div>

        </div>
        <hr>
        <div class="row align-items-center mb-3">

            <div class="col-sm-4 ">
                <ul class="  mt-3">
                    <li class="mb-3 ">
                        <a href="{{url('/Privacy&Policy')}}">
                            سياسة الخصوصية
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="">
                            معلومات حول اخباري الان
                        </a>
                    </li>
                    <li class="mb-3">
                        <p>  البريد الالكتروني : del.souhaib@gmail.com </p>
                    </li>
                    <li>
                        <p data-toggle="modal" data-target="#contactmodal" style="cursor: pointer">
                            للاعلان
                        </p>
                    </li>
                </ul>
            </div>


            <div class="col-sm-8 ">
                <hr class="d-sm-none mt-3 mb-2" style="width: auto">
                <div class="row  align-items-center mb-2">
                    <div class="col-lg-4 mb-3 mt-2">
                        <span class="ml-4">  تابعونا على :</span>
                    </div>
                    <div class="col-lg-8 d-flex flex-nowrap ">
                        <a href="https://www.facebook.com/%D8%A7%D8%AE%D8%A8%D8%A7%D8%B1%D9%8A-%D8%A7%D9%84%D8%A7%D9%86-105480091371481/?modal=admin_todo_tour" class="facebook"><img src="{{asset('Pics/Icons/Facebook.svg')}}" class="img-fluid"/></a>
                        <a href="" class="instagram"> <img src="{{asset('Pics/Icons/instagram.svg')}}" class="img-fluid"/></a>
                        <a href="" class="youtube"><img src="{{asset('Pics/Icons/youtube.svg')}}" class="img-fluid"/></a>
                    </div>
                </div>

            </div>
        </div>
        <hr>
        <div class="row mt-3">
            <div class="col-sm-6 ">
                <a href="https://www.linkedin.com/in/souhaib-allout/">جميع الحقوق محفوضة </a>
            </div>
            <div class="col-sm-6 d-flex justify-content-end  mb-3">
                <a href="https://www.linkedin.com/in/souhaib-allout/">Powered by Del</a>
            </div>

        </div>
    </div>
</footer>

<x-Modals.messageModal/>
