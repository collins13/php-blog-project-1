

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->

          <!-- Categories Widget -->
          <div class="card my-4">
            <h3 class="card-header ttl">Categories</h3>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 color">
                  <!--<ul class="list-unstyled mb-0">-->
                  <ul class="list-group">
                   <?php if($categories) : ?>
              <?php while($row = $categories->fetch_assoc()) : ?>
 <a href="posts.php?category=<?php echo $row['id']; ?>" class="list-group-item"><?php echo $row['name']; ?></a>
                <?php endwhile; ?>

                      <?php else : ?>

          <div class="alert alert-danger">
        <p>there are no posts yet</p>
       </div>
                <?php endif; ?>
</ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h3 class="card-header ttl">More</h3>
            <div class="card-body">
            <div class="below-side color">
              <ul class="list-group">
                 <a href="#" class="list-group-item">Abous Us</a>
                 <a href="#" class="list-group-item">Services</a>
                 <a href="#" class="list-group-item">Online Discussion</a>
              </ul>
            </div>
          </div>
        </div>
    </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark" style="height: 200px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="m-0 text-center text-white">Copyright &copy; pwani Gossip <?php echo date("Y-m-d"); ?></p>
          </div>
        </div>
      </div>
    </footer>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js">
          $(document).ready((){
            $('#main').on('click', function(){
                $('#box').dialog();
            });
          });

    </script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
