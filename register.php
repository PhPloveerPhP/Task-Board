
<?php if(isset($_POST["submit"])) 
  include "./controllers/register_user.php";
?>


<?php include './Parts/index_header.php'; ?>



<?php if(isset($handler)): ?>
    <?php if(!$handler): ?>
        <script>
          window.location.href = "./index.php";
        </script>
    <?php endif ?>
<?php endif ?>

<?php if (isset($result)):?>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-<?= $result['error'] ? 'danger' : 'success' ?>" role="alert">
                            <?= $result['message'] ?>
                        </div>
                    </div>
                </div>
            </div>
<?php endif?>
            
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6 order-md-2">
        <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
      </div>
      <div class="col-md-6 contents">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="mb-4">
              <h3>Sing In to <strong>Kanbing</strong></h3>
              <p class="mb-4">Trust us and change you way of organizing projects.</p>
            </div>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" required>
              </div>

              <div class="form-group last mb-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>

              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
              </div>

              <input type="submit" value="Log In" name="submit" class="btn btn-login text-white btn-block btn-primary">
              <br>
              <div class="d-flex mb-5 align-items-center">
                <span class="ml-auto"><a href="./index.php" class="forgot-pass">You already have an account?</a></span>
              </div>

              <span class="d-block text-left my-4 text-muted"> or sign in with</span>

              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span>
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span>
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span>
                </a>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/main.js"></script>

<?php include './Parts/footer.php'; ?>