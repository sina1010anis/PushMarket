<div>


        @if ($seting->where('type' , 'loding')->first()->status == 1)
            <div class="loding" id="loding_id" style="height: 100vh;z-index: 20;position:fixed;top:0;left:0;width: 100%;background-color: white">

                <img id="img_loding" src="/storage/images/logo.png" alt="logo" style="">

            </div>
        @endif


    <script>


                setTimeout(()=>{
                        document.getElementById("loding_id").style.display = "none";
                    } , 1500)

    </script>

    <style>
        #img_loding{
            transform: translate(-50%,-50%);position: absolute;top:50%;right: 50%;width: 75px;transition: 0.2s;
            animation: loding 3.5s linear forwards;
        }
        @keyframes loding{
            0%{
                transform: scale(1)
            }
            25%{
                transform: scale(0.75)
            }
            50%{
                transform: scale(0.50)
            }
            75%{
                transform: scale(0.25)
            }
            100%{
                transform: scale(0)
            }
        }
    </style>
</div>
