<?php
require_once 'inc/db.php';
require_once 'inc/sessions.php';
require_once 'inc/functions.php';

//submit comment
if(isset($_POST['submitComment'])){
        $name=test_input($_POST['name']);
        $email=test_input($_POST['email']);
        $comment=test_input($_POST['comment']);
        
        $currentTime=time();
        $dateTime=strftime("%d,%B %Y %H:%M:%S",$currentTime);
        $dateTime;
        $admin="Tony";
        $status="off";
        $post_id=$_GET['id'];
        $foreignCommentId=$_GET['id'];

        //image validation
//        $image=$_FILES['image']['name'];
//        $image=test_input($image);
//        $image=md5($image);
//        $target="images/".basename($_FILES['image']['name']);



        if(empty($name) || empty($email) || empty($comment)){
            $_SESSION['ErrorMessage']="All fields are required";
            //redirect_to("categories.php");
        }elseif(strlen($comment)<15){
            $_SESSION['ErrorMessage']="Comment should be at least 15 characters long";
            //redirect_to("categories.php");
        }else{
            $query="INSERT INTO comments (`name`,email,comment,approved_by,`datetime`,`status`,admin_panel_id) 
                                VALUES('$name','$email','$comment','pending','$dateTime','$status','$foreignCommentId')";
            $conn->query($query);
            $_SESSION['SuccessMessage']="Comment posted successfully and is awaiting approval";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
    <style>
        .commentBlock {
            background-color: #f6f7f9;
        }

        .commentBlock img {
            margin: 10px 50px 10px 10px;
        }

        .comment-info {
            color: #365899;
            font-family: sans-serif;
            font-size: 1.1em;
            font-weight: bold;
            padding-top: 10px;
        }

        .comment {
            margin-top: -2px;
            padding-bottom: 10px;
            font-size: 1.1em;
        }

    </style>
</head>

<body>
    <div class="outer-container">
        <header class="site-header">
            <div class="top-header-bar">
                <div class="container-fluid">
                    <div class="row">


                        <div class="col-12 col-lg-12 flex justify-content-between justify-content-lg-end align-items-center">
                            <div class="header-bar-social d-none d-md-block">
                                <ul class="flex align-items-center">
                                    <!-- <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <!-- <li><a href="#"><i class="fa fa-dribbble"></i></a></li> -->
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div><!-- .header-bar-social -->

                            <div class="header-bar-search d-none d-md-block">
                                <form action="index.php" method="GET">
                                    <input name="search" value="<?=((isset($_GET['searchButton']))?$_GET['search']:''); ?>" type="text" placeholder="">
                                    <button class="btn btn-primary" type="submit" name="searchButton">Search</button>
                                </form>
                            </div><!-- .header-bar-search -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container-fluid -->
            </div><!-- .top-header-bar -->

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="site-branding flex flex-column align-items-center">
                            <h1 class="site-title"><a href="index.php" rel="home"><span style="color:#cc1212;">United</span> pictures</a></h1>
                            <p class="site-description">Blog</p>
                        </div><!-- .site-branding -->

                        <nav class="site-navigation">
                            <div class="hamburger-menu d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div><!-- .hamburger-menu -->

                            <ul class="flex-lg flex-lg-row justify-content-lg-center align-content-lg-center">
                                <li class="current-menu-item"><a href="index.php">Home</a></li>
                                <li><a href="#">About US</a></li>
                                <li><a href="#">Corprate</a></li>
                                <li><a href="#">Portraiture</a></li>
                                <li><a href="#">Studio</a></li>
                                <li class="active"><a href="#">Blog</a></li>
                                <li><a href="#">Print Shop</a></li>
                            </ul>

                            <div class="header-bar-social d-md-none">
                                <ul class="flex justify-content-center align-items-center">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div><!-- .header-bar-social -->

                            <div class="header-bar-search d-md-none text-center">
                                <form action="index.php" method="GET">
                                    <input type="text" placeholder="Search" name="search" value="<?=((isset($_GET['searchButton']))?$_GET['search']:''); ?>">
                                    <button class="btn btn-primary" type="submit" name="searchButton">Search</button>
                                </form>
                            </div><!-- .header-bar-search -->
                        </nav><!-- .site-navigation -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </header><!-- .site-header -->

        <div class="container single-page">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <?php
echo Message();
echo SuccessMessage();
                    ?>
                    <!--                post-->
                    <?php
//                    extracting post info
                    if(isset($_GET['searchButton'])){
                        $search=$_GET['search'];
                        $viewQuery="SELECT * FROM admin_panel WHERE datetime LIKE '%$search%' or
                        title LIKE '%$search%' or
                        category LIKE '%$search%' or
                        post LIKE '%$search%' ";
                    }else{
                    $post_id=$_GET['id'];
                    $viewQuery="SELECT * FROM admin_panel WHERE id='$post_id' ";                    
                    }
                    $execute=$conn->query($viewQuery);
                    ?>
                    <?php while($p=mysqli_fetch_assoc($execute)): ?>
                    <div class="content-wrap">
                        <header class="entry-header">
                            <div class="posted-date">
                                <?=htmlentities($p['datetime']); ?>
                            </div><!-- .posted-date -->

                            <h2 class="entry-title">
                                <?=$p['title']; ?>
                            </h2>
                        </header><!-- .entry-header -->

                        <figure class="featured-image">
                            <img src="<?=$p['image'];?>" alt="">
                        </figure><!-- .featured-image -->

                        <div class="entry-content">
                            <p>
                                <?php 
                                    echo strlen($p['post']);
                                    echo $p['post'];
                                ?>
                            </p>
                        </div><!-- .entry-content -->
                    </div><!-- .content-wrap -->
                    <!--                end  post-->
                    <?php endwhile;?>

                    <!-- extracting comments from db -->
                    <?php                    ;
                    $extractComments="SELECT * from comments WHERE admin_panel_id='$post_id' AND status='on' ";
                    $execute=$conn->query($extractComments);
                    ?>
                    <?php while($commentFetch = mysqli_fetch_assoc($execute)): ?>
                    <div class="commentBlock">
                        <img class="pull-left" src="images/site_images/comment.png" width=70px; height=70px; style="">
                        <p class="comment-info">
                            <?=$commentFetch['name'];?>
                        </p>
                        <p class="description">
                            <?=$commentFetch['datetime']; ?>
                        </p>
                        <p class="comment">
                            <?=$commentFetch['comment']; ?>
                        </p>
                    </div>
                    <br>
                    <hr>
                    <?php endwhile;?>

                    <!--                comment section-->
                    <span>
                        <h2>Share your views</h2>
                    </span>
                    <form action="fullpost.php?id=<?php echo $post_id; ?>" method="post" enctype="multipart/form-data">
                        <fieldset id="form">
                            <div class="form-group">
                                <label for="Name"><span class="fieldInfo">Name:</span></label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Full name please" required value="<?=((isset($name))?$name:''); ?>">
                            </div><br>
                            <div class="form-group">
                                <label for="Email"><span class="fieldInfo">Email:</span></label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required value="<?=((isset($email))?$email:''); ?>">
                            </div><br>
                            <div class="form-group">
                                <label for="Comment"><span class="fieldInfo">Comment:</span></label>
                                <textarea class="form-control" name="comment" id="comment" type="text" placeholder="Enter your comment here"><?=((isset($comment))?$comment: '');?></textarea>
                            </div>
                            <input class="btn btn-primary" type="submit" name="submitComment" value="Add new Post">
                        </fieldset><br>
                    </form>

                </div><!-- .col -->

                <div class="col-12 col-lg-3">
                    <div class="sidebar">
                        <div class="recent-posts">
                            <div class="recent-post-wrap">
                                <figure>
                                    <img src="images/thumb-1.jpg" alt="">
                                </figure>

                                <header class="entry-header">
                                    <div class="posted-date">
                                        January 30, 2018
                                    </div><!-- .entry-header -->

                                    <h3><a href="#">My fall in love story</a></h3>

                                    <div class="tags-links">
                                        <a href="#">#winter</a>
                                        <a href="#">#love</a>
                                        <a href="#">#snow</a>
                                        <a href="#">#january</a>
                                    </div><!-- .tags-links -->
                                </header><!-- .entry-header -->
                            </div><!-- .recent-post-wrap -->

                            <div class="recent-post-wrap">
                                <figure>
                                    <img src="images/thumb-2.jpg" alt="">
                                </figure>

                                <header class="entry-header">
                                    <div class="posted-date">
                                        January 30, 2018
                                    </div><!-- .entry-header -->

                                    <h3><a href="#">My fall in love story</a></h3>

                                    <div class="tags-links">
                                        <a href="#">#winter</a>
                                        <a href="#">#love</a>
                                        <a href="#">#snow</a>
                                        <a href="#">#january</a>
                                    </div><!-- .tags-links -->
                                </header><!-- .entry-header -->
                            </div><!-- .recent-post-wrap -->

                            <div class="recent-post-wrap">
                                <figure>
                                    <img src="images/thumb-3.jpg" alt="">
                                </figure>

                                <header class="entry-header">
                                    <div class="posted-date">
                                        January 30, 2018
                                    </div><!-- .entry-header -->

                                    <h3><a href="#">My fall in love story</a></h3>

                                    <div class="tags-links">
                                        <a href="#">#winter</a>
                                        <a href="#">#love</a>
                                        <a href="#">#snow</a>
                                        <a href="#">#january</a>
                                    </div><!-- .tags-links -->
                                </header><!-- .entry-header -->
                            </div><!-- .recent-post-wrap -->

                            <div class="recent-post-wrap">
                                <figure>
                                    <img src="images/thumb-4.jpg" alt="">
                                </figure>

                                <header class="entry-header">
                                    <div class="posted-date">
                                        January 30, 2018
                                    </div><!-- .entry-header -->

                                    <h3><a href="#">My fall in love story</a></h3>

                                    <div class="tags-links">
                                        <a href="#">#winter</a>
                                        <a href="#">#love</a>
                                        <a href="#">#snow</a>
                                        <a href="#">#january</a>
                                    </div><!-- .tags-links -->
                                </header><!-- .entry-header -->
                            </div><!-- .recent-post-wrap -->
                        </div><!-- .recent-posts -->

                        <div class="sidebar-ads">
                        </div>
                    </div><!-- .sidebar -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .outer-container -->

    <footer class="sit-footer">
        <div class="outer-container">
            <div class="container-fluid">
                <h3 id="head">ARCHIEVES</h3>

                <div class="row footer-recent-posts">
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="footer-post-wrap flex justify-content-between">
                            <figure>
                                <a href="#"><img src="images/foot-1.jpg" alt=""></a>
                            </figure>

                            <div class="footer-post-cont flex flex-column justify-content-between">
                                <header class="entry-header">
                                    <div class="posted-date">
                                        January 30, 2018
                                    </div><!-- .entry-header -->

                                    <h3><a href="#">My fall in love story</a></h3>

                                    <div class="tags-links">
                                        <a href="#">#winter</a>
                                        <a href="#">#love</a>
                                        <a href="#">#snow</a>
                                        <a href="#">#january</a>
                                    </div><!-- .tags-links -->
                                </header><!-- .entry-header -->

                                <footer class="entry-footer">
                                    <a class="read-more" href="#">read more</a>
                                </footer><!-- .entry-footer -->
                            </div><!-- .footer-post-cont -->
                        </div><!-- .footer-post-wrap -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="footer-post-wrap flex justify-content-between">
                            <figure>
                                <a href="#"><img src="images/foot-2.jpg" alt=""></a>
                            </figure>

                            <div class="footer-post-cont flex flex-column justify-content-between">
                                <header class="entry-header">
                                    <div class="posted-date">
                                        January 30, 2018
                                    </div><!-- .entry-header -->

                                    <h3><a href="#">Man’s best friend</a></h3>

                                    <div class="tags-links">
                                        <a href="#">#winter</a>
                                        <a href="#">#love</a>
                                        <a href="#">#snow</a>
                                        <a href="#">#january</a>
                                    </div><!-- .tags-links -->
                                </header><!-- .entry-header -->

                                <footer class="entry-footer">
                                    <a class="read-more" href="#">read more</a>
                                </footer><!-- .entry-footer -->
                            </div><!-- .footer-post-cont -->
                        </div><!-- .footer-post-wrap -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="footer-post-wrap flex justify-content-between">
                            <figure>
                                <a href="#"><img src="images/foot-3.jpg" alt=""></a>
                            </figure>

                            <div class="footer-post-cont flex flex-column justify-content-between">
                                <header class="entry-header">
                                    <div class="posted-date">
                                        January 30, 2018
                                    </div><!-- .entry-header -->

                                    <h3><a href="#">Writing on a budget</a></h3>

                                    <div class="tags-links">
                                        <a href="#">#winter</a>
                                        <a href="#">#love</a>
                                        <a href="#">#snow</a>
                                        <a href="#">#january</a>
                                    </div><!-- .tags-links -->
                                </header><!-- .entry-header -->

                                <footer class="entry-footer">
                                    <a class="read-more" href="#">read more</a>
                                </footer><!-- .entry-footer -->
                            </div><!-- .footer-post-cont -->
                        </div><!-- .footer-post-wrap -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="footer-post-wrap flex justify-content-between">
                            <figure>
                                <a href="#"><img src="images/foot-4.jpg" alt=""></a>
                            </figure>

                            <div class="footer-post-cont flex flex-column justify-content-between">
                                <header class="entry-header">
                                    <div class="posted-date">
                                        January 30, 2018
                                    </div><!-- .entry-header -->

                                    <h3><a href="#">My fall in love story</a></h3>

                                    <div class="tags-links">
                                        <a href="#">#winter</a>
                                        <a href="#">#love</a>
                                        <a href="#">#snow</a>
                                        <a href="#">#january</a>
                                    </div><!-- .tags-links -->
                                </header><!-- .entry-header -->

                                <footer class="entry-footer">
                                    <a class="read-more" href="#">read more</a>
                                </footer><!-- .entry-footer -->
                            </div><!-- .footer-post-cont -->
                        </div><!-- .footer-post-wrap -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container-fluid -->
        </div><!-- .outer-container -->

        <div class="container-fluid">
            <div class="row">
                <h3 id="insta">INSTAGRAM PAGE</h3>
                <div class="footer-instagram flex flex-wrap flex-lg-nowrap">

                    <figure>
                        <a href="#"><img class="img-fluid" src="images/red-project/project10.jpg" alt=""></a>
                    </figure>

                    <figure>
                        <a href="#"><img class="img-fluid" src="images/red-project/project3.jpg" alt=""></a>
                    </figure>

                    <figure>
                        <a href="#"><img class="img-fluid" src="images/red-project/project12.jpg" alt=""></a>
                    </figure>

                    <figure>
                        <a href="#"><img class="img-fluid" src="images/red-project/project13.jpg" alt=""></a>
                    </figure>

                    <figure>
                        <a href="#"><img class="img-fluid" src="images/red-project/project14.jpg" alt=""></a>
                    </figure>

                    <figure>
                        <a href="#"><img class="img-fluid" src="images/red-project/project15.jpg" alt=""></a>
                    </figure>

                    <figure>
                        <a href="#"><img class="img-fluid" src="images/red-project/project8.jpg" alt=""></a>
                    </figure>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->

        <div class="footer-bar">
            <div class="outer-container">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6">
                            <div class="footer-copyright">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                <p>Copyright &copy;<script>
                                        document.write(new Date().getFullYear());

                                    </script> All rights reserved </p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div><!-- .footer-copyright -->
                        </div><!-- .col-xl-4 -->

                        <div class="col-12 col-md-6">
                            <div class="footer-social">
                                <ul class="flex justify-content-center justify-content-md-end align-items-center">
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div><!-- .footer-social -->
                        </div><!-- .col-xl-4 -->
                    </div><!-- .row -->
                </div><!-- .container-fluid -->
            </div><!-- .outer-container -->
        </div><!-- .footer-bar -->
    </footer><!-- .sit-footer -->

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/swiper.min.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>

</body>

</html>
