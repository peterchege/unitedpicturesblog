<?php
require_once 'inc/db.php';
require_once 'inc/sessions.php';
require_once 'inc/functions.php';
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
                            <h1 class="site-title"><a href="index.php" rel="home"><span style="color:#3b3ecc;">United</span> pictures</a></h1>
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container hero-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="hero-content flex justify-content-center align-items-center flex-column resizing">
                                    <img src="images/red-project/neder1.jpg" alt="">
                                </div><!-- .hero-content -->
                            </div><!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <div class="hero-content flex justify-content-center align-items-center flex-column resizing">
                                    <img src="images/red-project/tarrus2.jpg" alt="">
                                </div><!-- .hero-content -->
                            </div><!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <div class="hero-content flex justify-content-center align-items-center flex-column resizing">
                                    <img src="images/red-project/tarrus3.jpg" alt="">
                                </div><!-- .hero-content -->
                            </div><!-- .swiper-slide -->
                        </div><!-- .swiper-wrapper -->

                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- Add Arrows -->
                        <div class="swiper-button-next flex justify-content-center align-items-center">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44">
                                    <path d="M27,22L27,22L5,44l-2.1-2.1L22.8,22L2.9,2.1L5,0L27,22L27,22z"></path>
                                </svg></span>
                        </div>
                        <div class="swiper-button-prev flex justify-content-center align-items-center">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44">
                                    <path d="M0,22L22,0l2.1,2.1L4.2,22l19.9,19.9L22,44L0,22L0,22L0,22z"></path>
                                </svg></span>
                        </div>
                    </div><!-- .swiper-container -->
                </div><!-- .col -->
            </div><!-- .row -->

            <div class="container">
                <div class="row">
                    <div class="offset-lg-9 col-12 col-lg-3">
                        <a href="#">
                            <div class="yt-subscribe">
                                <img src="images/yt-subscribe.png" alt="Youtube Subscribe">
                                <h3>Subscribe</h3>
                                <p>To my Youtube Channel</p>
                            </div><!-- .yt-subscribe -->
                        </a>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .hero-section -->

        <div class="container single-page">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <!--                post-->
                    <?php
//                    extracting post info
                    if(isset($_GET['searchButton'])){
                        $search=$_GET['search'];
                        $viewQuery="SELECT * FROM admin_panel WHERE datetime LIKE '%$search%' or
                        title LIKE '%$search%' or
                        category LIKE '%$search%' or
                        post LIKE '%$search%' ORDER BY id desc";
                    }elseif(isset($_GET['page'])){                
                            // query when pagination is active
                            $page=$_GET['page'];
                            if($page<1 || $page==0){
                                $showPostFrom=0;
                            }else{
                                $showPostFrom=($page*5)-5;
                                }
                            $viewQuery="SELECT * FROM admin_panel ORDER BY id desc LIMIT $showPostFrom,5 ";
                           }elseif(!isset($_GET['page'])){
                               $page=1;
                            $viewQuery="SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,5 ";
                        
                           }else{
                            $viewQuery="SELECT * FROM admin_panel ORDER BY id desc";                    
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

                            <div class="tags-links">
                                <a href="#">#proudkenyan</a>
                                <a href="#">#nairobi</a>
                                <a href="#">#snow</a>
                                <a href="#">#january</a>
                            </div><!-- .tags-links -->
                        </header><!-- .entry-header -->

                        <figure class="featured-image">
                            <img src="<?=$p['image'];?>" alt="">
                        </figure><!-- .featured-image -->

                        <div class="entry-content">
                            <p>
                                <?php 
                            
                                    if (strlen($p['post'])>150) {
                                    $p['post']=substr($p['post'],0,150)."...";
                                    echo htmlentities($p['post']);
                                    }
                                    ?>
                            </p>
                        </div><!-- .entry-content -->

                        <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                            <ul class="post-share flex align-items-center order-3 order-lg-1">
                                <label>Share</label>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            </ul><!-- .post-share -->

                            <a class="read-more order-2" href="fullpost.php?id=<?=$p['id'];?>">Read more</a>

                            <div class="comments-count order-1 order-lg-3">
                                <a href="#">
                                    <!--                            comments-->
                                    <?php
                                    $comment=$p['id'];
                                    $commentsQuery=$conn->query("SELECT * FROM comments WHERE admin_panel_id='$comment' AND status='ON' ");
                                    $numberOfComments=mysqli_num_rows($commentsQuery);
                                    if($numberOfComments==0){
                                    echo 'No comment';
                                        }elseif($numberOfComments==1){
                                            echo $numberOfComments.' comment';
                                        }elseif($numberOfComments>1){
                                            echo $numberOfComments.' comments';
                                    }
                                    ?>
                                </a>
                            </div><!-- .comments-count -->
                        </footer><!-- .entry-footer -->
                    </div><!-- .content-wrap -->
                    <!--                end  post-->
                    <?php endwhile;?>

                    <div class="pagination">
                        <ul class="flex align-items-center">
                            <!-- previous pagination -->
                            <?php if(@$page>1): ?>
                            <li><a href="index.php?page=<?=$page-1;?>">&laquo;</a></li>
                            <?php endif;?>

                            <?php
                            $queryPagination="SELECT * FROM admin_panel";
                            $executePagination=$conn->query($queryPagination);
                            $totalPosts=mysqli_num_rows($executePagination);
                            $postsPerPage=$totalPosts/5;
                            $postsPerPage=ceil($postsPerPage);
                            if(isset($_GET['category'])){
                                $postsPerPage=0;
                            }
                            ?>
                            <?php for($i=1; $i<=$postsPerPage; $i++): ?>
                            <li class="<?=(($i==$page)?'active':''); ?>"> <a href="index.php?page=<?=$i;?>"><?=$i;?></a> </li>
                            <?php endfor;?>

                            <!-- next pagination -->
                            <?php if(@$page>0 && $page<$postsPerPage): ?>
                            <li><a href="index.php?page=<?=$page+1;?>">&raquo;</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div><!-- .col -->

                <div class="col-12 col-lg-3">
                    <div class="sidebar">
                        <div class="about-me">
                            <h2>INTRODUCTION</h2>

                            <p>Welcome to our blog. This is where we post all the events we've covered plus our thoughts, opinions and views. Cycle through our content and have a blast.</p>
                        </div><!-- .about-me -->

                        <div class="recent-posts">
                            <h2>Recent posts</h2>
                            <?php
                                $viewRecent="SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,5 ";
                                $recentRun=$conn->query($viewRecent);
                                ?>
                            <?php while($recent=mysqli_fetch_assoc($recentRun)):?>
                            <div class="recent-post-wrap">
                                <figure>
                                    <img src="<?=htmlentities($recent['image']); ?>" alt="">
                                </figure>

                                <header class="entry-header">
                                    <div class="posted-date">
                                        <?=((strlen($recent['datetime'])>11)?substr($recent['datetime'],0,11):''); ?>
                                    </div><!-- .entry-header -->

                                    <h3><a href="fullpost.php?id=<?=$recent['id']; ?>"><?= htmlentities($recent['title']); ?></a></h3>
                                </header><!-- .entry-header -->
                            </div><!-- .recent-post-wrap -->
                            <?php endwhile;?>

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
    </div>

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/swiper.min.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>

</body>

</html>
