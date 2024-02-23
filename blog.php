<!--head section start-->
<?php include_once('section/header.php'); ?>
<!-- head section end -->
<!-- header section start-->
<?php include_once('section/navbar.php'); ?>
<!--header section end-->
<!--body content wrap start-->
<div class="main">
    <!--header section start-->
    <section class="hero-section ptb-100 gradient-overlay" style="background: url('img/header-bg-5.jpg')no-repeat center center / cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                        <h1 class="text-white mb-0">Our Blog</h1>
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                <li class="list-inline-item breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="list-inline-item breadcrumb-item"><a href="#">Our Blog</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--header section end-->
    
    <!--blog section start-->
    <section class="our-blog-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-heading mb-5">
                        <h2>Our Latest Blog</h2>
                        <p class="lead">
                            Explore innovative trends, insightful analysis, and expert perspectives in our latest blog. Stay informed and inspired with our thought-provoking content.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                    include "config.php";
                    //pagination codde start take page variable from bottom side code scrolldown
                    if(!isset($_GET['page'])){
                        $page = 1;
                    }else{
                        $page= $_GET['page'];
                    }
                    $limit=6;
                    $offset = ($page-1)*$limit;

                    //start sql query
                    $sql = "SELECT * FROM blog ORDER BY ID DESC limit $offset,$limit";
                    $run = mysqli_query($con, $sql);
                    if(mysqli_num_rows($run)> 0){
                        // $result = mysqli_fetch_array($run);
                        while($row = mysqli_fetch_assoc($run)){ ?>
               
                <div class="col-md-4">
                    <div class="single-blog-card card border-0 shadow-sm">
                        <div class="blog-img position-relative">
                        <a href="blog_details.php?id=<?= $row['id'] ?>">
                            <img src="folder_name/<?= $row['images']?>" class="card-img-top" width="350" height="233" alt="blog">
                        </a>
                            <div class="meta-date">
                                <strong><?= date( 'd', strtotime($row['post_date'])) ?></strong>
                                <small><?= date( 'M', strtotime($row['post_date'])) ?></small>
                            </div>
                        </div>
                        <div class="card-body">                            
                            <h3 class="h5 mb-2 card-title"><a href="blog_details.php?id=<?= $row['id'] ?>"><?= $row['title']; ?></a></h3>
                           
                            <p class="card-text"><?= substr($row['description'], 0, 70); ?><?= strlen($row['description']) > 70 ? '...' : ' '; ?></p>
                           
                            <a href="blog_details.php?id=<?= $row['id'] ?>" class="detail-link">Read more <span class="ti-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <?php         }
                    }else{?>
                    <h2>Blogs not found..! </h2>
                    <?php }
                ?>
            </div>
            <!--pagination start-->
            <?php 
                $pagination = "SELECT * FROM blog";
                $run_q = mysqli_query($con, $pagination);
                $total_post = mysqli_num_rows($run_q);
                $limit = 6;
                $pages = ceil($total_post/$limit);

            ?>
            <div class="row">
                <div class="col-md-12">
                    <nav class="custom-pagination-nav mt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"></li>
                           <?php  for($i=1; $i <=$pages; $i++) {?>
                            <li class="page-item <?= ($i== $page) ? $active= "active":""; ?>"><a class="page-link" href="blog.php?page=<?= $i ?>"><?= $i; ?></a></li>
                            <li class="page-item"></li>
                        <?php }?>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--pagination end-->

        </div>
    </section>
    <!--blog section end-->

</div>
<!--body content wrap end-->
<!--footer section start-->
<?php include_once('section/footer.php'); ?>
<!--footer section end-->
