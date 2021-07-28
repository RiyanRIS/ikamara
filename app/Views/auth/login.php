<?= view("_temp/head") ?>
<style>
  body {
      background-color: #f8f9fa;
  }
  .form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
<?= view("_temp/nav") ?>

<main class="flex-shrink-0 mt-5">
  <div class="container text-center">
    <?= form_open("auth/login", "autocomplete=\"off\"") ?>
    <main class="form-signin">
    <h1 class="h3 mb-3 mt-5 fw-normal">Please sign in</h1>
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required="" autofocus="">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required="">
      <label for="floatingPassword">Password</label>
    </div>

    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <button class="mt-3 w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
</main>

    <?= form_close() ?>
  </div>
</main>

<?= view("_temp/foot") ?>

</body>

</html>