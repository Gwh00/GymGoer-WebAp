<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gym Goer's official website.">
    <meta name="author" content="Gym Goer Team">
    <title>Gym Goer Staff</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">

</head>
<style>
    .hoverable {
        display: inline-block;
        backface-visibility: hidden;
        vertical-align: middle;
        position: relative;
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        background-color: black;
        tranform: translateZ(0);
        transition-duration: .3s;
        transition-property: transform;
    }

    .hoverable:before {
        position: absolute;
        pointer-events: none;
        z-index: -1;
        content: '';
        top: 100%;
        left: 5%;
        height: 10px;
        width: 90%;
        opacity: 0;
        background: -webkit-radial-gradient(center, ellipse, rgba(255, 255, 255, 0.35) 0%, rgba(255, 255, 255, 0) 80%);
        background: radial-gradient(ellipse at center, rgba(255, 255, 255, 0.35) 0%, rgba(255, 255, 255, 0) 80%);
        /* W3C */
        transition-duration: 0.3s;
        transition-property: transform, opacity;
        background-color: black;

    }

    .hoverable:hover,
    .hoverable:active,
    .hoverable:focus {
        transform: translateY(-5px);
    }

    .hoverable:hover:before,
    .hoverable:active:before,
    .hoverable:focus:before {
        opacity: 1;
        transform: translateY(-5px);
    }



    @keyframes bounce-animation {
        16.65% {
            -webkit-transform: translateY(8px);
            transform: translateY(8px);
        }

        33.3% {
            -webkit-transform: translateY(-6px);
            transform: translateY(-6px);
        }

        49.95% {
            -webkit-transform: translateY(4px);
            transform: translateY(4px);
        }

        66.6% {
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px);
        }

        83.25% {
            -webkit-transform: translateY(1px);
            transform: translateY(1px);
        }

        100% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
    }
.bounce {
        animation-name: bounce-animation;
        animation-duration: 2s;
    }
@media (min-width: 768px) {
        .navbar {
            text-align: center !important;
            float: none;
            display: inline-block;
        }
    }

    body {
        background-color: rgba(0, 0, 0, 1);
        font-weight: 600;
        text-align: center !important;
        color: white;
    }

    nav {
        background: none !important;
        text-transform: uppercase;

        li {
            margin-left: 3em;
            margin-right: 3em;

            a {
                transition: .5s color ease-in-out;
            }
        }
    }

    .page-title {
        opacity: .75 !important;
    }

    .container-fluid {
        background-color: black;
    }
</style>
<style>

        body {
            background-size: 100% auto;
            animation: changeImage 20s infinite;
        }

        @keyframes changeImage {
            0% {
                background: url(A.jpg) no-repeat center center;
                background-size: cover;
                background-position: center 10%;
            }

            25% {
                background: url(B.jpg) no-repeat center center;
                background-size: cover;
                background-position: center 10%;
            }

            50% {
                background: url(C.jpg) no-repeat center center;
                background-size: cover;
                background-position: center 10%;
            }

            75% {
                background: url(D.jpg) no-repeat center center;
                background-size: cover;
                background-position: center 10%;
            }

            100% {
                background: url(A.jpg) no-repeat center center;
                background-size: cover;
                background-position: center 10%;
            }
        }
    </style>
<body>
    <div class="container-fluid">
        <br>

        <nav class="navbar navbar-inverse" style="background-color:black;">
            <div class="container-fluid" style="width:auto;">
                <ul class="nav navbar-nav">
                    <a class="navbar-brand" href="/home" style="color:red;">GB Fitness</a>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>

                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(('Login')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(('Register')); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
<li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

        </nav>
    </div>

    <?php if(Session::has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo e(Session::get('error')); ?>

        </div>
    <?php endif; ?>

    <div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>

</html><?php /**PATH C:\Users\User\Desktop\GymGoerStaff\GymGoerStaff\resources\views/layout3.blade.php ENDPATH**/ ?>