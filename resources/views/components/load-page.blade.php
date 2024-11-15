<div>


        @if ($seting->where('type' , 'loding')->first()->status == 1)
            <div class="loding" id="loding_id" style="height: 100vh;z-index: 20;position:fixed;top:0;left:0;width: 100%;background-color: white">

                <div id="container">
                    <div id="ring"></div>
                    <div id="ring"></div>
                    <div id="ring"></div>
                    <div id="ring"></div>
                    <div id="h3">                <img src="/storage/images/logo.png" style="scale: 0.2" alt="logo" style="">
                    </div>
                </div>

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
/* From Uiverse.io by Vazafirst */
#page {
  display: flex;
  justify-content: center;
  align-items: center;
}

#container {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}

#h3 {
  color: rgb(82, 79, 79);
}

#ring {
  width: 190px;
  height: 190px;
  border: 1px solid transparent;
  border-radius: 50%;
  position: absolute;
}

#ring:nth-child(1) {
  border-bottom: 10px solid rgb(12 60 92);
  animation: rotate1 2s linear infinite;
}

@keyframes rotate1 {
  from {
    transform: rotateX(50deg) rotateZ(110deg);
  }

  to {
    transform: rotateX(50deg) rotateZ(470deg);
  }
}

#ring:nth-child(2) {
  border-bottom: 10px solid rgb(236 107 5);
  animation: rotate2 2s linear infinite;
}

@keyframes rotate2 {
  from {
    transform: rotateX(20deg) rotateY(50deg) rotateZ(20deg);
  }

  to {
    transform: rotateX(20deg) rotateY(50deg) rotateZ(380deg);
  }
}

#ring:nth-child(3) {
  border-bottom: 10px solid rgb(1 31 51);
  animation: rotate3 2s linear infinite;
}

@keyframes rotate3 {
  from {
    transform: rotateX(40deg) rotateY(130deg) rotateZ(450deg);
  }

  to {
    transform: rotateX(40deg) rotateY(130deg) rotateZ(90deg);
  }
}

#ring:nth-child(4) {
  border-bottom: 10px solid rgb(248 166 80);
  animation: rotate4 2s linear infinite;
}

@keyframes rotate4 {
  from {
    transform: rotateX(70deg) rotateZ(270deg);
  }

  to {
    transform: rotateX(70deg) rotateZ(630deg);
  }
}
/* Improving visualization in light mode */
    </style>
</div>
