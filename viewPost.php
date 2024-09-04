<?php require_once 'inc/header.php';
require_once 'inc/db.php' ; ?>

    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new Post</h4>
              <h2>add new personal post</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Background</h2>

            </div>
            <?php 
            $id= $_GET['id'];
            $query="SELECT * FROM posts WHERE ID=$id";
            $result= mysqli_query($connection,$query);
            $post=mysqli_fetch_assoc($result);
           if(!empty($post)){
            ?>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/postimage/<?php echo $post['image']?>" alt="">
            </div>
          <div class="col-md-6">
            <h4><?php echo $post['title'] ?></h4>
              <p><?php echo $post ['body']?></p>  <?php }?>
            <div class="left-content">
              
            
              <div class="d-flex justify-content-center">
                  <a href="editPost.php?id=<?php echo $id?>" class="btn btn-success mr-3 "> edit post</a>
              
                  <a href="handleDelete.php?id=<?php echo $id ?>" class="btn btn-danger "> delete post</a>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

    <?php require_once 'inc/footer.php' ?>
