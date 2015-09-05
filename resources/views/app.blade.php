<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Instaveritas</title>
        <link href="{{ asset('/semantic/semantic.css')}}" rel="stylesheet">
        <link href="{{ asset('/semantic/docs.css')}}" rel="stylesheet">
        <link href="{{ asset('/semantic/savePNG.css')}}" rel="stylesheet">

        <script src="{{asset('/semantic/jquery.min.js')}}"></script> 
        <script src="{{asset('/semantic/semantic.min.js')}}"></script>


    </head>
    <body id="example" class="stat pushable" ontouchstart="">
        <div class="ui large top fixed menu inverted transition visible" style="display: flex !important;">
          <div class="ui container">
            <a class="item" href="{{Config::get('app.url')}}"><b>Instaveritas</b></a>
            @if (!Auth::guest())
            @if(Auth::user()->levelId!='4')
            <a class="item" href="{{Config::get('app.url')}}lots/print"><b>Address</b></a>
            <a class="item" href="{{Config::get('app.url')}}lots/icr"><b>ICR</b></a>
            <a class="item" href="{{Config::get('app.url')}}lots/identity"><b>ID</b></a>
            @endif            
            @endif
            <div class="right menu">
                 @if (Auth::guest())
                <a class="item" href="{{Config::get('app.url')}}/auth/login">Login</a>
                @else
                @if(Auth::user()->levelId!='4')
                <div class="item">
                    <div class="ui action left icon input">
                      <div class="ui search">
                        <div class="ui icon input">
                          <input class="prompt" type="text" placeholder="Search Employee">
                          <i class="search icon"></i>
                        </div>
                        <div class="results"></div>
                      </div>
                    </div>
                </div>   
                @endif
                <a class="item">{{ Auth::user()->name }} </a>
                <a class="item" href="{{Config::get('app.url')}}/auth/logout" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Logout </a>                       
                @endif                
            </div>
          </div>
        </div>        


        @yield('content')



        

        <script src="{{asset('/semantic/html2canvas.js')}}"></script>
        <script src="{{asset('/semantic/jquery.tablesort.min.js')}}"></script>
        <script src="{{asset('/semantic/base64.js')}}"></script>
        <script src="{{asset('/semantic/canvas2image.js')}}"></script>
        <script src="{{asset('/semantic/canvasPNG.js')}}"></script>        


        @yield('extra')

        <script type="text/javascript">
        // $('table').tablesort();
        // /$('.ui.checkbox').checkbox();


        </script>

        <script type="text/javascript">

            $(function () {

                var table = $('<table></table>');
                table.append('<thead><tr><th class="number">Number</th></tr></thead>');
                var tbody = $('<tbody></tbody>');
                for (var i = 0; i < 100; i++) {
                    tbody.append('<tr><td>' + Math.floor(Math.random() * 100) + '</td></tr>');
                }
                table.append(tbody);
                $('.example.ex-2').append(table);

                $('table').tablesort().data('tablesort');

                $('thead th.number').data('sortBy', function (th, td, sorter) {
                    return parseInt(td.text(), 10);
                });

            });
        </script>      


        <script type="text/javascript">

        //$('#mySel').change(function() {
        //        alert('It worked!');
        //    });
           
            var HOST = "{{Config::get('app.url')}}";


            $('.ui.search')
              .search({
                apiSettings: {
                  url: "{{Config::get('app.url')}}ajax-search/?query={query}"
                },                
              })
            ;

            $('.activating.element')
              .popup()
            ;       
$('.button')
  .popup({
    inline: true
  })
;                 

            $('.ui.checkbox').checkbox();    

            $(document).ready(function () {

                //$('select.dropdown').dropdown();


                $('.click').click(function () {
                    //var screen = $('#india-post-frame'); 

                    html2canvas(document.body, {
                        onrendered: function (canvas) {
                            document.body.appendChild(canvas);
                        },
                        width: 1280,
                        height: 771
                    });
                });


//
//                $("td")
//                        .mouseover(function () {
//                            $(this).find('select').show();
//                            $(this).find('.statusText').hide();
//                        })
//                        .mouseout(function () {
//                            $(this).find('select').hide();
//                            $(this).find('.statusText').show();
//                        });

                $(".img-zoom")
                        .mouseover(function () {
                            $(this).addClass('zoom-in');
                        })
                        .mouseout(function () {
                            $(this).removeClass('zoom-in');
                        });

                $(".identity-image")
                        .mouseover(function () {
                            $(this).addClass('img-zoom zoom-in');
                        })
                        .mouseout(function () {
                            $(this).removeClass('img-zoom zoom-in');
                        });



                $(".focusDoc")
                        .focusin(function () {
                            $('.basic-details .field').hide(300);
                            $(".img-zoom").addClass('zoom-in');
                        })
                        .focusout(function () {
                            $('.basic-details .field').show(300);
                            $(".img-zoom").removeClass('zoom-in');
                        });

                $(".as-per-id")
                        .focusin(function () {
                            $(".img-zoom").addClass('zoom-in');
                        })
                        .focusout(function () {
                            $(".img-zoom").removeClass('zoom-in');
                        });

                $(".rotate-left-btn")
                        .click(function () {
                            var check = $(".img-zoom").hasClass('rotate-left');
                            if (check) {
                                console.log('has class');
                                $('.basic-details .field').hide(300);
                                $(".img-zoom").removeClass('rotate-left');
                            } else {
                                $('.basic-details .field').hide(300);
                                $(".img-zoom").addClass('rotate-left');
                            }
                        });


                $(".basic-details input")
                        .focusin(function () {
                            //$( ".img-zoom" ).addClass('zoom-in');
                        })
                        .focusout(function () {
                            //$( ".img-zoom" ).removeClass('zoom-in');
                        });

        //var regex = new RegExp(/Under Process/g)
        //    var count = $('body table tbody .field ').html().match(regex).length;   
        //    console.log(count);

                $('.changeStatus').change(function () {

                    var employee = $(this).attr('employee-id');
                    var checkType = $(this).attr('check-type');
                    var status = $(this).val();

                    $.ajax({
                        type: "POST",
                        url: HOST + "lots/changed/show",
                        data: {employee: employee, status: status, checkType: checkType},
                        dataType: 'json',
                        cache: false,
                        success: function (data)
                        {
                            console.log(data);
                            //                if(data)alert(data);
                            //                else alert('no value');
                        }
                    });

                    return false;
                });


            });





        </script>




        <script type="text/javascript">
            function closePrint() {
                document.body.removeChild(this.__container__);
            }

            function setPrint() {
                this.contentWindow.__container__ = this;
                this.contentWindow.onbeforeunload = closePrint;
                this.contentWindow.onafterprint = closePrint;
                this.contentWindow.focus(); // Required for IE
                this.contentWindow.print();
            }

            function printPage(sURL) {
                var oHiddFrame = document.createElement("iframe");
                oHiddFrame.onload = setPrint;
                oHiddFrame.style.visibility = "hidden";
                oHiddFrame.style.position = "fixed";
                oHiddFrame.style.right = "0";
                oHiddFrame.style.bottom = "0";
                oHiddFrame.src = sURL;
                oHiddFrame.type = "application/pdf";
                document.body.appendChild(oHiddFrame);
            }
        </script>

    </body>
</html>
