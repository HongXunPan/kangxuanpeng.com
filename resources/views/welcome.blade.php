<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>康宣鹏 · HongXunPan · kangxuanpeng</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            margin-top: -15vh;
        }

        .title {
            font-size: 50px;
            color: black;
            letter-spacing: .15rem;
        }

        .links > a {
            color: #636b6f;
            padding: 0 .5em;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        canvas {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }
    </style>
    <style type="text/css">object, embed {
            -webkit-animation-duration: .001s;
            -webkit-animation-name: playerInserted;
            -ms-animation-duration: .001s;
            -ms-animation-name: playerInserted;
            -o-animation-duration: .001s;
            -o-animation-name: playerInserted;
            animation-duration: .001s;
            animation-name: playerInserted;
        }

        @-webkit-keyframes playerInserted {
            from {
                opacity: 0.99;
            }
            to {
                opacity: 1;
            }
        }

        @-ms-keyframes playerInserted {
            from {
                opacity: 0.99;
            }
            to {
                opacity: 1;
            }
        }

        @-o-keyframes playerInserted {
            from {
                opacity: 0.99;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes playerInserted {
            from {
                opacity: 0.99;
            }
            to {
                opacity: 1;
            }
        }</style>
</head>
<body>
<canvas width="3000" height="872"></canvas>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">HongXunPan</div>

        <div class="links">
            <a href="#">xxx</a>
            <a href="http://blog.kangxuanpeng.com">Blog</a>
            <a href="http://me.kangxuanpeng.com">About Me</a>
            <a href="#">Contact</a>
        </div>
    </div>
</div>
</body>

<script>
    document.addEventListener('touchmove', function (e) {
        e.preventDefault()
    })
    var c = document.getElementsByTagName('canvas')[0],
        x = c.getContext('2d'),
        pr = window.devicePixelRatio || 1,
        w = window.innerWidth,
        h = window.innerHeight,
        f = 90,
        q,
        m = Math,
        r = 0,
        u = m.PI * 2,
        v = m.cos,
        z = m.random
    c.width = w * pr
    c.height = h * pr
    x.scale(pr, pr)
    x.globalAlpha = 0.6

    function i() {
        x.clearRect(0, 0, w, h)
        q = [{x: 0, y: h * .7 + f}, {x: 0, y: h * .7 - f}]
        while (q[1].x < w + f) d(q[0], q[1])
    }

    function d(i, j) {
        x.beginPath()
        x.moveTo(i.x, i.y)
        x.lineTo(j.x, j.y)
        var k = j.x + (z() * 2 - 0.25) * f,
            n = y(j.y)
        x.lineTo(k, n)
        x.closePath()
        r -= u / -50
        x.fillStyle = '#' + (v(r) * 127 + 128 << 16 | v(r + u / 3) * 127 + 128 << 8 | v(r + u / 3 * 2) * 127 + 128).toString(16)
        x.fill()
        q[0] = q[1]
        q[1] = {x: k, y: n}
    }

    function y(p) {
        var t = p + (z() * 2 - 1.1) * f
        return (t > h || t < 0) ? y(p) : t
    }

    document.onclick = i
    document.ontouchstart = i
    i()
</script>

</html>
