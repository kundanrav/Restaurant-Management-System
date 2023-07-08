
            <base href="/public">

            <!DOCTYPE html>
            <html lang="en">

            <head>

                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="">
                <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

                <title>Klassy Cafe - Restaurant HTML Template</title>
            <!--
                
            TemplateMo 558 Klassy Cafe

            https://templatemo.com/tm-558-klassy-cafe

            -->
                <!-- Additional CSS Files -->
                <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

                <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

                <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

                <link rel="stylesheet" href="assets/css/owl-carousel.css">

                <link rel="stylesheet" href="assets/css/lightbox.css">


                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                <style>
                    input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
            }
                </style>

                </head>
                
                <body>
                
                <!-- ***** Preloader Start ***** -->
                <div id="preloader">
                    <div class="jumper">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>  
                <!-- ***** Preloader End ***** -->
                
                
                <!-- ***** Header Area Start ***** -->
                <header class="header-area header-sticky">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <nav class="main-nav">
                                    <!-- ***** Logo Start ***** -->
                                    <a href="index.html" class="logo">
                                        <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                                    </a>
                                    <!-- ***** Logo End ***** -->
                                    <!-- ***** Menu Start ***** -->
                                    <ul class="nav">
                                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                                        <li class="scroll-to-section"><a href="#about">About</a></li>
                                        
                                    <!-- 
                                        <li class="submenu">
                                            <a href="javascript:;">Drop Down</a>
                                            <ul>
                                                <li><a href="#">Drop Down Page 1</a></li>
                                                <li><a href="#">Drop Down Page 2</a></li>
                                                <li><a href="#">Drop Down Page 3</a></li>
                                            </ul>
                                        </li>
                                    -->
                                        <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                                        <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                                        <li class="submenu">
                                            <a href="javascript:;">Features</a>
                                            <ul>
                                                <li><a href="#">Features Page 1</a></li>
                                                <li><a href="#">Features Page 2</a></li>
                                                <li><a href="#">Features Page 3</a></li>
                                                <li><a href="#">Features Page 4</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                                        <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                                    
                                    
                                    <li class="scroll-to-section">
                                        @auth
                                        <a href="{{url('/showcart',Auth::user()->id)}}">Cart[{{$showcount}}]</a>
                                        @endauth    

                                        @guest
                                        Cart[0]
                                        @endguest
                                        </a></li>
                                    
                                        <li>
                                            @if (Route::has('login'))
                                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                                @auth
                                                <li> 
                                                    <x-app-layout>
                                                        {{-- <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> --}}
                                                    </x-app-layout>
                                                    
                                                </li>
                                                @else
                                                <li> <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>
                            
                                                    @if (Route::has('register'))
                                                    <li> <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                                                    @endif
                                                @endauth
                                            </div>
                                        @endif
                            
                                        </li>
                                    </ul>        
                                    <a class='menu-trigger'>
                                        <span>Menu</span>
                                    </a>
                                    <!-- ***** Menu End ***** -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- ***** Header Area End ***** -->
            <div id="top">

                    <div class="table-responsive mt-5" style="
                        overflow: hidden;">
                        <table class="table table-striped
                        table-hover	
                        table-borderless
                        table-primary
                        align-middle">
                            <thead class="table-light">
                            
                                <tr>
                                    <th>Food Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                
                                </tr>
                                </thead>
                          
                                <tbody class="table-group-divider">
                                    <form action="{{url('orderconfirm')}}" method="post">
                                        @csrf
                                    @foreach ($data as $data)
                                    <tr class="table-primary" >
                                        <td scope="row"><input type="text" name="foodname[]" value="{{$data->title}}" hidden>
                                            {{$data->title}}</td>
                                        <td><input type="text" name="price[]" value="{{$data->price}}" hidden>{{$data->price}}</td>
                                        <td><input type="text" name="quantity[]" value="{{$data->quantity}}" hidden>{{$data->quantity}}</td>
                                        
                                    </tr>
                                    
                                    @endforeach

                                    @foreach ($data2 as $data2)
                                    <tr style="position: relative; top:-87px; right:-1020px;">
                                    <td><a href="{{url('/remove',$data2->id)}}" class="btn btn-warning">Remove</a></td>
                                </tr>  
                                    @endforeach
                                
                                </tbody>
                               
                              </table>
                        <div align="center" style="padding:10px">
                            <button class="btn btn-primary" id="order" type="button">Order Now</button>
                        </div>
                        <div id="apear" style="width: 80%; margin-left:100px">
                        <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="Name" aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="number" name="phone" id="" class="form-control" placeholder="PhoneNumber" aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" name="address" id="" class="form-control" placeholder="Address" aria-describedby="helpId">
                        </div>
                        <div align="center">
                            <button type="submit" class="btn btn-success">Order Confirm</button>
                        {{-- <input class="" type="submit" value="Order Confirm"> --}}
                        <button class="btn btn-danger" type="button" id="close" style="">Close</button>
                        </div>
                        </div>
                    </form>
                    </div>
               
                </div>


                <script>
                    $('#apear').hide();
                    $('#order').click(
                        function () {
                            $('#apear').show();
                            
                        }
                    );

                    $('#close').click(
                        function () {
                            $('#apear').hide();
                            
                        }
                    );
                </script>
                
                <!-- jQuery -->
                <script src="assets/js/jquery-2.1.0.min.js"></script>

                <!-- Bootstrap -->
                <script src="assets/js/popper.js"></script>
                <script src="assets/js/bootstrap.min.js"></script>

                <!-- Plugins -->
                <script src="assets/js/owl-carousel.js"></script>
                <script src="assets/js/accordions.js"></script>
                <script src="assets/js/datepicker.js"></script>
                <script src="assets/js/scrollreveal.min.js"></script>
                <script src="assets/js/waypoints.min.js"></script>
                <script src="assets/js/jquery.counterup.min.js"></script>
                <script src="assets/js/imgfix.min.js"></script> 
                <script src="assets/js/slick.js"></script> 
                <script src="assets/js/lightbox.js"></script> 
                <script src="assets/js/isotope.js"></script> 
                
                <!-- Global Init -->
                <script src="assets/js/custom.js"></script>
                <script>

                    $(function() {
                        var selectedClass = "";
                        $("p").click(function(){
                        selectedClass = $(this).attr("data-rel");
                        $("#portfolio").fadeTo(50, 0.1);
                            $("#portfolio div").not("."+selectedClass).fadeOut();
                        setTimeout(function() {
                        $("."+selectedClass).fadeIn();
                        $("#portfolio").fadeTo(50, 1);
                        }, 500);
                            
                        });
                    });

                </script>
            </body>
            </html>