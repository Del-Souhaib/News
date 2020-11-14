<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.files/>
    <link rel="stylesheet" href="{{asset('css/Admins/Home.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
            integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <title>Statics</title>
</head>
<body>

<div class="container-fluid  p-0 mb-5">
    <div class="row">
        <div class="col-md-2 col-sm-12">
            <x-admin.layouts.LeftNavbar/>
        </div>
        <div class="col-md-10 col-sm-12">
            <div class="row">
                <div class="col-4 mt-5 text-decoration-underline">
                    <h2 class="bigtitle">- New users</h2>
                </div>
                <div class="col-12 mt-5">
                    <canvas id="userschart" style="width: 100vw;height:70vh"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5 text-decoration-underline">
                    <h2 class="bigtitle">- Categories popular</h2>
                </div>
                <div class="col-11 mt-5">
                    <canvas id="PostCatPopular" style="width: 80vw;height:80vh"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5 text-decoration-underline">
                    <h2 class="bigtitle">- Top news visited</h2>
                </div>
                <div class="col-11 mt-5">
                    <canvas id="Topnews" style="width: 70vw;height:70vh"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /**Users**/

    var ctx = document.getElementById('userschart');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                @foreach($users as $user)
                    "{{$user->date2}}",
                @endforeach
            ],
            datasets: [
                {
                    label: 'New users per day',
                    borderColor: 'orange',
                    backgroundColor: 'rgb(229, 161, 73,0.2)',
                    borderWidth: 1,
                    data: [
                        @foreach($users as $user)
                        {{$user->nb}},
                        @endforeach
                    ],

                },
            ],
        },
        options: {
            legend: {
                display: true,
                labels: {
                    fontColor: 'black'
                }
            },
            scales: {
                xAxes: [{
                    display: true,
                    ticks: {
                        fontColor: 'black',
                    }
                }],
                yAxes: [{
                    display: true,
                    ticks: {
                        suggestedMin: 0,
                        fontColor: 'black',
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            },
        }
    });
    /**Post categuroy popular**/
    var ctx2 = document.getElementById('PostCatPopular');
    var label2 = [
        @foreach($categoriesvisits as $category)
            "{{$category->category}}",
        @endforeach

    ]

    var myBarChart2 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: [
                @foreach($categoriesvisits as $category)
                    "{{$category->category}}",
                @endforeach
            ],
            datasets: [{
                data: [
                    @foreach($categoriesvisits as $category)
                    {{$category->nb}},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132,0.2 )',
                    'rgb(150, 75, 75,0.3)',
                    'rgba(255, 206, 86,0.3 )',
                    'rgba(75, 192, 192,0.3 )',
                    'rgba(153, 102, 255,0.3 )',
                    'rgba(241,44,44,0.3)'
                ],

            }],
        },

        options: {
            tooltips: {
                mode: 'point'
            }
        }
    });

    /**Top news**/
    var ctx2 = document.getElementById('Topnews');

    var myBarChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            label: "haha",
            datasets: [
                {
                    labels: "hahaha",
                    data: [
                        @foreach($news as $new)
                        {{$new->nb}},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132,0.5 )',
                        'rgb(150, 75, 75,0.5)',
                        'rgba(255, 206, 86,0.5 )',
                        'rgba(75, 192, 192,0.5 )',
                        'rgba(153, 102, 255 ,0.5)',
                        'rgba(255, 159, 64,0.5)'
                    ],
                    borderColor: [
                        'rgb(255,0,55)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                }
            ],
        },

        options: {
            scales: {
                xAxes: [{
                    display: true,
                    ticks: {
                        fontColor: 'black',
                    },
                    labels: [
                        @foreach($news as $new)
                            "{{$new->post_id}}",
                        @endforeach
                    ]
                }],
                yAxes: [{
                    display: true,
                    ticks: {
                        fontColor: "black",
                        beginAtZero: true,
                        stepSize: 1,
                    }
                }]
            }
        }
    });
</script>
</body>
</html>
